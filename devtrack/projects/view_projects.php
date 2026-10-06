<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

$query = "SELECT * FROM projects";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Projects</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table{
            border-collapse: collapse;
            width:80%;
        }
        th,td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }
        th{
            background-color:#f2f2f2;
        }
    </style>
</head>
<body>

<h1>All Projects</h1>

<table>

<tr>
    <th>ID</th>
    <th>Project Name</th>
    <th>Description</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['project_id']; ?></td>
    <td><?php echo $row['project_name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>
    <a href="edit_project.php?id=<?php echo $row['project_id']; ?>">Edit</a> |
    <a href="delete_project.php?id=<?php echo $row['project_id']; ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
</td>
</tr>

<?php
}
?>

</table>

</body>
</html>