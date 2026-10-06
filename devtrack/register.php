<?php
include("database/db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users(name,email,password,role)
            VALUES('$name','$email','$password','$role')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Registration Successful');</script>";
    }
    else
    {
        echo "<script>alert('Registration Failed');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DevTrack</title>
</head>
<body>

<h2>User Registration</h2>

<form action="" method="POST">

    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Role</label><br>
    <select name="role" required>
        <option value="">Select Role</option>
        <option value="Admin">Admin</option>
        <option value="Developer">Developer</option>
    </select><br><br>

    <input type="submit" name="register" value="Register">

</form>

</body>
</html>