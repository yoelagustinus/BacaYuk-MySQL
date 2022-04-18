<?php
session_start();
?>
<?php
    require 'config.php';

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        
        $check = false;

        //check email
        $temp = $db->users->findOne([
            'email' => $email
        ]);
        if(!empty($temp)){
            $check = true;
        }
        

        $check_user = $db->users->find();
        $i = 0;
    
        foreach ($check_user as $chk_user) {
            $i++;
        }

        if($check == true){
            echo '<script language="javascript">
            window.alert("Email sudah terdaftar! Register tidak dapat diproses!");
            window.location.href="register.php";
            </script>';
        }else{
            if($i==0){
                //jika belom ada user maka typenya admin
                $type = "admin";
            }else{
                //jika sudah ada user, maka tipenya visitor
                $type = "visitor";
            }
            
            if($pass1 == $pass2){
                $password = $pass1;
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password'=> $hashed_password,
                    'type' => $type,
                ];

                $insertOneResult = $db->users->insertOne($data);
                $_SESSION['success_register'] = "Register telah berhasil, Silahkan Login!";
                header("Location: index.php");

            }else{
                echo '<script language="javascript">
                        window.alert("Kedua Password tidak sama!");
                        window.location.href="register.php";
                    </script>';
            }
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
        <form action="" method="POST">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="container">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body"><h4>Register account</h4>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="name" name="name" class="form-control" id="exampleInputName" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email address</label>
                                <input type="email" name="mail" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <input type="password" name="password1" class="form-control" id="exampleInputPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">Verification Password</label>
                                <input type="password" name="password2" class="form-control" id="exampleInputPassword" required>
                            </div>
                            <!-- <a href="home.php" type="submit" class="btn btn-primary">Register</a> -->
                            <button id="register" name="register" class="btn btn-primary">Register</button>
                            <div class="link-register d-flex flex-row-reverse bd-highlight">
                                <p class="text-muted fs-6 fw-lighter">Sudah punya account?? <a href="index.php" class="text-decoration-none"> Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>