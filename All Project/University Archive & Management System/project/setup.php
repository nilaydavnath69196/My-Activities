<?php


include("includes/db.php");


/*
$host = "localhost";
$user = "root";
$password = "";
$conn = mysqli_connect($host, $user, $password);
if(!$conn){
    die("Connection Failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS university_archive";

if(mysqli_query($conn, $sql)){
    echo "Database Created Successfully <br>";
}else{
    echo "Database Error <br>";
}

// Select Database
mysqli_select_db($conn, "university_archive");



$students = "CREATE TABLE IF NOT EXISTS students(

    student_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    department VARCHAR(50)

)";

if(mysqli_query($conn, $students)){
    echo "Students Table Created <br>";
}


$professors = "CREATE TABLE IF NOT EXISTS professors(

    professor_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    department VARCHAR(50)

)";

if(mysqli_query($conn, $professors)){
    echo "Professors Table Created <br>";
}


$projects = "CREATE TABLE IF NOT EXISTS projects(

    project_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    abstract TEXT,
    file_path VARCHAR(255),
    student_id INT,
    supervisor_id INT,
    status VARCHAR(50)

)";

if(mysqli_query($conn, $projects)){
    echo "Projects Table Created <br>";
}

$attendance = "CREATE TABLE IF NOT EXISTS attendance(

    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id VARCHAR(50),
    total_classes INT,
    attended INT

)";

if(mysqli_query($conn, $attendance)){
    echo "Attendance Table Created <br>";
}


$marks = "CREATE TABLE IF NOT EXISTS marks(

    mark_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id VARCHAR(50),
    ct_marks FLOAT,
    assignment_marks FLOAT,
    exam_marks FLOAT,
    total FLOAT

)";

if(mysqli_query($conn, $marks)){
    echo "Marks Table Created <br>";
}


$messages = "CREATE TABLE IF NOT EXISTS messages(

    message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT,
    receiver_id INT,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)";

if(mysqli_query($conn, $messages)){
    echo "Messages Table Created <br>";
}

$check_student = mysqli_query($conn,
"SELECT * FROM students WHERE email='nilay@gmail.com'");

if(mysqli_num_rows($check_student) == 0){

    $insert_student = "INSERT INTO students
    (name,email,password,department)

    VALUES

    ('Nilay',
    'nilay@gmail.com',
    '1234',
    'CSE')";

    mysqli_query($conn, $insert_student);

    echo "Demo Student Added <br>";
}


$check_professor = mysqli_query($conn,
"SELECT * FROM professors WHERE email='rahman@gmail.com'");

if(mysqli_num_rows($check_professor) == 0){

    $insert_professor = "INSERT INTO professors
    (name,email,password,department)

    VALUES

    ('Professor Rahman',
    'rahman@gmail.com',
    '1234',
    'CSE')";

    mysqli_query($conn, $insert_professor);

    echo "Demo Professor Added <br>";
}

echo "Setup Completed Successfully";


// DEMO ATTENDANCE


$check_attendance = mysqli_query(
    $conn,
    "SELECT * FROM attendance"
);

if(mysqli_num_rows($check_attendance) == 0){

    $insert_attendance = "INSERT INTO attendance
    (
        student_id,
        course_id,
        total_classes,
        attended
    )

    VALUES

    (
        1,
        'CSE101',
        40,
        35
    )";

    mysqli_query($conn, $insert_attendance);
    
    echo "Demo Attendance Added <br>";

}


// DEMO MARKS
// =========================

$check_marks = mysqli_query(
    $conn,
    "SELECT * FROM marks"
);

if(mysqli_num_rows($check_marks) == 0){

    $insert_marks = "INSERT INTO marks
    (
        student_id,
        course_id,
        ct_marks,
        assignment_marks,
        exam_marks,
        total
    )

    VALUES

    (
        1,
        'CSE101',
        18,
        17,
        55,
        90
    )";

    mysqli_query($conn, $insert_marks);

    echo "Demo Marks Added <br>";

}



// =========================
// ADD EXTRA STUDENT FIELDS
// =========================

$query = "SHOW COLUMNS FROM students
          LIKE 'phone'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){

    mysqli_query(

        $conn,

        "ALTER TABLE students
        ADD phone VARCHAR(20)"

    );

}




*/


CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100)
);



?>







