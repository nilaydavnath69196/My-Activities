<!DOCTYPE html>
<html>

<head>

    <title>
        University Academic Archive System
    </title>

    <link rel="stylesheet" href="css/style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            overflow: hidden;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 90%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            color: #fff;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        p {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        button {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            color: white;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #0072ff, #00c6ff);
        }

        a {
            text-decoration: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Floating background effect */
        body::before, body::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
        }

        body::before {
            top: -50px;
            left: -50px;
        }

        body::after {
            bottom: -80px;
            right: -80px;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(30px);
            }
        }
    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            University Academic Archive & Management System
        </h1>

        <p>
            Centralized platform for academic records,
            thesis archive and communication.
        </p>

        <a href="login.php">
            <button>
                Login Now
            </button>
        </a>
        <br>
        <a href="./admin/admin_login.php">
            <button>
                Admin Access
            </button>
        </a>

    </div>

</div>

</body>
</html>