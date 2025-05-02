<?php
$error = '';
    $success = '';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
        }
        input{
            width: 20rem;
        }
        .success{
            color: green;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <input type="text" placeholder="Enter name" name="name">
        <input type="text" placeholder="Enter email" name="email">
        <input type="text" placeholder="Enter password" name="password">
        <div>
            <button name="signup">Sign Up</button>
            <button name="login">login</button>
        </div>
    </form>
    <span class="error" name="error"><?php echo $error?></span>
    <span class="success" name="success"><?php echo $success?></span>
</body>
</html>