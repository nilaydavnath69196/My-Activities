<?php

namespace App\Http\Controllers;

use App\Models\{Student, Project, Professor, Subject, AssignmentPost, AssignmentSubmission, PortalNotification};
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function student(): Student
    {
        $student=Student::where('user_id',auth()->id())->first();
        if (!$student) {
            $student=Student::where('student_id',auth()->user()->login_id)->first();
            if ($student) $student->update(['user_id'=>auth()->id()]);
        }
        if (!$student) {
            $student=Student::create(['user_id'=>auth()->id(),'student_id'=>auth()->user()->login_id,'name'=>auth()->user()->name,'department'=>'Not set','email'=>auth()->user()->email]);
        }
        return $student;
    }

    public function dashboard()
    {
        $student=$this->student();
        return view('student.dashboard',[
            'student'=>$student,
            'professors'=>Professor::with('subjects')->orderBy('name')->get(),
            'subjects'=>Subject::orderBy('subject_code')->get(),
            'projects'=>Project::with(['professor','subject'])->where('student_id',$student->id)->latest()->get(),
            'marks'=>$student->marks()->with('subject')->get(),
            'attendances'=>$student->attendances()->with('subject')->get(),
            'archive'=>Project::with(['student','professor','subject'])->where('status','approved')->latest()->get(),
            'assignments'=>AssignmentPost::with(['professor','subject','submissions'=>fn($q)=>$q->where('student_id',$student->id)])->where('due_at','>=',now())->orWhereHas('submissions',fn($q)=>$q->where('student_id',$student->id))->latest()->get(),
            'notifications'=>PortalNotification::where('recipient_type','student')->where('recipient_id',$student->id)->latest()->take(30)->get(),
        ]);
    }


    public function submitAssignment(Request $request, AssignmentPost $assignment)
    {
        $student=$this->student();
        abort_if($assignment->due_at->isPast(),403,'The submission deadline has passed.');
        $data=$request->validate(['project_file'=>'required|file|mimes:pdf,doc,docx,ppt,pptx,zip,rar|max:20480']);
        $submission=AssignmentSubmission::where('assignment_post_id',$assignment->id)->where('student_id',$student->id)->first();
        $path=$request->file('project_file')->store('assignment-submissions','public');
        if($submission) {
            if($submission->file_path) \Illuminate\Support\Facades\Storage::disk('public')->delete($submission->file_path);
            $submission->update(['file_path'=>$path,'status'=>'pending','feedback'=>null]);
        } else {
            $submission=AssignmentSubmission::create(['assignment_post_id'=>$assignment->id,'student_id'=>$student->id,'file_path'=>$path,'status'=>'pending']);
        }
        PortalNotification::create(['recipient_type'=>'professor','recipient_id'=>$assignment->professor_id,'title'=>'Assignment file submitted','message'=>$student->name.' submitted a file for "'.$assignment->title.'".','url'=>'/professor/dashboard#assignments']);
        return back()->with('success','Assignment file submitted. Professor has been notified.');
    }

    public function markNotificationsRead()
    {
        $student=$this->student();
        PortalNotification::where('recipient_type','student')->where('recipient_id',$student->id)->whereNull('read_at')->update(['read_at'=>now()]);
        return back()->with('success','Notifications marked as read.');
    }

    public function updateProfile(Request $request)
    {
        $student=$this->student();
        $data=$request->validate(['name'=>'required|string|max:255','email'=>'nullable|email|max:255','phone'=>'nullable|string|max:40','department'=>'required|string|max:255','section'=>'nullable|string|max:100','semester'=>'nullable|string|max:100','session'=>'nullable|string|max:100']);
        $student->update($data); $student->user->update(['name'=>$data['name'],'email'=>$data['email'] ?? null]);
        return back()->with('success','Profile updated successfully.');
    }

    public function storeProject(Request $request)
    {
        $student=$this->student();
        $data=$request->validate([
            'professor_id'=>'required|exists:professors,id',
            'subject_id'=>'required|exists:subjects,id',
            'title'=>'required|string|max:255','description'=>'nullable|string|max:5000',
            'project_file'=>'required|file|mimes:pdf,doc,docx,ppt,pptx,zip,rar|max:20480',
        ]);
        $professor = Professor::with('subjects')->findOrFail($data['professor_id']);
        abort_unless($professor->subjects->contains('id', (int) $data['subject_id']), 422, 'The selected course is not assigned to this professor.');
        $path=$request->file('project_file')->store('projects','public');
        $project=Project::create(['student_id'=>$student->id,'professor_id'=>$professor->id,'subject_id'=>$data['subject_id'],'title'=>$data['title'],'description'=>$data['description'] ?? null,'file_path'=>$path,'status'=>'pending']);
        PortalNotification::create(['recipient_type'=>'professor','recipient_id'=>$professor->id,'title'=>'New student project submitted','message'=>$student->name.' submitted .$project->title. for '.$project->subject->subject_name.'.','url'=>'/professor/dashboard#projects']);
        return back()->with('success','Project submitted successfully. Professor has been notified.');
    }
}
