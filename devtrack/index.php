<?php
include("database/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DevTrack - Enterprise Project Management & Bug Tracking System</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:linear-gradient(135deg,#0f172a,#2563eb);
color:white;
}

header{
position:sticky;
top:0;
z-index:1000;
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 80px;
background:rgba(0,0,0,.2);
}

.logo{
font-size:32px;
font-weight:bold;
color:#60a5fa;
}

nav a{
color:white;
text-decoration:none;
margin-left:25px;
font-size:18px;
transition:0.3s;
}

nav a:hover{
color:#60a5fa;
}

.hero{
height:60vh;
display:flex;
justify-content:center;
align-items:center;
text-align:center;
flex-direction:column;
padding:20px;
}

.hero h1{
font-size:65px;
font-weight:bold;
}

.hero h2{
color:#dbeafe;
}

.hero p{
font-size:18px;
margin-bottom:35px;
}

.btn{
background:#2563eb;
color:white;
border-radius:10px;
text-decoration:none;

font-weight:bold;
transition:0.3s;
box-shadow:0 8px 20px rgba(0,0,0,.3);
padding:18px 45px;
font-size:20px;
}

.btn:hover{
background:#1d4ed8;
transform:translateY(-3px);
}



.features{
display:flex;
justify-content:center;
gap:30px;
padding:60px;
background:#fff;
color:#333;
flex-wrap:wrap;
}

.card{
width:230px;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,.2);
text-align:center;
transition:0.3s;
text-decoration:none;
color:#333;
display:block;
}

.card:hover{
transform:translateY(-8px);
box-shadow:0 15px 30px rgba(0,0,0,.25);
}


.card h3{
margin-bottom:15px;
color:#2563eb;
}

footer{
background:#0f172a;
text-align:center;
padding:20px;
}

</style>

</head>

<body>

<header>

<div class="logo">📊 DEVTRACK</div>

<nav>
<a href="index.php">Home</a>
<a href="login.php">Login</a>
</nav>

</header>

<section class="hero">

<h1>Welcome to DevTrack</h1>

<h2>Enterprise Project Management & Bug Tracking System</h2>

<p>
Manage Projects, Assign Tasks, Track Progress and Resolve Bugs Efficiently.
</p>

<a href="login.php" class="btn">Login Now</a>

</section>

<section class="features">
<a href="login.php" class="card">
    <h3>🔐 Secure Login</h3>
    <p>User Authentication System</p>
</a>


<a href="projects/view_projects.php" class="card">
    <h3>📁 Project Management</h3>
    <p>Create, Update & Delete Projects</p>
</a>

<a href="tasks/view_tasks.php" class="card">
    <h3>✅ Task Management</h3>
    <p>Assign and Track Tasks Easily</p>
</a>

<a href="dashboard.php" class="card">
    <h3>📊 Dashboard</h3>
    <p>View Project & Task Statistics</p>
</a>

</section>

<footer>

© 2026 DevTrack Version 1.0 | Developed by Jyoti Negi

</footer>
</body>
</html>