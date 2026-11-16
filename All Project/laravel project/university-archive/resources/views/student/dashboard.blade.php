
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard | University Academic Archive</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portal-ui.css') }}">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f4f7fc;
            font-family: 'Inter', sans-serif;
            color: #172554;
        }

        .sidebar {
            background: #111d3d;
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
            border-bottom: 1px solid rgba(255,255,255,.12);
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: linear-gradient(135deg,#4776f5,#7957e8);
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
            color: #9eadd0;
            font-size: 10px;
        }

        .menu-label {
            color: #8494ba;
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
            color: #c5d0e8;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            transition: .2s;
        }

        .side-link i { font-size: 17px; }

        .side-link:hover,
        .side-link.active {
            background: #263b70;
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
            color: #8490a8;
            font-size: 12px;
            margin: 5px 0 0;
        }

        .student-avatar {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: #e0e9ff;
            color: #315bd5;
            display: grid;
            place-items: center;
            font-size: 20px;
        }

        .welcome-card {
            background: linear-gradient(115deg,#2449b7,#6549d9);
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
            color: #e1e8ff;
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
            color: #8a96ad;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .option-card {
            background: white;
            border: 1px solid #edf0f7;
            border-radius: 16px;
            padding: 22px;
            height: 100%;
            text-decoration: none;
            display: block;
            color: #172554;
            transition: .25s;
            box-shadow: 0 5px 18px rgba(25,45,90,.035);
        }

        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(25,45,90,.10);
            border-color: #d9e3ff;
            color: #2449b7;
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

        .icon-blue { background: #e8efff; color: #3864dc; }
        .icon-purple { background: #f0eaff; color: #8055d8; }
        .icon-green { background: #e4f8ef; color: #219765; }
        .icon-orange { background: #fff1e3; color: #e28b2d; }
        .icon-pink { background: #ffeaf1; color: #d64e82; }
        .icon-cyan { background: #e3f8fc; color: #219bb3; }
        .icon-yellow { background: #fff7dc; color: #c49320; }

        .option-card h5 {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .option-card p {
            color: #8792a8;
            font-size: 11px;
            line-height: 1.6;
            margin: 0;
        }

        .option-arrow {
            color: #9aa6bd;
            float: right;
            font-size: 17px;
        }

        .content-panel {
            display: none;
            background: white;
            border: 1px solid #edf0f7;
            padding: 25px;
            border-radius: 17px;
            box-shadow: 0 5px 20px rgba(25,45,90,.04);
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
            color: #43516d;
        }

        .form-control, .form-select {
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 13px;
            border-color: #e2e7f0;
        }

        .btn { border-radius: 9px; font-size: 13px; font-weight: 600; }
        .table { font-size: 13px; vertical-align: middle; }
        .table th { color: #64718a; font-weight: 700; }

        .back-dashboard {
            border: 0;
            background: #edf2ff;
            color: #315bd5;
            padding: 8px 13px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .back-dashboard:hover { background: #dfe8ff; }

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
                    <small>STUDENT PORTAL</small>
                </div>
            </div>

            <div class="menu-label">MAIN MENU</div>

            <a href="#dashboard-home" class="side-link active">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>

            <a href="#profile" class="side-link">
                <i class="bi bi-person-circle"></i> My Profile
            </a>

            <a href="#notifications" class="side-link">
                <i class="bi bi-bell"></i> Notifications
            </a>

            <div class="menu-label">ACADEMIC</div>

            <a href="#assignments" class="side-link">
                <i class="bi bi-journal-text"></i> Assignments
            </a>

            <a href="#upload" class="side-link">
                <i class="bi bi-cloud-arrow-up"></i> Upload Project
            </a>

            <a href="#myprojects" class="side-link">
                <i class="bi bi-folder2-open"></i> My Submissions
            </a>

            <a href="#marks" class="side-link">
                <i class="bi bi-award"></i> CT & Assignment Marks
            </a>

            <a href="#attendance" class="side-link">
                <i class="bi bi-calendar-check"></i> Attendance
            </a>

            <a href="#archive" class="side-link">
                <i class="bi bi-archive"></i> Project Archive
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
                    <h4>Student Dashboard</h4>
                    <p>University Academic Archive & Management System</p>
                </div>
                <div class="student-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>

            <!-- DASHBOARD HOME: OPTION CARDS -->
            <div id="dashboard-home" class="content-panel active" style="border:0;padding:0;background:transparent;box-shadow:none;">

                <div class="welcome-card">
                    <span class="welcome-tag">
                        <i class="bi bi-stars me-1"></i> STUDENT PORTAL
                    </span>
                    <h2>Welcome, {{ auth()->user()->name }}!</h2>
                    <p>Manage your academic activities from one place.</p>
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

                <h4 class="section-heading">Explore Your Dashboard</h4>
                <p class="section-subtitle">Choose an option to access your academic information and services.</p>

                <div class="row g-3">

                    <div class="col-md-6 col-xl-4">
                        <a href="#profile" class="option-card">
                            <div class="option-icon icon-blue"><i class="bi bi-person-vcard"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>My Profile</h5>
                            <p>View and update your personal and academic information.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#notifications" class="option-card">
                            <div class="option-icon icon-orange"><i class="bi bi-bell"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Notifications</h5>
                            <p>Check important announcements and recent updates.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#assignments" class="option-card">
                            <div class="option-icon icon-purple"><i class="bi bi-journal-check"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Assignments</h5>
                            <p>View assignments and submit your academic work.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#upload" class="option-card">
                            <div class="option-icon icon-green"><i class="bi bi-cloud-arrow-up"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Upload Project</h5>
                            <p>Submit your project to the assigned professor and course.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#myprojects" class="option-card">
                            <div class="option-icon icon-cyan"><i class="bi bi-folder2-open"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>My Submissions</h5>
                            <p>Track your submitted projects and professor feedback.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#marks" class="option-card">
                            <div class="option-icon icon-yellow"><i class="bi bi-award"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>CT & Assignment Marks</h5>
                            <p>Access your published academic marks.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#attendance" class="option-card">
                            <div class="option-icon icon-pink"><i class="bi bi-calendar-check"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Attendance</h5>
                            <p>Check your subject-wise attendance records.</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <a href="#archive" class="option-card">
                            <div class="option-icon icon-blue"><i class="bi bi-archive"></i></div>
                            <i class="bi bi-arrow-up-right option-arrow"></i>
                            <h5>Project Archive</h5>
                            <p>Explore approved academic projects in the archive.</p>
                        </a>
                    </div>

                </div>
            </div>

            <!-- NOTIFICATIONS -->
            <section class="content-panel" id="notifications">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h4>Notifications</h4>
                    <form method="POST" action="{{ route('student.notifications.read') }}">
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm">Mark all read</button>
                    </form>
                </div>

                @forelse($notifications as $n)
                    <div class="border rounded p-3 mb-2 {{ $n->read_at ? '' : 'bg-light' }}">
                        <strong>{{ $n->title }}</strong>
                        <div>{{ $n->message }}</div>
                        <small class="text-muted">{{ $n->created_at->format('d M Y, h:i A') }}</small>
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

                <h4>Assignments & Project Announcements</h4>

                @forelse($assignments as $assignment)
                    <div class="border rounded p-3 mb-3">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <h5>{{ $assignment->title }}</h5>
                                <div class="text-muted">
                                    {{ $assignment->subject->subject_name }} · Professor {{ $assignment->professor->name }}
                                </div>
                            </div>
                            <span class="badge text-bg-warning">
                                Deadline: {{ $assignment->due_at->format('d M Y, h:i A') }}
                            </span>
                        </div>

                        <p class="mt-2">{{ $assignment->description }}</p>

                        @php($mySubmission = $assignment->submissions->first())

                        @if($mySubmission)
                            <div class="alert alert-light mb-2">
                                Your submission: <strong>{{ ucfirst($mySubmission->status) }}</strong> ·
                                <a target="_blank" href="{{ asset('storage/'.$mySubmission->file_path) }}">View file</a>

                                @if($mySubmission->feedback)
                                    <div><strong>Professor comment:</strong> {{ $mySubmission->feedback }}</div>
                                @endif
                            </div>
                        @endif

                        @if($assignment->due_at->isFuture())
                            <form method="POST"
                                  action="{{ route('student.assignments.submit', $assignment) }}"
                                  enctype="multipart/form-data"
                                  class="row g-2">
                                @csrf

                                <div class="col-md-8">
                                    <input class="form-control" type="file" name="project_file"
                                           accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.rar" required>
                                    <small class="text-muted">
                                        PDF, DOC, PPT, ZIP or RAR · max 20MB. Re-uploading replaces your previous file.
                                    </small>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-primary w-100">
                                        {{ $mySubmission ? 'Update Submission' : 'Submit Assignment' }}
                                    </button>
                                </div>
                            </form>
                        @else
                            <p class="text-danger mb-0">Submission deadline has passed.</p>
                        @endif
                    </div>
                @empty
                    <p class="text-muted">No active assignments at this time.</p>
                @endforelse
            </section>

            <!-- PROFILE -->
            <section class="content-panel" id="profile">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>My Profile</h4>

                <form method="POST" action="{{ route('student.profile.update') }}" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{ $student->name }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Student ID</label>
                        <input class="form-control" value="{{ $student->student_id }}" disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $student->email }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input class="form-control" name="phone" value="{{ $student->phone }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Department</label>
                        <input class="form-control" name="department" value="{{ $student->department }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <input class="form-control" name="section" value="{{ $student->section }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Semester</label>
                        <input class="form-control" name="semester" value="{{ $student->semester }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Session</label>
                        <input class="form-control" name="session" value="{{ $student->session }}">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </section>

            <!-- UPLOAD PROJECT -->
            <section class="content-panel" id="upload">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Submit Project to a Professor</h4>

                <form method="POST" action="{{ route('student.projects.store') }}"
                      enctype="multipart/form-data" class="row g-3">
                    @csrf

                    <div class="col-md-6">
                        <label class="form-label">Professor</label>
                        <select class="form-select" id="project_professor" name="professor_id" required>
                            <option value="">Choose professor</option>

                            @foreach($professors as $p)
                                <option value="{{ $p->id }}"
                                    data-subjects="{{ $p->subjects->map(fn($subject) => $subject->id)->implode(',') }}"
                                    data-courses="{{ $p->subjects->map(fn($subject) => $subject->subject_code.' - '.$subject->subject_name)->implode(', ') }}">
                                    {{ $p->name }} ({{ $p->professor_id }})
                                </option>
                            @endforeach
                        </select>

                        <small id="professor_courses" class="text-muted">
                            Select a professor to see assigned courses.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <select class="form-select" id="project_subject" name="subject_id" required disabled>
                            <option value="">Choose professor first</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Project Title</label>
                        <input class="form-control" name="title" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Project File (PDF, DOC, PPT, ZIP; max 20MB)</label>
                        <input class="form-control" type="file" name="project_file"
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.rar" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary">Submit Project</button>
                    </div>
                </form>
            </section>

            <!-- MY PROJECTS -->
            <section class="content-panel" id="myprojects">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>My Project Submissions</h4>

                @forelse($projects as $p)
                    <div class="border rounded p-3 mb-3">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $p->title }}</strong>

                            <span class="badge text-bg-{{ $p->status === 'approved' ? 'success' : ($p->status === 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </div>

                        <div class="text-muted">
                            To: {{ $p->professor->name }} · {{ $p->subject->subject_name }}
                        </div>

                        @if($p->feedback)
                            <p class="mt-2 mb-0">
                                <strong>Professor feedback:</strong> {{ $p->feedback }}
                            </p>
                        @endif

                        @if($p->file_path)
                            <a href="{{ asset('storage/'.$p->file_path) }}" target="_blank">
                                Open submitted file
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="text-muted">You have not submitted any projects yet.</p>
                @endforelse
            </section>

            <!-- MARKS -->
            <section class="content-panel" id="marks">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>CT & Assignment Marks</h4>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Subject</th>
                            <th>CT Mark</th>
                            <th>Assignment Mark</th>
                        </tr>

                        @forelse($marks as $m)
                            <tr>
                                <td>{{ $m->subject->subject_code }} - {{ $m->subject->subject_name }}</td>
                                <td>{{ $m->ct_mark }}</td>
                                <td>{{ $m->assignment_mark }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Marks have not been published yet.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </section>

            <!-- ATTENDANCE -->
            <section class="content-panel" id="attendance">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Attendance Record</h4>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Subject</th>
                            <th>Total</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Percentage</th>
                        </tr>

                        @forelse($attendances as $a)
                            <tr>
                                <td>{{ $a->subject->subject_code }} - {{ $a->subject->subject_name }}</td>
                                <td>{{ $a->total_classes }}</td>
                                <td>{{ $a->present }}</td>
                                <td>{{ $a->absent }}</td>
                                <td>{{ number_format($a->percentage,2) }}%</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Attendance has not been recorded yet.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </section>

            <!-- PROJECT ARCHIVE -->
            <section class="content-panel" id="archive">
                <button class="back-dashboard" type="button">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4>Approved Project Archive</h4>

                @forelse($archive as $p)
                    <div class="border rounded p-3 mb-2">
                        <strong>{{ $p->title }}</strong>

                        <div class="text-muted">
                            {{ $p->subject->subject_name }} ·
                            Submitted by {{ $p->student->name }} ·
                            Supervisor {{ $p->professor->name }}
                        </div>

                        @if($p->file_path)
                            <a target="_blank" href="{{ asset('storage/'.$p->file_path) }}">
                                View Project
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="text-muted">No approved projects in the archive yet.</p>
                @endforelse
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


/* EXISTING PROFESSOR AND COURSE SELECTION LOGIC */
(function () {
    const professorSelect = document.getElementById('project_professor');
    const subjectSelect = document.getElementById('project_subject');
    const courseNote = document.getElementById('professor_courses');

    const allSubjects = @json($subjects->map(fn($subject) => [
        'id' => $subject->id,
        'label' => $subject->subject_code.' - '.$subject->subject_name
    ])->values());

    function updateProfessorCourses() {
        const selected = professorSelect.options[professorSelect.selectedIndex];

        subjectSelect.innerHTML = '<option value="">Choose course</option>';
        subjectSelect.disabled = true;

        if (!selected || !selected.value) {
            courseNote.textContent = 'Select a professor to see assigned courses.';
            return;
        }

        const ids = (selected.dataset.subjects || '').split(',').filter(Boolean);
        const names = selected.dataset.courses || '';

        courseNote.textContent = ids.length
            ? 'Assigned courses: ' + names
            : 'No course has been assigned to this professor yet.';

        allSubjects.filter(subject => ids.includes(String(subject.id))).forEach(subject => {
            const option = document.createElement('option');
            option.value = subject.id;
            option.textContent = subject.label;
            subjectSelect.appendChild(option);
        });

        subjectSelect.disabled = ids.length === 0;

        if (ids.length === 1) {
            subjectSelect.value = ids[0];
        }
    }

    professorSelect.addEventListener('change', updateProfessorCourses);
    updateProfessorCourses();
})();
</script>

</body>
</html>
