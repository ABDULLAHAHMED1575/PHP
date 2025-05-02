<?php
    $con = mysqli_connect("localhost","root","","students");
    if (!$con) {
        echo"Connection fail";
    }
    if(isset($_POST["signup"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $encryptPassword = password_hash($password, PASSWORD_DEFAULT);
        $verify = password_verify($encryptPassword, $password);
        $sql = "Insert into student(name,email,password) values('$name','$email','$encryptPassword');";
        $result = mysqli_query($con, $sql);
        if($verify){
            echo "$verify";
        }
        if($result){
            echo "Data Store Successfully....";
        }
        else{
            echo "Status Code: 500 Error: Internal Server Error";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="containers">
        <form class="form-field" method="POST">
            <input type="text" name="name" class="name" placeholder="Enter Name: " />
            <input type="email" name="email" class="email" placeholder="Enter Email: "/>
            <input type="password" name="password" class="password" placeholder="Enter password: "/>
            <div class="container">
                <button name="login">Login</button>
                <button name="signup">Signup</button>
            </div>
            
        </form>
        <table>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>password</th>
            </tr>
            <?php
                $query = "select * from student;";
                $result = mysqli_query($con, $query);
                while($data = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <td>'.$data['name'].'</td>
                    <td>'.$data['email'].'</td>
                    <td>'.$data['password'].'</td>
                    </tr>';
                }
            ?>
        </table>        
    </div>

</body>
</html>