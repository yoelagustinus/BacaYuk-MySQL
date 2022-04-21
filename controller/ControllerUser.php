<?php

	include 'config.php';

	if(isset($_GET['fn'])){
		if($_GET['fn'] == "log_out"){
			LogoutAdmin();
		}else{
			header("Location: ../admin/PendingComment.php");
		}
	}

    function UserRegister($name, $email, $password, $type){
        $conn_db = connect_db();

        $sql = "INSERT INTO tbl_users (user_name, user_email, user_password, user_type) VALUES('$name','$email','$password','$type')";

        if(mysqli_query($conn_db, $sql)){
            $message = "berhasil";
        }else{
            $message = "gagal";
        }
        
        return $message;
    }

    function CheckUser($email){
        $conn_db = connect_db();

        $sql = "SELECT * FROM tbl_users";

        $query = mysqli_query($conn_db, $sql);
        $i = 0;
        while($row = mysqli_fetch_array($query)){
            if($row[2] == $email){
                $i=1;
            }
            
        }
        return $i;
    }
    
	function UserLogin($email, $userpass){
        $conn_db = connect_db();
        $sql = "SELECT user_email, user_password, user_type FROM tbl_users WHERE user_email = '$email'";

        $query = mysqli_query($conn_db, $sql);
        list($email_db, $password, $type_users) = mysqli_fetch_array($query);

        // if(password_verify($password, $user->password)){
        //     $_SESSION['email'] = $email;
        //     $_SESSION['loggedin'] = true;

        //     if($type_users == "visitor"){
        //         header("Location: visitor/home.php");
        //     }else if($type_users == "admin"){
        //         header("Location: admin/index.php");
        //     }else{
        //         session_destroy();
        //         header("Location: index.php");
        //     }
            
        // }else{
        //     echo '<script language="javascript">
        //     window.alert("Email atau Password SALAH!");
        //     window.location.href="index.php";
        //     </script>';
        // }

        if(mysqli_num_rows($query) > 0){
            if(password_verify($userpass, $password)){
                $_SESSION['user_email'] = $email_db;
                $_SESSION['loggedin'] = true;

                if($type_users == "visitor"){
                    header("Location: visitor/");
                    
                    die();
                }else if($type_users == "admin"){
                    header("Location: admin/");
                    die();
                }
                // else{
                //     session_destroy();
                //     header("Location: ../index.php");
                // }
            }else{
                echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="../index.php";
                      </script>';
            }
        }else{
            echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="../index.php";
                      </script>';
        }

    }

	
	
	function LogoutALogoutdmin(){
        session_start();
 
        // Unset all of the session variables
        $_SESSION = array();
        
        // Destroy the session.
        session_destroy();
        
        // Redirect to login page
        header("location: ../admin/index.php");
        exit;
    }

    