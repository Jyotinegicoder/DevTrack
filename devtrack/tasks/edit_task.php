<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM tasks WHERE task_id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $task_name = $_POST['task_name'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $update = "UPDATE tasks SET
    task_name='$task_name',
    priority='$priority',
    status='$status',
    due_date='$due_date'
    WHERE task_id='$id'";

    if(mysqli_query($conn,$update))
    {
        echo "<script>alert('Task Updated Successfully');</script>";
        echo "<script>window.location='view_tasks.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Edit Task</h1>

<form method="POST">

<label>Task Name</label><br>
<input type="text" name="task_name"
value="<?php echo $row['task_name']; ?>" required><br><br>

<label>Priority</label><br>
<select name="priority">
<option <?php if($row['priority']=="Low") echo "selected"; ?>>Low</option>
<option <?php if($row['priority']=="Medium") echo "selected"; ?>>Medium</option>
<option <?php if($row['priority']=="High") echo "selected"; ?>>High</option>
</select><br><br>

<label>Status</label><br>
<select name="status">
<option <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
<option <?php if($row['status']=="In Progress") echo "selected"; ?>>In Progress</option>
<option <?php if($row['status']=="Completed") echo "selected"; ?>>Completed</option>
</select><br><br>

<label>Due Date</label><br>
<input type="date" name="due_date"
value="<?php echo $row['due_date']; ?>"><br><br>

<input type="submit" name="update" value="Update Task">

</form>

</body>
</html>