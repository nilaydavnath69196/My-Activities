<?php

include("../includes/student_session.php");
include("../includes/db.php");

$message = "";

$student_id = $_SESSION['student_id'];

$professor_id = 1;

// SEND MESSAGE

if(isset($_POST['send_message'])){

    $msg = $_POST['message'];

    $query = "INSERT INTO messages
    (
        sender_id,
        receiver_id,
        message
    )

    VALUES

    (
        '$student_id',
        '$professor_id',
        '$msg'
    )";

    if(mysqli_query($conn, $query)){

        $message = "Message Sent";

    }else{

        $message = "Failed";

    }

}

// GET ALL MESSAGES

$query = "SELECT * FROM messages
          WHERE sender_id='$student_id'
          OR receiver_id='$student_id'

          ORDER BY timestamp DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Student Messages
    </title>

    <link rel="stylesheet"
          href="../css/style.css">

</head>

<body>

<div class="sidebar">

    <h2 align="center">
        Student Panel
    </h2>

    <a href="dashboard.php">
        Dashboard
    </a>

    <a href="attendance.php">
        Attendance
    </a>

    <a href="marks.php">
        Marks
    </a>

    <a href="upload_project.php">
        Upload Project
    </a>

    <a href="messages.php">
        Messages
    </a>

    <a href="../logout.php">
        Logout
    </a>

</div>

<div class="content">

    <div class="card">

        <h2>
            Send Message
        </h2>

        <form method="POST">

            <textarea
                name="message"
                placeholder="Write Message"
                required>
            </textarea>

            <button name="send_message">

                Send

            </button>

        </form>

        <br>

        <?php
        echo $message;
        ?>

    </div>

    <div class="card">

        <h2>
            Message History
        </h2>

        <?php

        while($row = mysqli_fetch_assoc($result)){

        ?>

        <p>

            <b>
                Message:
            </b>

            <?php
            echo $row['message'];
            ?>

            <br>

            <small>

                <?php
                echo $row['timestamp'];
                ?>

            </small>

        </p>

        <hr>

        <?php
        }
        ?>

    </div>

</div>

</body>
</html>