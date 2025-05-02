<?php
    $servername = 'localhost';
    $hostname = 'root';
    $password = '';
    $db_name = "users";
    $error = '';
    $success = '';
    $con = mysqli_connect($servername,$hostname,$password,$db_name);

    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['signup'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($name == "" || $password == "" || $email == ""){
                $error = "Field cannot be empty.....";
            }
            else{
                $hashpass = password_hash($password,PASSWORD_DEFAULT);
                $result = "select * from user1 where name='$name';";
                $query = mysqli_query($con,$result);

                if(mysqli_num_rows($query)>0){
                    $error = "user already exist";
                }
                else{
                    $query = "Insert into user1(name,email,password) values ('$name','$email','$hashpass')";
                    if(mysqli_query($con,$query)){
                        $success = 'Data inserted successfully...';
                    }
                    else{
                        $error = 'Failed to insert data....';
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
            <button  type="button" onclick="window.location.href='login.php'" name="login">Login</button>
        </div>
    </form>
    <span class="error" name="error"><?php echo $error?></span>
    <span class="success" name="success"><?php echo $success?></span>
</body>
</html>