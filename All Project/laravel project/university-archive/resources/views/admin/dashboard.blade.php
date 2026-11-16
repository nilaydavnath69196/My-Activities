
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | University Academic Archive</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portal-ui.css') }}">

    <style>
        * { box-sizing: border-box; }

        body {
            background: #f4f5fb;
            font-family: 'Inter', sans-serif;
            color: #20243a;
        }

        .sidebar {
            background: linear-gradient(180deg, #241044, #35146b);
            min-height: 100vh;
            padding: 28px 18px;
            color: white;
        }

        .brand {
            font-size: 19px;
            font-weight: 800;
            padding: 0 10px;
            margin-bottom: 35px;
        }

        .brand i { color: #c4b5fd; }

        .menu-title {
            color: #b9a8d8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            padding: 0 12px;
            margin: 22px 0 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #e9ddff;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #7c3aed;
            color: white;
        }

        .sidebar a i { font-size: 17px; }

        .logout-btn {
            margin-top: 30px;
            border-radius: 10px;
            padding: 11px;
            font-weight: 600;
        }

        .main-content { padding: 30px; }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h4 {
            font-weight: 800;
            margin: 0;
        }

        .welcome {
            background: linear-gradient(120deg, #35146b, #6d28d9, #8b5cf6);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }

        .welcome h2 {
            font-weight: 800;
            font-size: 25px;
        }

        .welcome p {
            color: #e9ddff;
            margin-bottom: 0;
        }

        .welcome-icon {
            font-size: 75px;
            opacity: .2;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 18px #1725540b;
            height: 100%;
            border: 1px solid #eeeaf5;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .stat-card h3 {
            font-size: 28px;
            font-weight: 800;
            color: #6d28d9;
            margin-bottom: 4px;
        }

        .stat-card p {
            color: #77788c;
            font-size: 13px;
            margin: 0;
        }

        .option-card {
            background: white;
            border: 1px solid #eeeaf5;
            border-radius: 16px;
            padding: 23px;
            height: 100%;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 4px 15px #17255408;
        }

        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px #6d28d91c;
            border-color: #c4b5fd;
        }

        .option-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 23px;
            margin-bottom: 17px;
        }

        .option-card h6 {
            font-weight: 800;
            margin-bottom: 7px;
        }

        .option-card p {
            font-size: 12px;
            color: #77788c;
            margin: 0;
        }

        .panel {
            background: white;
            border: 1px solid #eeeaf5;
            border-radius: 17px;
            padding: 25px;
            box-shadow: 0 4px 18px #17255408;
            margin-bottom: 22px;
        }

        .panel h4 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .section-heading {
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .content-panel { display: none; }
        .content-panel.active { display: block; }

        .form-label {
            font-size: 13px;
            font-weight: 600;
        }

        .form-control, .form-select {
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 13px;
        }

        .btn {
            border-radius: 9px;
            font-weight: 600;
            font-size: 13px;
            padding: 10px 16px;
        }

        .table { font-size: 13px; vertical-align: middle; }
        .table th { color: #68677a; font-weight: 700; white-space: nowrap; }
        .table td { padding: 13px 10px; }

        .back-btn { margin-bottom: 20px; }

        @media(max-width: 991px) {
            .sidebar { min-height: auto; }
            .main-content { padding: 18px; }
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-lg-2 sidebar">

            <div class="brand">
                <i class="bi bi-shield-lock-fill me-2"></i>
                Admin Panel
            </div>

            <div class="menu-title">MAIN MENU</div>

            <a href="#dashboard" class="active">
                <i class="bi bi-grid"></i> Dashboard
            </a>

            <a href="#create">
                <i class="bi bi-person-plus"></i> Create Accounts
            </a>

            <a href="#students">
                <i class="bi bi-mortarboard"></i> Students
            </a>

            <a href="#professors">
                <i class="bi bi-person-workspace"></i> Professors
            </a>

            <a href="#subjects">
                <i class="bi bi-book"></i> Subjects
            </a>

            <a href="#users">
                <i class="bi bi-people"></i> All Users
            </a>

            <form class="mt-4" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger w-100 logout-btn">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="col-lg-10 main-content">

            <div class="topbar">
                <div>
                    <h4>Admin Dashboard</h4>
                    <small class="text-muted">Manage your university system</small>
                </div>

                <div class="text-end">
                    <span class="badge text-bg-light p-2">
                        <i class="bi bi-shield-check text-primary me-1"></i>
                        Administrator
                    </span>
                </div>
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

            <!-- DASHBOARD HOME -->
            <div id="dashboard" class="content-panel active">

                <div class="welcome">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2>Welcome, {{ auth()->user()->name }}!</h2>
                            <p>University Academic Archive & Management System</p>
                            <p class="mt-2 small">
                                Manage students, professors, subjects and accounts from one place.
                            </p>
                        </div>
                        <div class="col-md-3 text-end d-none d-md-block">
                            <i class="bi bi-shield-lock-fill welcome-icon"></i>
                        </div>
                    </div>
                </div>

                <!-- STATISTICS -->
                <div class="row g-3 mb-4">

                    @foreach([
                        ['Students', $stats['students'], 'bi-mortarboard', '#ede9fe', '#6d28d9'],
                        ['Professors', $stats['professors'], 'bi-person-workspace', '#dbeafe', '#2563eb'],
                        ['Projects', $stats['projects'], 'bi-folder-check', '#dcfce7', '#16a34a'],
                        ['Pending Reviews', $stats['pending'], 'bi-clock-history', '#ffedd5', '#ea580c']
                    ] as $s)

                        <div class="col-6 col-xl-3">
                            <div class="stat-card">
                                <div class="stat-icon" style="background:{{ $s[3] }};color:{{ $s[4] }}">
                                    <i class="bi {{ $s[2] }}"></i>
                                </div>
                                <h3>{{ $s[1] }}</h3>
                                <p>{{ $s[0] }}</p>
                            </div>
                        </div>

                    @endforeach

                </div>

                <!-- QUICK OPTIONS -->
                <h5 class="section-heading">Management Options</h5>

                <div class="row g-3">

                    <div class="col-md-6 col-xl-4">
                        <div class="option-card" onclick="showPanel('create')">
                            <div class="option-icon" style="background:#ede9fe;color:#6d28d9">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <h6>Create Accounts</h6>
                            <p>Create new student and professor accounts.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="option-card" onclick="showPanel('students')">
                            <div class="option-icon" style="background:#dbeafe;color:#2563eb">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <h6>Students</h6>
                            <p>View all registered students.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="option-card" onclick="showPanel('professors')">
                            <div class="option-icon" style="background:#dcfce7;color:#16a34a">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <h6>Professors</h6>
                            <p>Manage professors and assigned courses.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="option-card" onclick="showPanel('subjects')">
                            <div class="option-icon" style="background:#ffedd5;color:#ea580c">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <h6>Subjects</h6>
                            <p>Add and view university subjects.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="option-card" onclick="showPanel('users')">
                            <div class="option-icon" style="background:#fce7f3;color:#db2777">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h6>All Users</h6>
                            <p>View and manage system user accounts.</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CREATE ACCOUNTS -->
            <section id="create" class="content-panel">

                <button class="btn btn-outline-secondary back-btn" onclick="showPanel('dashboard')">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <div class="panel">
                    <h4><i class="bi bi-person-plus-fill text-primary me-2"></i>Create Student / Professor Account</h4>

                    <form method="POST" action="{{ route('admin.accounts.store') }}" class="row g-3">
                        @csrf

                        <div class="col-md-4">
                            <label class="form-label">Account Type</label>
                            <select class="form-select" name="role" id="role" onchange="toggleRoleFields()" required>
                                <option value="student">Student</option>
                                <option value="professor">Professor</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" name="name" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Login ID</label>
                            <input class="form-control" name="login_id" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" minlength="6" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Department</label>
                            <input class="form-control" name="department" value="Computer Science and Engineering" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input class="form-control" name="phone">
                        </div>

                        <div class="col-md-4 student-field">
                            <label class="form-label">Student ID</label>
                            <input class="form-control" name="student_id">
                        </div>

                        <div class="col-md-4 professor-field d-none">
                            <label class="form-label">Professor ID</label>
                            <input class="form-control" name="professor_id">
                        </div>

                        <div class="col-md-8 professor-field d-none">
                            <label class="form-label">Assign Courses (select multiple)</label>
                            <select class="form-select" name="subject_ids[]" multiple size="4">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl to select more than one course.</small>
                        </div>

                        <div class="col-md-4 student-field">
                            <label class="form-label">Section</label>
                            <input class="form-control" name="section">
                        </div>

                        <div class="col-md-4 student-field">
                            <label class="form-label">Semester</label>
                            <input class="form-control" name="semester">
                        </div>

                        <div class="col-md-4 student-field">
                            <label class="form-label">Session</label>
                            <input class="form-control" name="session">
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i> Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- SUBJECTS -->
            <section id="subjects" class="content-panel">

                <button class="btn btn-outline-secondary back-btn" onclick="showPanel('dashboard')">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <div class="panel">
                    <h4><i class="bi bi-book text-warning me-2"></i>Add Subject</h4>

                    <form method="POST" action="{{ route('admin.subjects.store') }}" class="row g-2">
                        @csrf

                        <div class="col-md-4">
                            <input class="form-control" name="subject_code" placeholder="Subject code" required>
                        </div>

                        <div class="col-md-5">
                            <input class="form-control" name="subject_name" placeholder="Subject name" required>
                        </div>

                        <div class="col-md-2">
                            <input class="form-control" type="number" name="credit" min="1" max="10" value="3" required>
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-success w-100">Add</button>
                        </div>
                    </form>
                </div>

                <div class="panel">
                    <h4>Subject List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Subject</th>
                                    <th>Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->subject_code }}</td>
                                        <td>{{ $subject->subject_name }}</td>
                                        <td>{{ $subject->credit }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            No subjects yet. Add one above.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- STUDENTS -->
            <section id="students" class="content-panel">

                <button class="btn btn-outline-secondary back-btn" onclick="showPanel('dashboard')">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <div class="panel">
                    <h4><i class="bi bi-mortarboard-fill text-primary me-2"></i>All Students</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $s)
                                    <tr>
                                        <td>{{ $s->student_id }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ $s->department }}</td>
                                        <td>{{ $s->user->login_id ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            No students created.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- PROFESSORS -->
            <section id="professors" class="content-panel">

                <button class="btn btn-outline-secondary back-btn" onclick="showPanel('dashboard')">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <h4 class="section-heading">Professors & Assigned Courses</h4>

                @forelse($professors as $p)

                    <div class="panel">

                        <div class="d-flex flex-wrap justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">
                                    {{ $p->name }} ({{ $p->professor_id }})
                                </h6>

                                <div class="text-muted small">
                                    {{ $p->department }} · Login: {{ $p->user->login_id ?? '-' }}
                                </div>

                                <div class="mt-3">
                                    <strong class="small">Current courses:</strong>

                                    @forelse($p->subjects as $assigned)
                                        <span class="badge text-bg-info me-1">
                                            {{ $assigned->subject_code }}
                                        </span>
                                    @empty
                                        <span class="text-danger small">No course assigned</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <hr>

                        <form method="POST" action="{{ route('admin.professors.courses.update', $p) }}" class="row g-2">
                            @csrf
                            @method('PUT')

                            <div class="col-md-9">
                                <label class="form-label">Update assigned courses</label>

                                <select class="form-select" name="subject_ids[]" multiple size="3" required>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            @selected($p->subjects->contains('id', $subject->id))>
                                            {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 align-self-end">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="bi bi-save me-1"></i> Save Courses
                                </button>
                            </div>
                        </form>

                    </div>

                @empty
                    <div class="panel text-center text-muted">
                        No professors created.
                    </div>
                @endforelse

            </section>

            <!-- ALL USERS -->
            <section id="users" class="content-panel">

                <button class="btn btn-outline-secondary back-btn" onclick="showPanel('dashboard')">
                    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                </button>

                <div class="panel">
                    <h4><i class="bi bi-people-fill text-danger me-2"></i>All Users</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Login ID</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->login_id }}</td>
                                        <td>
                                            <span class="badge text-bg-light">
                                                {{ ucfirst($u->role) }}
                                            </span>
                                        </td>

                                        <td>
                                            @if($u->role !== 'admin')
                                                <form method="POST"
                                                    action="{{ route('admin.users.destroy', $u) }}"
                                                    onsubmit="return confirm('Delete this account and its linked records?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted">Protected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<script>
    // Show selected dashboard section
    function showPanel(panelId) {
        document.querySelectorAll('.content-panel').forEach(panel => {
            panel.classList.remove('active');
        });

        const selectedPanel = document.getElementById(panelId);

        if (selectedPanel) {
            selectedPanel.classList.add('active');
        }

        document.querySelectorAll('.sidebar a[href^="#"]').forEach(link => {
            link.classList.remove('active');

            if (link.getAttribute('href') === '#' + panelId) {
                link.classList.add('active');
            }
        });

        window.location.hash = panelId;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Sidebar navigation
    document.querySelectorAll('.sidebar a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            showPanel(this.getAttribute('href').substring(1));
        });
    });

    // Account type fields
    function toggleRoleFields() {
        let student = document.getElementById('role').value === 'student';

        document.querySelectorAll('.student-field').forEach(e => {
            e.classList.toggle('d-none', !student);
        });

        document.querySelectorAll('.professor-field').forEach(e => {
            e.classList.toggle('d-none', student);
        });

        document.querySelector('[name=student_id]').required = student;
        document.querySelector('[name=professor_id]').required = !student;
    }

    toggleRoleFields();

    // Open section from URL hash, if present
    const initialPanel = window.location.hash.substring(1);

    if (initialPanel && document.getElementById(initialPanel)?.classList.contains('content-panel')) {
        showPanel(initialPanel);
    }
</script>

</body>
</html>
