<?php

include("includes/db.php");

$search = "";

// =========================
// SEARCH SYSTEM
// =========================

$query = "

SELECT *

FROM projects

WHERE status='Approved'

";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $query = "

    SELECT *

    FROM projects

    WHERE status='Approved'

    AND

    title LIKE '%$search%'

    ";

}

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Academic Archive
    </title>

    <style>

    body{

        font-family:Arial;
        margin:0;
        padding:20px;
        background:#f4f4f4;

    }

    .container{

        width:90%;
        margin:auto;

    }

    .card{

        background:white;
        padding:20px;
        border-radius:10px;
        margin-bottom:20px;
        box-shadow:0px 0px 10px lightgray;

    }

    input{

        width:80%;
        padding:10px;

    }

    button{

        padding:10px 20px;
        background:blue;
        color:white;
        border:none;

    }

    table{

        width:100%;
        border-collapse:collapse;

    }

    table th{

        background:#222;
        color:white;
        padding:12px;

    }

    table td{

        padding:12px;
        border:1px solid #ddd;

    }

    a{

        text-decoration:none;
        color:blue;

    }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            University Academic Archive
        </h1>

        <form method="GET">

            <input type="text"

                   name="search"

                   placeholder="Search Project"

                   value="<?php
                   echo $search;
                   ?>">

            <button type="submit">

                Search

            </button>

        </form>

    </div>

    <div class="card">

        <table>

        <tr>

            <th>
                Project Title
            </th>

            <th>
                Abstract
            </th>

            <th>
                Status
            </th>

            <th>
                Download
            </th>

        </tr>

        <?php

        while($row = mysqli_fetch_assoc($result)){

        ?>

        <tr>

            <td>

                <?php
                echo $row['title'];
                ?>

            </td>

            <td>

                <?php
                echo $row['abstract'];
                ?>

            </td>

            <td>

                <?php
                echo $row['status'];
                ?>

            </td>

            <td>

                <a href="uploads/<?php
                echo $row['file_path'];
                ?>"

                download>

                Download

                </a>

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