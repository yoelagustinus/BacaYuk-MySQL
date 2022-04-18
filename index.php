<?php
    session_start();
    require 'config.php';

    if (isset($_SESSION['success_register'])) {
            
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            '.$_SESSION['success_register'].'
            </div>
        </div>';
        unset($_SESSION["success_register"]);
    }

    
    if(isset($_POST['login'])){
        $email = $_POST['email']; 
        $password = $_POST['password'];
       
        
        $user = $db->users->findOne([
            'email' => $email,
        ]);
        
        $type_users = $user->type;

        if(password_verify($password, $user->password)){
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;

            if($type_users == "visitor"){
                header("Location: visitor/home.php");
            }else if($type_users == "admin"){
                header("Location: admin/index.php");
            }else{
                session_destroy();
                header("Location: index.php");
            }
            
        }else{
            echo '<script language="javascript">
            window.alert("Email atau Password SALAH!");
            window.location.href="index.php";
            </script>';
        }
    }


?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Baca Yuk!</title>
        <style type="text/css">
            body { background: #ECEFF1 !important; }
        </style>
    </head>
    <body>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <form action="" method="post">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="container">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body"><h4>Login account</h4>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword" required>
                            </div>
                            <button id="login" name="login" class="btn btn-primary">Login</button>
                            <div class="link-register d-flex flex-row-reverse bd-highlight">
                                <p class="text-muted fs-6 fw-lighter">Belum punya account?? <a href="register.php" class="text-decoration-none"> Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </form>    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>