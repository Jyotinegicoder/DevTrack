<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

// Pehle us project ke saare tasks delete karo
mysqli_query($conn, "DELETE FROM tasks WHERE project_id='$id'");

// Ab project delete karo
$query = "DELETE FROM projects WHERE project_id='$id'";

if(mysqli_query($conn, $query))
{
    echo "<script>alert('Project Deleted Successfully');</script>";
    echo "<script>window.location='view_projects.php';</script>";
}
else
{
    echo "<script>alert('Error Deleting Project');</script>";
}
?>