<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: PendingComment.php");
    }

    include '../controller/config.php';

    if(isset($_POST['login_user'])){
        $conn_db = connect_db();
        $username = $_POST['username']; 
        $userpass = $_POST['password'];

        $sql = mysqli_query($conn_db, "SELECT username, password FROM wp_admin WHERE username = '$username'");

        list($username, $password) = mysqli_fetch_array($sql);

        if(mysqli_num_rows($sql) > 0) {

            if(password_verify($userpass, $password)) {

                //buat session baru
                
                $_SESSION['username'] = $username;
                header("Location: PendingComment.php");
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            }else {
                echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="./";
                    </script>';
            }
        }else {
            echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                </script>';
        }
    }

?>

<!DOCTYPE html>
<html?>
    <head>
        <title>Login Admin WarungSaTeKaMu March Campaign</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style-form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    </head>

    <body>
        <div class="header">
            <h2>Login for Admin WarungSaTeKaMu</h2>
        </div>
            
        <form method="POST" action="">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" >
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" id="id_password" required=""> 
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
        </form>
    </body>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');
        
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
	</script>
</html>