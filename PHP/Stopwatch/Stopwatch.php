<?php
session_start();
if (!isset($_SESSION['start_time'])) $_SESSION['start_time'] = null;
if (!isset($_SESSION['running'])) $_SESSION['running'] = false;

if (isset($_POST['start'])) {
    if (!$_SESSION['running']) {
        $_SESSION['start_time'] = time() - ($_SESSION['elapsed_time'] ?? 0);
        $_SESSION['running'] = true;
    }
}

if (isset($_POST['stop'])) {
    if ($_SESSION['running']) {
        $_SESSION['elapsed_time'] = time() - $_SESSION['start_time'];
        $_SESSION['running'] = false;
    }
}

if (isset($_POST['reset'])) {
    $_SESSION['running'] = false;
    $_SESSION['start_time'] = null;
    $_SESSION['elapsed_time'] = 0;
}

$elapsed = 0;
if ($_SESSION['running']) {
    $elapsed = time() - $_SESSION['start_time'];
} else {
    $elapsed = $_SESSION['elapsed_time'] ?? 0;
}

$hrs = floor($elapsed / 3600);
$mins = floor(($elapsed % 3600) / 60);
$secs = $elapsed % 60;

if (isset($_POST['lap'])) {
    $currentTime = sprintf("%02d:%02d:%02d", $hrs, $mins, $secs);
    file_put_contents("laps.txt", $currentTime . "\n", FILE_APPEND);
}

if (isset($_POST['clear_laps'])) {
    file_put_contents("laps.txt", "");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Stopwatch</title>

    <style>
        body {
            background: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }
        .container {
            width: 400px;
            margin: auto;
            background: #222;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px #000;
        }
        #display {
            font-size: 48px;
            margin: 20px 0;
            font-weight: bold;
        }
        button {
            background: #008cff;
            border: none;
            padding: 10px 20px;
            color: white;
            margin: 5px;
            cursor: pointer;
            border-radius: 8px;
        }
        button:hover {
            background: #006fd6;
        }
        .laps-box {
            background: #333;
            padding: 10px;
            margin-top: 20px;
            border-radius: 10px;
            max-height: 200px;
            overflow-y: auto;
        }
    </style>

    <?php if ($_SESSION['running']): ?>
    <meta http-equiv="refresh" content="1">
    <?php endif; ?>
</head>
<body>

<div class="container">
    <h1>STOPWATCH (PHP)</h1>

    <div id="display">
        <?= sprintf("%02d:%02d:%02d", $hrs, $mins, $secs) ?>
    </div>

    <form method="POST">
        <button name="start">Start</button>
        <button name="stop">Stop</button>
        <button name="reset">Reset</button>
        <button name="lap">Lap</button>
    </form>

    <h2>Saved Laps</h2>
    <div class="laps-box">
        <?php
        if (file_exists("laps.txt")) {
            echo nl2br(file_get_contents("laps.txt"));
        }
        ?>
    </div>

    <form method="POST">
        <button name="clear_laps" style="background:red;">Clear Laps</button>
    </form>
</div>

</body>
</html>
