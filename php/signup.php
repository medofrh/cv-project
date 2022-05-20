<?php

include_once('./config.php');
$mysqli = new controller();
$db = new db();

$error_repassword="";
$error_all=0;

if(isset($_POST['username'])){
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repassword'])){
        if($_POST['password']!==$_POST['repassword']){
            $error_repassword="is-invalid";
        }else{
            $user=$mysqli->sIO($_POST['username']);
            $password=$mysqli->sIO($_POST['password']);

            if (str_contains($password, "'" ) || str_contains($password, '"' )) {
                $error_repassword="is-invalid";
            }else{
                if(str_contains($user, "'" ) || str_contains($user, '"' )){
                    $error_repassword="is-invalid";
                }else{
                    $query="insert into users (username, password) VALUES ('".$user."', '".$password."');";
                    $check_query="select * from users where username='".$user."' AND password='".$password."'";

                    $result=$db->query($check_query)->fetchAll();
                    if(sizeof($result)!==0 && !empty($result)){
                        $error_all=1;
                    }else{
                        $result=$db->query($query);
                        header ("Location: login.php?status=success");
                    }
                    $db->close();
                    echo $error_all;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylesheet.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" id="login-box">
        <form action="#" method="post">
            <div style="display: grid;">
                <a href="../" class="btn btn-link" style="text-align: right;">back</a>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="username" class="form-control <?php if($error_all==1){echo "is-invalid";} ?> <?php if(!empty($password_error)){echo "is-invalid";} ?>" name="username" autofocus required>
                <div class="invalid-feedback">user used</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control <?php if($error_all==1){echo "is-invalid";} ?>" name="password" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Re-Password</label>
                <input type="password" class="form-control <?php if($error_all==1){echo "is-invalid";} ?> <?php echo $error_repassword; ?>" name="repassword" required>
                <div class="invalid-feedback"><?php if(!empty($error_repassword)){echo "password does not match";} ?></div>
            </div>

            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <div class="mb-3" id="submit-btn">
                <button type="submit" class="btn btn-outline-primary btn-block">signin</button>
            </div>
        </form>
    </div>  
</body>
</html>