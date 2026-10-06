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
    $project_id = $_POST['project_id'];
    $developer_id = $_POST['developer_id'];
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $query = "INSERT INTO tasks
    (project_id, developer_id, task_name, description, priority, status, due_date)

    VALUES
    ('$project_id','$developer_id','$task_name','$description','$priority','$status','$due_date')";

    if(mysqli_query($conn,$query))
    {
        echo "<script>alert('Task Added Successfully');</script>";
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
    <title>Add Task</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Add New Task</h1>

<p>Welcome :
<?php echo $_SESSION['email']; ?>
</p>

<form method="POST">

<label>Select Project</label><br>

<select name="project_id" required>

<option value="">Select Project</option>

<?php

$project = mysqli_query($conn,"SELECT * FROM projects");

while($row=mysqli_fetch_assoc($project))
{
?>

<option value="<?php echo $row['project_id']; ?>">
<?php echo $row['project_name']; ?>
</option>

<?php
}
?>

</select>

<br><br>

<label>Select Developer</label><br>

<select name="developer_id" required>

<option value="">Select Developer</option>

<?php

$user = mysqli_query($conn,"SELECT * FROM users WHERE role='Developer'");

while($dev=mysqli_fetch_assoc($user))
{
?>

<option value="<?php echo $dev['user_id']; ?>">
<?php echo $dev['name']; ?>
</option>

<?php
}
?>

</select>

<br><br>

<label>Task Name</label><br>
<input type="text" name="task_name" required>

<br><br>

<label>Description</label><br>

<textarea name="description"></textarea>

<br><br>

<label>Priority</label><br>

<select name="priority">

<option>Low</option>
<option>Medium</option>
<option>High</option>

</select>

<br><br>

<label>Status</label><br>

<select name="status">

<option>Pending</option>
<option>In Progress</option>
<option>Completed</option>

</select>

<br><br>

<label>Due Date</label><br>

<input type="date" name="due_date">

<br><br>

<input type="submit" name="save" value="Save Task">

</form>

</body>
</html>