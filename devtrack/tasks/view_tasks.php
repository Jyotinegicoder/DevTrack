
<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

$query = "SELECT
tasks.task_id,
projects.project_name,
users.name,
tasks.task_name,
tasks.priority,
tasks.status,
tasks.due_date

FROM tasks

INNER JOIN projects
ON tasks.project_id = projects.project_id

INNER JOIN users
ON tasks.developer_id = users.user_id";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Tasks</title>

<link rel="stylesheet" href="../css/style.css">

<style>

table{
border-collapse:collapse;
width:100%;
}

th,td{
border:1px solid black;
padding:10px;
text-align:center;
}

th{
background:#007bff;
color:white;
}

a{
text-decoration:none;
font-weight:bold;
}

</style>

</head>

<body>

<h1>All Tasks</h1>

<table>

<tr>

<th>ID</th>
<th>Project</th>
<th>Developer</th>
<th>Task</th>
<th>Priority</th>
<th>Status</th>
<th>Due Date</th>
<th>Edit</th>
<th>Delete</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['task_id']; ?></td>
<td><?php echo $row['project_name']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['task_name']; ?></td>
<td><?php echo $row['priority']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['due_date']; ?></td>

<td>
<a href="edit_task.php?id=<?php echo $row['task_id']; ?>">
Edit
</a>
</td>

<td>
<a href="delete_task.php?id=<?php echo $row['task_id']; ?>"
onclick="return confirm('Are you sure you want to delete this task?')">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>

</body>
</html>