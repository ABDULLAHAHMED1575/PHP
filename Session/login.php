<?php
session_start();
$name = $_SESSION['username'];
$query = "SELECT * FROM user1 WHERE name = $name"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="signup.php" method="post" class="signup-form">
            <h2>Login</h2>
            <input type="text" name="uname" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">login</button>
            <p>Create an account.. <a href="signup.php"><strong>Sign up</strong></a></p>
        </form>
    </div>
</body>
</html>