<?php
session_start();
include_once("./config.php");
$mysqli = new controller();


// if(isset($_POST['username'])){
//     if(!empty($_POST['username']&&!empty($_POST['password']))){
//         $username=$_POST['username'];
//         $password=$_POST['password'];
    
//         $sql="select * from users where username='".$username."' AND password='".$password."'";
    
//         $result=mysqli_query($mysqli,$sql);
        
    
//         if(mysqli_num_rows($result)==1){
//             // $_SESSION['userID'] = 
//             // if(empty($_SESSION['userID'])) header()
//             echo "hello there";
//         }else{
//             echo "password or username wrrong";
//             session_destroy();
//         }
//         $mysqli->close();
//     }else{
//         echo "submit is empty";
//     }
//     // echo $mysqli->ping();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylesheet.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" id="login-box">
        <form action="#" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="username" class="form-control" name="username" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>