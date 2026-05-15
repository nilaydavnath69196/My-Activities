<?php

include("../includes/professor_session.php");
include("../includes/db.php");

$search = "";

$query = "SELECT * FROM students";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $query = "SELECT * FROM students
    WHERE
    name LIKE '%$search%'
    OR
    email LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Search</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            min-height: 100vh;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* SEARCH BOX */
        .search-box {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 300px;
            padding: 12px;
            border: none;
            border-radius: 10px 0 0 10px;
            outline: none;
        }

        button {
            padding: 12px 20px;
            border: none;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            cursor: pointer;
            border-radius: 0 10px 10px 0;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.05);
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background: rgba(0,198,255,0.3);
        }

        tr {
            transition: 0.3s;
        }

        tr:hover {
            background: rgba(0,198,255,0.15);
            transform: scale(1.01);
        }

        /* CARD STYLE WRAPPER */
        .container {
            max-width: 1100px;
            margin: auto;
        }

        .card {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(15px);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .highlight {
            color: #00e6ff;
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Student Management</h1>

    <!-- SEARCH -->
    <form method="GET" class="search-box">

        <input type="text"
               name="search"
               placeholder="Search Student..."
               value="<?php echo $search; ?>">

        <button type="submit">Search</button>

    </form>

    <!-- TABLE -->
    <div class="card">

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td class="highlight"><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['department']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>