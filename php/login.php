<?php
include_once("./session.php");
include_once("./config.php");
$mysqli = new controller();
$db = new db();
$password_error="";

if(isset($_POST['username'])){
    if(!empty($_POST['username']&&!empty($_POST['password']))){
        $username=$mysqli->sIO($_POST['username']);
        $password=$mysqli->sIO($_POST['password']);
        
        $sql="select * from users where username='".$username."' AND password='".$password."'";
        
        $result=$db->query($sql)->fetchAll();
        if(sizeof($result)==1 && !empty($result)){
            $_SESSION['userID'] = $result[0]['ID'];
            header("location:../index.php");
        }else{
            $password_error= "password or username wrrong";
            session_destroy();
        }
        $db->close();
    }else{
        $password_error= "password or username wrrong";
    }
}
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
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="username" class="form-control <?php if(!empty($password_error)){echo "is-invalid";} ?>" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control <?php if(!empty($password_error)){echo "is-invalid";} ?>" name="password">
                <div class="invalid-feedback"><?php echo $password_error; ?></div>
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <div class="mb-3" id="submit-btn">
                <button type="submit" class="btn btn-outline-primary btn-block">Login</button>
            </div>
        </form>
    </div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>