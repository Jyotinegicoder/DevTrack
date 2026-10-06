<?php
session_start();
include("database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$total_projects = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM projects"));
$total_tasks = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tasks"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>DevTrack Dashboard</title>

<link rel="stylesheet" href="css/style.css?v=5">

</head>

<body>

<nav>

<div class="logo">🚀 DEVTRACK</div>

<div class="menu">
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="projects/add_project.php">➕ Add Project</a>
    <a href="projects/view_projects.php">📁 View Projects</a>
    <a href="tasks/add_task.php">✅ Add Task</a>
    <a href="tasks/view_tasks.php">📋 View Tasks</a>
    <a href="logout.php">🚪 Logout</a>
</div>

</nav>

<h1>🚀 Welcome to DevTrack Dashboard</h1>

<p class="welcome-user">
👋 Logged in as:
<b><?php echo $_SESSION['email']; ?></b>
</p>

<div class="dashboard">

<div class="card project-card">
<h2>📁 Total Projects</h2>
<p><?php echo $total_projects; ?></p>
</div>

<div class="card task-card">
<h2>✅ Total Tasks</h2>
<p><?php echo $total_tasks; ?></p>
</div>

<div class="card user-card">
    <h2>👤 User</h2>
    <h3><?php echo $_SESSION['email']; ?></h3>
</div>

</div>

<div class="recent-section">

    <div class="recent-box">

        <h2>📁 Recent Projects</h2>

        <?php

        $projects = mysqli_query($conn,"SELECT * FROM projects ORDER BY project_id DESC LIMIT 5");

        while($row = mysqli_fetch_assoc($projects))
        {
            echo "<a href='projects/view_projects.php' class='recent-link'>✔ ".$row['project_name']."</a>";
        }

        ?>

    </div>

    <div class="recent-box">

        <h2>📋 Recent Tasks</h2>

        <?php

        $tasks = mysqli_query($conn,"SELECT * FROM tasks ORDER BY task_id DESC LIMIT 5");

        while($row = mysqli_fetch_assoc($tasks))
        {
            echo "<a href='tasks/view_tasks.php' class='recent-link'>✔ ".$row['task_name']."</a>";
        }

        ?>

    </div>

</div>
<footer>

<p>© <?php echo date("Y"); ?> DevTrack. All Rights Reserved.</p>

<p>Developed by Jyoti Negi | MCA Project | Uttarakhand Open University</p>

</footer>


</body>
</html>