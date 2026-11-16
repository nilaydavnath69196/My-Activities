
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Academic Archive | BGC Trust University</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#101c3d,#173c72,#2457a5);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .main-card {
            width: 100%;
            max-width: 1050px;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0,0,0,.3);
        }

        .hero {
            padding: 40px 25px;
            text-align: center;
            color: white;
            background: linear-gradient(120deg,#173c72,#2563eb);
        }

        .university-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            background: white;
            padding: 8px;
            border-radius: 20px;
            margin-bottom: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
        }

        .hero h1 {
            font-size: clamp(25px,4vw,36px);
            font-weight: 800;
        }

        .hero p {
            margin: 8px 0 0;
            opacity: .9;
        }

        .university-name {
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .5px;
            margin-bottom: 8px;
            color: #dbeafe;
        }

        .content { padding: 38px; }

        .section-title {
            text-align: center;
            font-weight: 700;
            color: #172b4d;
        }

        .section-sub {
            text-align: center;
            color: #718096;
            margin-bottom: 30px;
        }

        .role-card {
            display: block;
            text-decoration: none;
            color: #24324a;
            border: 1px solid #e5eaf2;
            border-radius: 20px;
            padding: 30px 20px;
            text-align: center;
            transition: .25s;
            height: 100%;
        }

        .role-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(0,0,0,.1);
            border-color: #b7c9ee;
        }

        .role-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            font-size: 32px;
            margin: 0 auto 18px;
        }

        .student { background: #eaf1ff; color: #2563eb; }
        .professor { background: #e8faf3; color: #059669; }
        .admin { background: #fff2e8; color: #ea580c; }

        .role-card h4 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .role-card p {
            font-size: 13px;
            color: #718096;
            margin: 0;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            padding: 0 15px 25px;
        }

        @media(max-width:576px) {
            .content { padding: 25px 18px; }
            .hero { padding: 35px 18px; }
            .university-logo {
                width: 85px;
                height: 85px;
            }
        }
    </style>
</head>

<body>

<div class="main-card">

    <!-- UNIVERSITY HEADER -->
    <div class="hero">

        <img
            src="{{ asset('images/bgctub-logo (2).png') }}"
            alt="BGC Trust University Bangladesh Logo"
            class="university-logo"
        >

        <div class="university-name">
            BGC TRUST UNIVERSITY BANGLADESH
        </div>

        <h1>University Academic Archive</h1>

        <p>University Archive & Management System</p>

    </div>

    <!-- LOGIN OPTIONS -->
    <div class="content">

        <h3 class="section-title">Welcome Back!</h3>

        <p class="section-sub">
            Select your account type to continue
        </p>

        <div class="row g-4">

            <!-- STUDENT -->
            <div class="col-md-4">
                <a href="{{ route('student.login') }}" class="role-card">

                    <div class="role-icon student">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <h4>Student</h4>

                    <p>
                        Access your academic dashboard and projects.
                    </p>

                </a>
            </div>

            <!-- PROFESSOR -->
            <div class="col-md-4">
                <a href="{{ route('professor.login') }}" class="role-card">

                    <div class="role-icon professor">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <h4>Professor</h4>

                    <p>
                        Manage courses, marks and student submissions.
                    </p>

                </a>
            </div>

            <!-- ADMIN -->
            <div class="col-md-4">
                <a href="{{ route('admin.login') }}" class="role-card">

                    <div class="role-icon admin">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>

                    <h4>Administrator</h4>

                    <p>
                        Manage users and the university archive.
                    </p>

                </a>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} University Academic Archive (Nilay's Team).
        All Rights Reserved.
    </div>

</div>

</body>
</html>
