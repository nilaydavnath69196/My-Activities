<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,AdminController,ProfessorController,StudentController};

Route::get('/',fn()=>redirect()->route('login'));
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function(){
 Route::get('/student/dashboard',[StudentController::class,'dashboard'])->middleware('role:student')->name('student.dashboard');
 Route::put('/student/profile',[StudentController::class,'updateProfile'])->middleware('role:student')->name('student.profile.update');
 Route::post('/student/projects',[StudentController::class,'storeProject'])->middleware('role:student')->name('student.projects.store');
 Route::post('/student/assignments/{assignment}/submit',[StudentController::class,'submitAssignment'])->middleware('role:student')->name('student.assignments.submit');
 Route::post('/student/notifications/read',[StudentController::class,'markNotificationsRead'])->middleware('role:student')->name('student.notifications.read');
 Route::get('/professor/dashboard',[ProfessorController::class,'dashboard'])->middleware('role:professor')->name('professor.dashboard');
 Route::patch('/professor/projects/{project}/review',[ProfessorController::class,'reviewProject'])->middleware('role:professor')->name('professor.projects.review');
 Route::post('/professor/assignments',[ProfessorController::class,'createAssignment'])->middleware('role:professor')->name('professor.assignments.store');
 Route::patch('/professor/assignment-submissions/{submission}/review',[ProfessorController::class,'reviewAssignmentSubmission'])->middleware('role:professor')->name('professor.assignment-submissions.review');
 Route::post('/professor/notifications/read',[ProfessorController::class,'markNotificationsRead'])->middleware('role:professor')->name('professor.notifications.read');
 Route::post('/professor/marks',[ProfessorController::class,'saveMarks'])->middleware('role:professor')->name('professor.marks.store');
 Route::post('/professor/attendance',[ProfessorController::class,'saveAttendance'])->middleware('role:professor')->name('professor.attendance.store');
 Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('role:admin')->name('admin.dashboard');
 Route::post('/admin/accounts',[AdminController::class,'storeAccount'])->middleware('role:admin')->name('admin.accounts.store');
 Route::put('/admin/professors/{professor}/courses',[AdminController::class,'updateProfessorCourses'])->middleware('role:admin')->name('admin.professors.courses.update');
 Route::delete('/admin/users/{user}',[AdminController::class,'destroyUser'])->middleware('role:admin')->name('admin.users.destroy');
 Route::post('/admin/subjects',[AdminController::class,'storeSubject'])->middleware('role:admin')->name('admin.subjects.store');
});

Route::get('/student/login',fn()=>view('auth.student-login'))->name('student.login');
Route::get('/professor/login',fn()=>view('auth.professor-login'))->name('professor.login');
Route::get('/admin/login',fn()=>view('auth.admin-login'))->name('admin.login');
