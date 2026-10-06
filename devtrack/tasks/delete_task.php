<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM tasks WHERE task_id='$id'";

if(mysqli_query($conn,$query))
{
    echo "<script>alert('Task Deleted Successfully');</script>";
    echo "<script>window.location='view_tasks.php';</script>";
}
else
{
    echo "<script>alert('Error Deleting Task');</script>";
}
?>