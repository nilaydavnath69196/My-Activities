
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh; margin: 0; padding: 20px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#431407,#c2410c,#f97316);
        }
        .login-card {
            width: 100%; max-width: 460px; background: white;
            border-radius: 26px; padding: 42px 38px;
            box-shadow: 0 25px 65px rgba(0,0,0,.3);
        }
        .icon-box {
            width: 78px; height: 78px; border-radius: 22px;
            background: #fff2e8; color: #ea580c;
            display: grid; place-items: center;
            font-size: 38px; margin: 0 auto 18px;
        }
        h2 { text-align: center; font-weight: 800; color: #512b1b; }
        .subtitle { text-align: center; color: #8491a5; font-size: 13px; margin-bottom: 30px; }
        label { font-size: 13px; font-weight: 600; color: #344563; margin-bottom: 8px; }
        .input-group { margin-bottom: 20px; }
        .input-group-text {
            background: #f7f9fc; border: 1px solid #e2e8f0;
            border-right: 0; color: #ea580c; border-radius: 12px 0 0 12px;
        }
        .form-control {
            height: 52px; border: 1px solid #e2e8f0;
            border-left: 0; border-radius: 0 12px 12px 0;
            font-size: 14px;
        }
        .form-control:focus { box-shadow: none; border-color: #ea580c; }
        .input-group:focus-within .input-group-text { border-color: #ea580c; }
        .submit-btn {
            width: 100%; height: 53px; border: 0; border-radius: 12px;
            background: linear-gradient(120deg,#ea580c,#c2410c);
            color: white; font-weight: 700; margin-top: 8px; transition: .2s;
        }
        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px #ea580c55; }
        .back-link {
            display: block; text-align: center; margin-top: 25px;
            color: #ea580c; text-decoration: none; font-size: 13px; font-weight: 600;
        }
        .back-link:hover { text-decoration: underline; }
        .alert { font-size: 13px; }
        @media(max-width:480px) { .login-card { padding: 32px 22px; } }
    </style>
</head>
<body>

<div class="login-card">
    <div class="icon-box"><i class="bi bi-shield-lock-fill"></i></div>

    <h2>Admin Login</h2>
    <p class="subtitle">Secure administrator access</p>

    <form method="POST" action="<?php echo e(route('login.submit')); ?>">
        <?php echo csrf_field(); ?>

        <label>Admin ID</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
            <input type="text" name="login_id" class="form-control"
                   placeholder="Enter your Admin ID"
                   value="<?php echo e(old('login_id')); ?>" required>
        </div>

        <label>Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" name="password" class="form-control"
                   placeholder="Enter your password" required>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <button type="submit" class="submit-btn">
            <i class="bi bi-shield-check me-2"></i>Login as Administrator
        </button>
    </form>

    <a href="<?php echo e(route('login')); ?>" class="back-link">
        <i class="bi bi-arrow-left me-1"></i> Back to Main Login
    </a>
</div>

</body>
</html>
<?php /**PATH C:\university-archive\resources\views/auth/admin-login.blade.php ENDPATH**/ ?>