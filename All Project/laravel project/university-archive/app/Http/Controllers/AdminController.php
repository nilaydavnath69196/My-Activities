<?php

namespace App\Http\Controllers;

use App\Models\{User, Student, Professor, Project, Subject};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'students' => Student::with('user')->latest()->get(),
            'professors' => Professor::with(['user', 'subjects'])->latest()->get(),
            'users' => User::latest()->get(),
            'subjects' => Subject::orderBy('subject_code')->get(),
            'stats' => ['students'=>Student::count(),'professors'=>Professor::count(),'projects'=>Project::count(),'pending'=>Project::where('status','pending')->count()],
        ]);
    }

    public function storeAccount(Request $request)
    {
        $data = $request->validate([
            'role'=>'required|in:student,professor', 'name'=>'required|string|max:255',
            'login_id'=>'required|string|max:100|unique:users,login_id', 'password'=>'required|string|min:6',
            'email'=>'nullable|email|max:255', 'department'=>'required|string|max:255',
            'phone'=>'nullable|string|max:40', 'student_id'=>'required_if:role,student|nullable|string|max:100|unique:students,student_id',
            'professor_id'=>'required_if:role,professor|nullable|string|max:100|unique:professors,professor_id',
            'section'=>'nullable|string|max:100','semester'=>'nullable|string|max:100','session'=>'nullable|string|max:100',
            'subject_ids'=>'required_if:role,professor|array',
            'subject_ids.*'=>'integer|distinct|exists:subjects,id',
        ]);

        $user = User::create(['name'=>$data['name'],'login_id'=>$data['login_id'],'email'=>$data['email'] ?? null,'password'=>Hash::make($data['password']),'role'=>$data['role']]);
        if ($data['role']==='student') {
            Student::create(['user_id'=>$user->id,'student_id'=>$data['student_id'],'name'=>$data['name'],'department'=>$data['department'],'section'=>$data['section'] ?? null,'semester'=>$data['semester'] ?? null,'session'=>$data['session'] ?? null,'phone'=>$data['phone'] ?? null,'email'=>$data['email'] ?? null]);
        } else {
            $professor = Professor::create(['user_id'=>$user->id,'professor_id'=>$data['professor_id'],'name'=>$data['name'],'department'=>$data['department'],'phone'=>$data['phone'] ?? null,'email'=>$data['email'] ?? null]);
            $professor->subjects()->sync($data['subject_ids'] ?? []);
        }
        return back()->with('success', ucfirst($data['role']).' account created successfully.');
    }

    public function updateProfessorCourses(Request $request, Professor $professor)
    {
        $data = $request->validate([
            'subject_ids' => 'required|array|min:1',
            'subject_ids.*' => 'integer|distinct|exists:subjects,id',
        ]);
        $professor->subjects()->sync($data['subject_ids']);
        return back()->with('success', 'Professor course assignments updated successfully.');
    }

    public function destroyUser(User $user)
    {
        abort_if($user->role==='admin', 403, 'Admin accounts cannot be deleted here.');
        $user->delete();
        return back()->with('success','User account deleted.');
    }

    public function storeSubject(Request $request)
    {
        $data=$request->validate(['subject_code'=>'required|string|max:50|unique:subjects,subject_code','subject_name'=>'required|string|max:255','credit'=>'required|integer|min:1|max:10']);
        Subject::create($data);
        return back()->with('success','Subject added successfully.');
    }
}
