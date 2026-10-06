<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['email']))
{
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM projects WHERE project_id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $update = "UPDATE projects
               SET project_name='$project_name',
                   description='$description',
                   status='$status'
               WHERE project_id='$id'";

    if(mysqli_query($conn,$update))
    {
        echo "<script>alert('Project Updated Successfully');</script>";
        echo "<script>window.location='view_projects.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/st-yle.css">
</head>
<body>

<h1>Edit Project</h1>

<form method="POST">

<label>Project Name</label><br>
<input type="text" name="project_name"
value="<?php echo $row['project_name']; ?>" required><br><br>

<label>Description</label><br>
<textarea name="description" rows="5" cols="30" required><?php echo $row['description']; ?></textarea><br><br>

<label>Status</label><br>
<select name="status">
    <option value="Pending">Pending</option>
    <option value="In Progress">In Progress</option>
    <option value="Completed">Completed</option>
</select><br><br>

<input type="submit" name="update" value="Update Project">

</form>

</body>
</html>