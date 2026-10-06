<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['save']))
{
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    $query = "INSERT INTO projects
    (project_name, description, start_date, end_date, status)
    VALUES
    ('$project_name','$description','$start_date','$end_date','$status')";

    if(mysqli_query($conn,$query))
    {
        echo "<script>alert('Project Added Successfully');</script>";
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Project</title>
</head>
<body>

<h1>Add New Project</h1>

<p>Welcome : <?php echo $_SESSION['email']; ?></p>

<form method="POST">

<label>Project Name</label><br>
<input type="text" name="project_name" required><br><br>

<label>Description</label><br>
<textarea name="description" rows="5" cols="30" required></textarea><br><br>

<label>Start Date</label><br>
<input type="date" name="start_date" required><br><br>

<label>End Date</label><br>
<input type="date" name="end_date" required><br><br>

<label>Status</label><br>

<select name="status">
    <option value="Pending">Pending</option>
    <option value="In Progress">In Progress</option>
    <option value="Completed">Completed</option>
</select>

<br><br>

<input type="submit" name="save" value="Save Project">

</form>

</body>
</html>