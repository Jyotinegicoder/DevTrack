<?php
session_start();
include("database/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Developer Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Developer Login</h1>

<form action="" method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">

</form>

<?php

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $query);

  

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['email'] = $email;

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<br><br>Invalid Email or Password!";
    }
}

?>

</body>
</html>