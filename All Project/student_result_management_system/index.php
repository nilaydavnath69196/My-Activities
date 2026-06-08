<?php
include("db.php");

$total_students_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM students");

$total_students = mysqli_fetch_assoc($total_students_query);


$highest_query = mysqli_query($conn,
"SELECT students.id,
students.name,
marks.mark

FROM marks

JOIN students
ON marks.student_id = students.id

WHERE marks.mark = (
SELECT MAX(mark)
FROM marks
)");

$highest = mysqli_fetch_assoc($highest_query);

$lowest_query = mysqli_query($conn,
"SELECT students.id,
students.name,
marks.mark

FROM marks

JOIN students
ON marks.student_id = students.id

WHERE marks.mark = (
SELECT MIN(mark)
FROM marks
)");

$lowest = mysqli_fetch_assoc($lowest_query);



$average_query = mysqli_query($conn,
"SELECT students.id,
students.name,
AVG(marks.mark) AS average_mark

FROM marks

JOIN students
ON marks.student_id = students.id

GROUP BY students.id

ORDER BY average_mark DESC

LIMIT 1");

$average = mysqli_fetch_assoc($average_query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Result Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Main Container - Compact */
        .main-container {
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 1.5rem;
            text-align: center;
            color: white;
        }

        .dashboard-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .dashboard-header p {
            margin-top: 0.5rem;
            opacity: 0.9;
            font-size: 0.85rem;
        }

        .stats-grid {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            margin: 0 auto 0.75rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-card h5 {
            color: #6c757d;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-card h2 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
        }

        .stat-detail {
            margin-top: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid #f0f0f0;
        }

        .stat-detail p {
            margin: 0.2rem 0;
            font-size: 0.75rem;
            color: #495057;
        }

        .stat-detail strong {
            color: #2a5298;
            font-size: 0.7rem;
        }

        .badge-average {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 0.15rem 0.6rem;
            border-radius: 12px;
            font-size: 0.7rem;
            display: inline-block;
        }

        .custom-divider {
            margin: 0 1.5rem;
            border: none;
            height: 1px;
            background: linear-gradient(to right, transparent, #dee2e6, transparent);
        }

        .button-section {
            padding: 1.25rem 1.5rem;
            text-align: center;
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.3px;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .btn-custom-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        .btn-custom-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(56, 239, 125, 0.3);
            color: white;
        }

        .btn-custom-warning {
            background: linear-gradient(135deg, #f2994a 0%, #f2c94c 100%);
            color: white;
        }

        .btn-custom-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(242, 153, 74, 0.3);
            color: white;
        }

        .btn-custom-dark {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
        }

        .btn-custom-dark:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(30, 60, 114, 0.3);
            color: white;
        }

        .icon-total { background: linear-gradient(135deg, #667eea20, #764ba220); color: #667eea; }
        .icon-highest { background: linear-gradient(135deg, #ff6b6b20, #ee5a2420); color: #ff6b6b; }
        .icon-lowest { background: linear-gradient(135deg, #4ecdc420, #44a08d20); color: #4ecdc4; }
        .icon-average { background: linear-gradient(135deg, #f093fb20, #f5576c20); color: #f093fb; }

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .dashboard-header h1 {
                font-size: 1.4rem;
            }
            
            .dashboard-header p {
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 500px) {
            .stats-grid {
                grid-template-columns: 1fr;
                padding: 1rem;
            }
            
            .button-section {
                flex-direction: column;
                padding: 1rem;
            }
            
            .btn-custom {
                justify-content: center;
                width: 100%;
            }
            
            .dashboard-header h1 {
                font-size: 1.2rem;
            }
            
            .stat-card h2 {
                font-size: 1.5rem;
            }
            
            body {
                padding: 12px;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card {
            animation: fadeInUp 0.4s ease backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.15s; }
        .stat-card:nth-child(3) { animation-delay: 0.2s; }
        .stat-card:nth-child(4) { animation-delay: 0.25s; }
        
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }
#copyright{
    text-align: center;
}

    </style>

</head>

<body>

<div class="main-container">
    <div class="hero-card">
        
        <div class="dashboard-header">
            <h1>📊 Student Result Management System</h1>
            <p>Manage and track student academic performance</p>
        </div>
        

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon icon-total">
                    👥
                </div>
                <h5>Total Students</h5>
                <h2><?php echo $total_students['total']; ?></h2>
                <div class="stat-detail">
                    <p>Enrolled in system</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon icon-highest">
                    🏆
                </div>
                <h5>Overall Highest Mark</h5>
                <h2><?php echo $highest['mark']; ?></h2>
                <div class="stat-detail">
                    <p><strong>ID:</strong> <?php echo $highest['id']; ?> | <strong><?php echo $highest['name']; ?></strong></p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon icon-lowest">
                    📉
                </div>
                <h5>Overall Lowest Mark</h5>
                <h2><?php echo $lowest['mark']; ?></h2>
                <div class="stat-detail">
                    <p><strong>ID:</strong> <?php echo $lowest['id']; ?> | <strong><?php echo $lowest['name']; ?></strong></p>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon icon-average">
                    ⭐
                </div>
                <h5>Overall Best Average</h5>
                <h2><?php echo round($average['average_mark'],2); ?></h2>
                <div class="stat-detail">
                    <p><strong><?php echo $average['name']; ?></strong> <span class="badge-average"><?php echo round($average['average_mark'],2); ?>%</span></p>
                </div>
            </div>

        </div>
        
        <hr class="custom-divider">

        <div class="button-section">
            <a href="add_student.php" class="btn btn-custom btn-custom-primary">
                🧑‍🎓 Add Student
            </a>

            <a href="add_subject.php" class="btn btn-custom btn-custom-success">
                📚 Add Subject
            </a>

            <a href="add_marks.php" class="btn btn-custom btn-custom-warning">
                ✏️ Add Marks
            </a>

            <a href="view_result.php" class="btn btn-custom btn-custom-dark">
                👁️ View Result
            </a>
            <a href="subject_analysis.php"
            class="btn btn-custom btn-custom-success">

            📊 Subject Analysis

</a>
        </div>
        
    </div>
    <br>
<p id="copyright">@Nilay's Project</p>
</div>



</body>
</html>
