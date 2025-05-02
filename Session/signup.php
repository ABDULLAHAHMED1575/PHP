<?php
session_start();
$con = mysqli_connect('localhost','root','','users');
if(!$con){
    die("Connection failed.");
}

if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['uname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "SELECT * FROM user1 WHERE name = '$username'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 0){
        $qu = "INSERT INTO user1(name, email, password) VALUES ('$username','$email','$password')";
        if(mysqli_query($con, $qu)){
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            echo "<script>alert('Failed to create account. Try again.');</script>";
        }
    } else {
        echo "<script>alert('Username already exists.');</script>";
    }
}
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
            <h2>Create Account</h2>
            <input type="text" name="uname" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
            <p>Already have an account? <a href="login.php"><strong>Sign in</strong></a></p>
        </form>
    </div>
</body>
</html>
