<?php

include("../includes/professor_session.php");
include("../includes/db.php");


$professor_id = intval(
    $_SESSION['professor_id']
);


// =========================
// APPROVE PROJECT
// =========================

if(isset($_GET['approve'])){

    $project_id = intval(
        $_GET['approve']
    );

    $query = "

    UPDATE projects

    SET status='Approved'

    WHERE project_id='$project_id'

    AND supervisor_id='$professor_id'

    ";

    mysqli_query($conn, $query);

}


// =========================
// REJECT PROJECT
// =========================

if(isset($_GET['reject'])){

    $project_id = intval(
        $_GET['reject']
    );

    $query = "

    UPDATE projects

    SET status='Rejected'

    WHERE project_id='$project_id'

    AND supervisor_id='$professor_id'

    ";

    mysqli_query($conn, $query);

}


// =========================
// GET PROJECTS
// =========================

$query = "

SELECT *

FROM projects

WHERE supervisor_id='$professor_id'

ORDER BY project_id DESC

";


$result = mysqli_query(
    $conn,
    $query
);

?>

<!DOCTYPE html>

<html>

<head>

<title>
Approve Projects
</title>

<link rel="stylesheet"
      href="../css/style.css">

</head>


<body>


<div class="sidebar">

<h2 align="center">
Professor Panel
</h2>


<a href="dashboard.php">
Dashboard
</a>


<a href="students.php">
Student List
</a>


<a href="update_marks.php">
Update Marks
</a>


<a href="attendance.php">
Attendance
</a>


<a href="approve_projects.php">
Approve Projects
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
Project Approval System
</h2>


<table border="1"
       width="100%"
       cellpadding="10">


<tr>

<th>
Title
</th>

<th>
Abstract
</th>

<th>
File
</th>

<th>
Status
</th>

<th>
Action
</th>

</tr>


<?php

if(mysqli_num_rows($result) > 0){

    while(
        $row =
        mysqli_fetch_assoc($result)
    ){

?>


<tr>


<td>

<?php

echo htmlspecialchars(
    $row['title']
);

?>

</td>


<td>

<?php

echo htmlspecialchars(
    $row['abstract']
);

?>

</td>


<td>

<a href="../uploads/<?php

echo urlencode(
    $row['file_path']
);

?>"

download>

Download

</a>

</td>


<td>

<?php

echo htmlspecialchars(
    $row['status']
);

?>

</td>


<td>


<?php

if($row['status'] == 'Pending'){

?>


<a href="approve_projects.php?approve=<?php

echo $row['project_id'];

?>">

Approve

</a>


&nbsp; | &nbsp;


<a href="approve_projects.php?reject=<?php

echo $row['project_id'];

?>">

Reject

</a>


<?php

}else{

    echo "No Action";

}

?>


</td>


</tr>


<?php

    }

}else{

?>


<tr>

<td colspan="5"
    align="center">

No Projects Found

</td>

</tr>


<?php

}

?>


</table>


</div>

</div>

</body>

</html>