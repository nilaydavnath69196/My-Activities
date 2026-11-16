<?php

namespace App\Http\Controllers;

use App\Models\{Professor, Project, Student, Subject, Mark, Attendance, AssignmentPost, AssignmentSubmission, PortalNotification};
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    private function professor(): Professor
    {
        $prof=Professor::where('user_id',auth()->id())->first();
        if (!$prof) {
            $prof=Professor::where('professor_id',auth()->user()->login_id)->first();
            if ($prof) $prof->update(['user_id'=>auth()->id()]);
        }
        if (!$prof) {
            $prof=Professor::create(['user_id'=>auth()->id(),'professor_id'=>auth()->user()->login_id,'name'=>auth()->user()->name,'department'=>'Not set','email'=>auth()->user()->email]);
        }
        return $prof->load('subjects');
    }

    public function dashboard()
    {
        $prof=$this->professor();
        $subjectIds=$prof->subjects->pluck('id');
        return view('professor.dashboard',[
            'professor'=>$prof,
            'students'=>Student::with('user')->orderBy('student_id')->get(),
            'subjects'=>$prof->subjects->sortBy('subject_code'),
            'projects'=>Project::with(['student','subject'])->where('professor_id',$prof->id)->whereIn('subject_id',$subjectIds)->latest()->get(),
            'marks'=>Mark::with(['student','subject'])->where('professor_id',$prof->id)->whereIn('subject_id',$subjectIds)->latest()->get(),
            'attendances'=>Attendance::with(['student','subject'])->where('professor_id',$prof->id)->whereIn('subject_id',$subjectIds)->latest()->get(),
            'assignments'=>AssignmentPost::with(['subject','submissions.student'])->where('professor_id',$prof->id)->latest()->get(),
            'notifications'=>PortalNotification::where('recipient_type','professor')->where('recipient_id',$prof->id)->latest()->take(30)->get(),
        ]);
    }

    public function reviewProject(Request $request, Project $project)
    {
        $prof=$this->professor();
        abort_unless($project->professor_id===$prof->id && $prof->subjects->contains('id', $project->subject_id),403);
        $data=$request->validate(['status'=>'required|in:approved,rejected,pending','feedback'=>'nullable|string|max:5000']);
        $project->update($data);
        PortalNotification::create(['recipient_type'=>'student','recipient_id'=>$project->student_id,'title'=>'Project review updated','message'=>'Professor updated '.$project->title.' to '.ucfirst($data['status']).'.'.(!empty($data['feedback'])?' Comment: '.$data['feedback']:''),'url'=>'/student/dashboard#myprojects']);
        return back()->with('success','Project review saved and student notified.');
    }


    public function createAssignment(Request $request)
    {
        $prof=$this->professor();
        $data=$request->validate([
            'subject_id'=>'required|exists:subjects,id',
            'title'=>'required|string|max:255',
            'description'=>'nullable|string|max:5000',
            'due_at'=>'required|date|after:now',
        ]);
        abort_unless($prof->subjects->contains('id',(int)$data['subject_id']),403,'You are not assigned to this course.');
        $assignment=AssignmentPost::create(['professor_id'=>$prof->id]+$data);
        foreach(Student::all() as $student) {
            PortalNotification::create(['recipient_type'=>'student','recipient_id'=>$student->id,'title'=>'New assignment announced','message'=>$prof->name.' posted "'.$assignment->title.'" for '.$assignment->subject->subject_name.'. Deadline: '.$assignment->due_at->format('d M Y, h:i A'),'url'=>'/student/dashboard#assignments']);
        }
        return back()->with('success','Assignment published. All students have been notified.');
    }

    public function reviewAssignmentSubmission(Request $request, AssignmentSubmission $submission)
    {
        $prof=$this->professor();
        $submission->load('assignment');
        abort_unless((int)$submission->assignment->professor_id===(int)$prof->id && $prof->subjects->contains('id',(int)$submission->assignment->subject_id),403);
        $data=$request->validate(['status'=>'required|in:pending,approved,rejected','feedback'=>'nullable|string|max:5000']);
        $submission->update($data);
        PortalNotification::create(['recipient_type'=>'student','recipient_id'=>$submission->student_id,'title'=>'Assignment submission updated','message'=>'Your submission for "'.$submission->assignment->title.'" is now '.ucfirst($data['status']).'.'.(!empty($data['feedback'])?' Comment: '.$data['feedback']:''),'url'=>'/student/dashboard#assignments']);
        return back()->with('success','Submission review saved and student notified.');
    }

    public function markNotificationsRead()
    {
        $prof=$this->professor();
        PortalNotification::where('recipient_type','professor')->where('recipient_id',$prof->id)->whereNull('read_at')->update(['read_at'=>now()]);
        return back()->with('success','Notifications marked as read.');
    }

    public function saveMarks(Request $request)
    {
        $prof=$this->professor();
        $data=$request->validate(['student_id'=>'required|exists:students,id','subject_id'=>'required|exists:subjects,id','ct_mark'=>'required|numeric|min:0|max:100','assignment_mark'=>'required|numeric|min:0|max:100']);
        abort_unless($prof->subjects->contains('id', (int) $data['subject_id']),403,'You are not assigned to this course.');
        $existing=Mark::where('student_id',$data['student_id'])->where('subject_id',$data['subject_id'])->first();
        abort_if($existing && (int)$existing->professor_id !== (int)$prof->id,403,'This student course record belongs to another professor.');
        Mark::updateOrCreate(['student_id'=>$data['student_id'],'subject_id'=>$data['subject_id']],['professor_id'=>$prof->id,'ct_mark'=>$data['ct_mark'],'assignment_mark'=>$data['assignment_mark']]);
        return back()->with('success','Marks saved successfully.');
    }

    public function saveAttendance(Request $request)
    {
        $prof=$this->professor();
        $data=$request->validate(['student_id'=>'required|exists:students,id','subject_id'=>'required|exists:subjects,id','total_classes'=>'required|integer|min:0','present'=>'required|integer|min:0']);
        abort_unless($prof->subjects->contains('id', (int) $data['subject_id']),403,'You are not assigned to this course.');
        if($data['present']>$data['total_classes']) return back()->withErrors(['present'=>'Present classes cannot exceed total classes.'])->withInput();
        $existing=Attendance::where('student_id',$data['student_id'])->where('subject_id',$data['subject_id'])->first();
        abort_if($existing && (int)$existing->professor_id !== (int)$prof->id,403,'This student course record belongs to another professor.');
        $absent=$data['total_classes']-$data['present'];
        $percent=$data['total_classes'] ? ($data['present']/$data['total_classes'])*100 : 0;
        Attendance::updateOrCreate(['student_id'=>$data['student_id'],'subject_id'=>$data['subject_id']],['professor_id'=>$prof->id,'total_classes'=>$data['total_classes'],'present'=>$data['present'],'absent'=>$absent,'percentage'=>$percent]);
        return back()->with('success','Attendance saved successfully.');
    }
}
