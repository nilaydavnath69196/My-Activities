
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professor Dashboard | University Academic Archive</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portal-ui.css') }}">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f3f7f8;
            font-family: 'Inter', sans-serif;
            color: #123c46;
        }

        .sidebar {
            background: #123c46;
            color: white;
            min-height: 100vh;
            padding: 25px 18px;
            position: sticky;
            top: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 10px 28px;
            border-bottom: 1px solid rgba(255,255,255,.13);
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: linear-gradient(135deg,#0da99b,#08766f);
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        .brand h5 {
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        .brand small {
            color: #a7d4d0;
            font-size: 10px;
        }

        .menu-label {
            color: #8db5b5;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin: 25px 0 10px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            margin-bottom: 6px;
            color: #d5eeee;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            transition: .2s;
        }

        .side-link i { font-size: 17px; }

        .side-link:hover,
        .side-link.active {
            background: #08766f;
            color: white;
        }

        .logout-btn {
            margin-top: 35px;
            border-radius: 10px;
            padding: 11px;
            font-weight: 600;
        }

        .main-area { padding: 30px; }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 15px;
        }

        .topbar h4 {
            font-size: 20px;
            font-weight: 800;
            margin: 0;
        }

        .topbar p {
            color: #829a9c;
            font-size: 12px;
            margin: 5px 0 0;
        }

        .professor-avatar {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: #d9f3ef;
            color: #08766f;
            display: grid;
            place-items: center;
            font-size: 20px;
        }

        .welcome-card {
            background: linear-gradient(115deg,#075b60,#087f76);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .welcome-card:after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
            right: -55px;
            top: -90px;
        }

        .welcome-card h2 {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .welcome-card p {
            color: #d5f3ed;
            font-size: 13px;
            margin: 0;
        }

        .welcome-tag {
            display: inline-block;
            background: rgba(255,255,255,.16);
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 11px;
            margin-bottom: 15px;
        }

        .section-heading {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .section-subtitle {
            color: #829a9c;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .option-card {
            background: white;
            border: 1px solid #e9f0f0;
            border-radius: 16px;
            padding: 22px;
            height: 100%;
            text-decoration: none;
            display: block;
            color: #123c46;
            transition: .25s;
            box-shadow: 0 5px 18px rgba(18,60,70,.035);
        }

        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(18,60,70,.10);
            border-color: #cce9e4;
            color: #08766f;
        }

        .option-icon {
            width: 49px;
            height: 49px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            font-size: 22px;
            margin-bottom: 17px;
        }

        .icon-teal { background: #ddf5f0; color: #078879; }
        .icon-blue { background: #e8efff; color: #3864dc; }
        .icon-purple { background: #f0eaff; color: #8055d8; }
        .icon-green { background: #e4f8ef; color: #219765; }
        .icon-orange { background: #fff1e3; color: #e28b2d; }
        .icon-pink { background: #ffeaf1; color: #d64e82; }
        .icon-cyan { background: #e3f8fc; color: #219bb3; }

        .option-card h5 {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .option-card p {
            color: #829a9c;
            font-size: 11px;
            line-height: 1.6;
            margin: 0;
        }

        .option-arrow {
            color: #9ab5b5;
            float: right;
            font-size: 17px;
        }

        .content-panel {
            display: none;
            background: white;
            border: 1px solid #e9f0f0;
            padding: 25px;
            border-radius: 17px;
            box-shadow: 0 5px 20px rgba(18,60,70,.04);
        }

        .content-panel.active { display: block; }

        .content-panel h4 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #435c62;
        }

        .form-control, .form-select {
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 13px;
            border-color: #dce9e8;
        }

        .btn { border-radius: 9px; font-size: 13px; font-weight: 600; }
        .table { font-size: 13px; vertical-align: middle; }
        .table th { color: #647d80; font-weight: 700; }

        .back-dashboard {
            border: 0;
            background: #e4f5f1;
            color: #08766f;
            padding: 8px 13px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .back-dashboard:hover { background: #d4eee7; }

        .course-badge {
            display: inline-block;
            background: #e0f5f1;
            color: #08766f;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
            margin: 3px;
        }

        @media(max-width: 991px) {
            .sidebar {
                min-height: auto;
                position: relative;
            }
            .main-area { padding: 20px 15px; }
        }

        @media(max-width: 576px) {
            .welcome-card { padding: 23px; }
            .welcome-card h2 { font-size: 21px; }
            .content-panel { padding: 17px; }
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-lg-2 sidebar">

            <div class="brand">
                <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
                <div>
                    <h5>Academic Archive</h5>
                    <small>PROFESSOR PORTAL</small>
                </div>
            </div>

            <div class="menu-label">MAIN MENU</div>

            <a href="#dashboard-home" class="side-link active">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>

            <a href="#profile" class="side-link">
                <i class="bi bi-person-badge"></i> My Profile
            </a>

            <a href="#students" class="side-link">
                <i class="bi bi-people"></i> Students
            </a>

            <a href="#notifications" class="side-link">
                <i class="bi bi-bell"></i> Notifications
            </a>

            <div class="menu-label">ACADEMIC MANAGEMENT</div>

            <a href="#assignments" class="side-link">
                <i class="bi bi-journal-plus"></i> Assignments
            </a>

            <a href="#projects" class="side-link">
                <i class="bi bi-folder-check"></i> Project Reviews
            </a>

            <a href="#marks" class="side-link">
                <i class="bi bi-award"></i> Student Marks
            </a>

            <a href="#attendance" class="side-link">
                <i class="bi bi-calendar-check"></i> Attendance
            </a>

            <form class="mt-4" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger w-100 logout-btn">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="col-lg-10 main-area">

            <div class="topbar">
                <div>
                    <h4>Professor Dashboard</h4>
                    <p>University Academic Archive & Management System</p>
                </div>

                <div class="professor-avatar">
                    <i class="bi bi-person-workspace"></i>
                </div>
            </div>

            <!-- DASHBOARD HOME -->
            <div id="dashboard-home" class="content-panel active"
                 style="border:0;padding:0;background:transparent;box-shadow:none;">

                <div class="welcome-card">
                    <span class="welcome-tag">
                        <i class="bi bi-stars me-1"></i> PROFESSOR PORTAL
                    </span>

                    <h2>Welcome, {{ auth()->user()->name }}!</h2>
                    <p>Manage your courses, students and academic activities from one place.</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h4 class="section-heading">Professor Control Center</h4>
                <p class="section-subtitle">
                    Select an option to manage your academic responsibilities.
                </p>

                <div class="row g-3">

                    <div class="col-md-6 col-xl-4">
                        <a href="#profile" class="option-card">
                            <div class="option-icon icon-teal"><i class="bi bi-person-badge"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>My Profile</h5>
                            <p>View your professor information and assigned courses.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#students" class="option-card">
                            <div class="option-icon icon-blue"><i class="bi bi-people"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Student List</h5>
                            <p>View the available student information and academic details.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#notifications" class="option-card">
                            <div class="option-icon icon-orange"><i class="bi bi-bell"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Notifications</h5>
                            <p>Check important notifications and system updates.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#assignments" class="option-card">
                            <div class="option-icon icon-purple"><i class="bi bi-journal-plus"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Create Assignment</h5>
                            <p>Publish assignments and review student submissions.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#projects" class="option-card">
                            <div class="option-icon icon-green"><i class="bi bi-folder-check"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Project Reviews</h5>
                            <p>Review, approve or decline student project submissions.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#marks" class="option-card">
                            <div class="option-icon icon-pink"><i class="bi bi-award"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Student Marks</h5>
                            <p>Enter and update CT and assignment marks.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#attendance" class="option-card">
                            <div class="option-icon icon-cyan"><i class="bi bi-calendar-check"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Attendance Management</h5>
                            <p>Record and manage student attendance records.</p>
                        </a>
                    </div>

                </div>
            </div>

            <!-- PROFILE -->
            <section class="content-panel" id="profile">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Professor Profile</h4>

                <div class="mb-3">
                    <p class="mb-2">
                        <strong>Name:</strong> {{ auth()->user()->name }}
                    </p>

                    <p class="mb-2">
                        <strong>Professor ID:</strong> {{ $professor->professor_id }}
                    </p>

                    <p class="mb-2">
                        <strong>Department:</strong> {{ $professor->department }}
                    </p>

                    <strong>Assigned Courses:</strong>

                    <div class="mt-2">
                        @forelse($professor->subjects as $assignedSubject)
                            <span class="course-badge">
                                {{ $assignedSubject->subject_code }} - {{ $assignedSubject->subject_name }}
                            </span>
                        @empty
                            <span class="text-danger">No courses assigned. Please contact Admin.</span>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- NOTIFICATIONS -->
            <section class="content-panel" id="notifications">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h4>Notifications</h4>

                    <form method="POST" action="{{ route('professor.notifications.read') }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary">Mark all read</button>
                    </form>
                </div>

                @forelse($notifications as $n)
                    <div class="border rounded p-3 mb-2 {{ $n->read_at ? '' : 'bg-light' }}">
                        <strong>{{ $n->title }}</strong>
                        <div>{{ $n->message }}</div>
                        <small class="text-muted">
                            {{ $n->created_at->format('d M Y, h:i A') }}
                        </small>
                    </div>
                @empty
                    <p class="text-muted">No notifications yet.</p>
                @endforelse
            </section>

            <!-- ASSIGNMENTS -->
            <section class="content-panel" id="assignments">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Create Assignment / Project Announcement</h4>

                <form method="POST" action="{{ route('professor.assignments.store') }}" class="row g-3">
                    @csrf

                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <select class="form-select" name="subject_id" required>
                            <option value="">Select assigned course</option>
                            @foreach($subjects as $sub)
                                <option value="{{ $sub->id }}">
                                    {{ $sub->subject_code }} - {{ $sub->subject_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title"
                               placeholder="Assignment / Project title" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Last Date & Time</label>
                        <input class="form-control" type="datetime-local" name="due_at"
                               min="{{ now()->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Instructions</label>
                        <textarea class="form-control" name="description" rows="3"
                                  placeholder="Write assignment instructions..."></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success">
                            <i class="bi bi-send me-1"></i> Publish & Notify All Students
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Published Assignments & Student Submissions</h5>

                @forelse($assignments as $assignment)
                    <div class="border rounded p-3 mb-3">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <strong>{{ $assignment->title }}</strong>
                                <div class="text-muted">
                                    {{ $assignment->subject->subject_name }} ·
                                    Deadline: {{ $assignment->due_at->format('d M Y, h:i A') }}
                                </div>
                            </div>

                            <span class="badge text-bg-info">
                                {{ $assignment->submissions->count() }} submissions
                            </span>
                        </div>

                        <p class="mt-2">{{ $assignment->description }}</p>

                        @forelse($assignment->submissions as $sub)
                            <div class="bg-light rounded p-3 mt-2">
                                <strong>
                                    {{ $sub->student->name }} ({{ $sub->student->student_id }})
                                </strong>

                                ·
                                <span class="badge text-bg-{{ $sub->status === 'approved' ? 'success' : ($sub->status === 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($sub->status) }}
                                </span>

                                <div>
                                    <a target="_blank" href="{{ asset('storage/'.$sub->file_path) }}">
                                        Open submitted file
                                    </a>
                                </div>

                                <form method="POST"
                                      action="{{ route('professor.assignment-submissions.review',$sub) }}"
                                      class="row g-2 mt-2">
                                    @csrf
                                    @method('PATCH')

                                    <div class="col-md-3">
                                        <select class="form-select" name="status">
                                            <option value="pending" @selected($sub->status === 'pending')>Pending</option>
                                            <option value="approved" @selected($sub->status === 'approved')>Approve</option>
                                            <option value="rejected" @selected($sub->status === 'rejected')>Decline</option>
                                        </select>
                                    </div>

                                    <div class="col-md-7">
                                        <input class="form-control" name="feedback"
                                               value="{{ $sub->feedback }}"
                                               placeholder="Comment / feedback">
                                    </div>

                                    <div class="col-md-2">
                                        <button class="btn btn-success w-100">Update</button>
                                    </div>
                                </form>
                            </div>
                        @empty
                            <p class="text-muted mt-2">No students have submitted yet.</p>
                        @endforelse
                    </div>
                @empty
                    <p class="text-muted">You have not published any assignment yet.</p>
                @endforelse
            </section>

            <!-- PROJECT REVIEWS -->
            <section class="content-panel" id="projects">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Projects Submitted to You</h4>

                @forelse($projects as $project)
                    <div class="border rounded p-3 mb-3">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <h5>{{ $project->title }}</h5>

                                <div class="text-muted">
                                    {{ $project->student->name }}
                                    ({{ $project->student->student_id }}) ·
                                    {{ $project->subject->subject_code }} -
                                    {{ $project->subject->subject_name }}
                                </div>
                            </div>

                            <span class="badge text-bg-{{ $project->status === 'approved' ? 'success' : ($project->status === 'rejected' ? 'danger' : 'warning') }} align-self-start">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>

                        <p class="mt-2">{{ $project->description }}</p>

                        @if($project->file_path)
                            <a class="btn btn-sm btn-outline-primary"
                               target="_blank"
                               href="{{ asset('storage/'.$project->file_path) }}">
                                <i class="bi bi-file-earmark-arrow-down me-1"></i> Open Project File
                            </a>
                        @endif

                        <form class="row g-2 mt-2" method="POST"
                              action="{{ route('professor.projects.review',$project) }}">
                            @csrf
                            @method('PATCH')

                            <div class="col-md-3">
                                <select name="status" class="form-select">
                                    <option value="pending" @selected($project->status === 'pending')>Pending</option>
                                    <option value="approved" @selected($project->status === 'approved')>Approve</option>
                                    <option value="rejected" @selected($project->status === 'rejected')>Decline</option>
                                </select>
                            </div>

                            <div class="col-md-7">
                                <input class="form-control" name="feedback"
                                       placeholder="Comment / feedback"
                                       value="{{ $project->feedback }}">
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-success w-100">Save Review</button>
                            </div>
                        </form>
                    </div>
                @empty
                    <p class="text-muted">No projects have been submitted to you yet.</p>
                @endforelse
            </section>

            <!-- STUDENTS -->
            <section class="content-panel" id="students">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Student List</h4>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Section</th>
                        </tr>

                        @forelse($students as $s)
                            <tr>
                                <td>{{ $s->student_id }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->department }}</td>
                                <td>{{ $s->section }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No students available.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </section>

            <!-- MARKS -->
            <section class="content-panel" id="marks">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Enter / Update Student Marks</h4>

                <form method="POST" action="{{ route('professor.marks.store') }}" class="row g-3">
                    @csrf

                    <div class="col-md-4">
                        <label class="form-label">Student</label>
                        <select class="form-select" name="student_id" required>
                            <option value="">Select student</option>
                            @foreach($students as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->student_id }} - {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Subject</label>
                        <select class="form-select" name="subject_id" required>
                            <option value="">Select subject</option>
                            @foreach($subjects as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->subject_code }} - {{ $s->subject_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">CT Mark (0-100)</label>
                        <input class="form-control" type="number" name="ct_mark"
                               min="0" max="100" step="0.01" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Assignment (0-100)</label>
                        <input class="form-control" type="number" name="assignment_mark"
                               min="0" max="100" step="0.01" required>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success">Save Marks</button>
                    </div>
                </form>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Published Marks</h5>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>CT</th>
                            <th>Assignment</th>
                        </tr>

                        @foreach($marks as $m)
                            <tr>
                                <td>{{ $m->student->name }}</td>
                                <td>{{ $m->subject->subject_code }}</td>
                                <td>{{ $m->ct_mark }}</td>
                                <td>{{ $m->assignment_mark }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>

            <!-- ATTENDANCE -->
            <section class="content-panel" id="attendance">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Record Attendance</h4>

                <form method="POST" action="{{ route('professor.attendance.store') }}" class="row g-3">
                    @csrf

                    <div class="col-md-4">
                        <label class="form-label">Student</label>
                        <select class="form-select" name="student_id" required>
                            <option value="">Select student</option>
                            @foreach($students as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->student_id }} - {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Subject</label>
                        <select class="form-select" name="subject_id" required>
                            <option value="">Select subject</option>
                            @foreach($subjects as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->subject_code }} - {{ $s->subject_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Total Classes</label>
                        <input class="form-control" type="number" name="total_classes"
                               min="0" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Present</label>
                        <input class="form-control" type="number" name="present"
                               min="0" required>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success">Save Attendance</button>
                    </div>
                </form>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Attendance Records</h5>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Percentage</th>
                        </tr>

                        @foreach($attendances as $a)
                            <tr>
                                <td>{{ $a->student->name }}</td>
                                <td>{{ $a->subject->subject_code }}</td>
                                <td>{{ $a->present }}/{{ $a->total_classes }}</td>
                                <td>{{ $a->absent }}</td>
                                <td>{{ number_format($a->percentage,2) }}%</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>

        </main>
    </div>
</div>

<script>
/* DASHBOARD OPTION NAVIGATION */
(function () {
    const panels = document.querySelectorAll('.content-panel');
    const links = document.querySelectorAll('.side-link');
    const backButtons = document.querySelectorAll('.back-dashboard');

    function showPanel(panelId) {
        panels.forEach(panel => {
            panel.classList.toggle('active', panel.id === panelId);
        });

        links.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === '#' + panelId);
        });

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function (event) {
            const panelId = this.getAttribute('href').substring(1);
            const target = document.getElementById(panelId);

            if (target && target.classList.contains('content-panel')) {
                event.preventDefault();
                showPanel(panelId);
            }
        });
    });

    backButtons.forEach(button => {
        button.addEventListener('click', function () {
            showPanel('dashboard-home');
        });
    });

    showPanel('dashboard-home');
})();
</script>

</body>
</html>
