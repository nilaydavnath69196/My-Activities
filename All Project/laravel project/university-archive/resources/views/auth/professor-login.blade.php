
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh; margin: 0; padding: 20px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#073b3a,#047857,#0d9488);
        }
        .login-card {
            width: 100%; max-width: 460px; background: white;
            border-radius: 26px; padding: 42px 38px;
            box-shadow: 0 25px 65px rgba(0,0,0,.3);
        }
        .icon-box {
            width: 78px; height: 78px; border-radius: 22px;
            background: #e8faf3; color: #059669;
            display: grid; place-items: center;
            font-size: 38px; margin: 0 auto 18px;
        }
        h2 { text-align: center; font-weight: 800; color: #173b39; }
        .subtitle { text-align: center; color: #8491a5; font-size: 13px; margin-bottom: 30px; }
        label { font-size: 13px; font-weight: 600; color: #344563; margin-bottom: 8px; }
        .input-group { margin-bottom: 20px; }
        .input-group-text {
            background: #f7f9fc; border: 1px solid #e2e8f0;
            border-right: 0; color: #059669; border-radius: 12px 0 0 12px;
        }
        .form-control {
            height: 52px; border: 1px solid #e2e8f0;
            border-left: 0; border-radius: 0 12px 12px 0;
            font-size: 14px;
        }
        .form-control:focus { box-shadow: none; border-color: #059669; }
        .input-group:focus-within .input-group-text { border-color: #059669; }
        .submit-btn {
            width: 100%; height: 53px; border: 0; border-radius: 12px;
            background: linear-gradient(120deg,#059669,#0d9488);
            color: white; font-weight: 700; margin-top: 8px; transition: .2s;
        }
        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px #05966955; }
        .back-link {
            display: block; text-align: center; margin-top: 25px;
            color: #059669; text-decoration: none; font-size: 13px; font-weight: 600;
        }
        .back-link:hover { text-decoration: underline; }
        .alert { font-size: 13px; }
        @media(max-width:480px) { .login-card { padding: 32px 22px; } }
    </style>
</head>
<body>

<div class="login-card">
    <div class="icon-box"><i class="bi bi-person-workspace"></i></div>

    <h2>Professor Login</h2>
    <p class="subtitle">Sign in to manage your academic activities</p>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <label>Professor ID</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
            <input type="text" name="login_id" class="form-control"
                   placeholder="Enter your Professor ID"
                   value="{{ old('login_id') }}" required>
        </div>

        <label>Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" name="password" class="form-control"
                   placeholder="Enter your password" required>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit" class="submit-btn">
            <i class="bi bi-box-arrow-in-right me-2"></i>Login to Professor Portal
        </button>
    </form>

    <a href="{{ route('login') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i> Back to Main Login
    </a>
</div>

</body>
</html>
