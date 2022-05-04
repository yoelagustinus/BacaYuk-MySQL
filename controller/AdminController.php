<?php
    include 'config.php';

    if(isset($_GET['fn'])){
        if($_GET['fn'] == "log_out"){
            LogoutAdmin();
        }else{
            header("Location: ../admin/PendingComment.php");
        }
    }
    
    //if isset dari button or a href with name??

    function ActionBeApprovedComment($id_comment, $page){
        //Update row, column CommentStatus 0 -> 1
        $conn_db = connect_db();
        $sql = "UPDATE tbl_comment SET CommentStatus=1 WHERE commentId='$id_comment'";
        mysqli_query($conn_db, $sql);
        if($page=="pending_comment"){
            header("Location: ../admin/PendingComment.php");
        }else if($page=="spam_comment"){
            header("Location: ../admin/SpamComment.php");
        }
    }   

    function ActionBePendingComment($id_comment, $page){
        //Update row, column CommentStatus 1 -> 0  
        $conn_db = connect_db();
        $sql = "UPDATE tbl_comment SET CommentStatus=0 WHERE commentId='$id_comment'";
        
        mysqli_query($conn_db, $sql);

        if($page=="approve_comment"){
            header("Location: ../admin/ApproveComment.php");
        }else if($page=="spam_comment"){
            header("Location: ../admin/SpamComment.php");
        }

    }

    function ActionSpamComment($id_comment, $page){
        //update row, column CommentStatus 1->2
        //update row, column CommentStatus 0->2

        $conn_db = connect_db();
        $sql = "UPDATE tbl_comment SET CommentStatus=2 WHERE commentId='$id_comment'";

        mysqli_query($conn_db, $sql);

        if($page=="approve_comment"){
            header("Location: ../admin/ApproveComment.php");
        }else if($page=="pending_comment"){
            header("Location: ../admin/PendingComment.php");
        }
    }

    function ActionDeleteComment($id_comment){
        //dete
        $conn_db = connect_db();

        $sql = "DELETE FROM tbl_comment WHERE commentId='$id_comment'";

        mysqli_query($conn_db, $sql);
        
        
    }

    function ViewPendingComment(){
        //select row komentar yang CommentStatusnya 0
        $conn_db = connect_db();

        $sql = "SELECT * from tbl_comment WHERE CommentStatus=0";
        $row = mysqli_query($conn_db, $sql);

        return $row;

    }

    function ViewApprovedComment(){
        //select row komentar yang CommentStatusnya 1
        $conn_db = connect_db();

        $sql = "SELECT * from tbl_comment WHERE CommentStatus=1";
        $row = mysqli_query($conn_db, $sql);
        
        return $row;
    } 

    function ViewSpamComment(){
        //select row komentar yang CommentStatusnya 2
        $conn_db = connect_db();

        $sql = "SELECT * from tbl_comment WHERE CommentStatus=2";
        $row = mysqli_query($conn_db, $sql);
        
        return $row;
    }  

    function LoginAdmin($username, $userpass){
        $conn_db = connect_db();
        $sql = "SELECT username, password FROM wp_admin WHERE username = '$username'";

        $query = mysqli_query($conn_db, $sql);
        list($username, $password) = mysqli_fetch_array($query);

        if(mysqli_num_rows($sql) > 0){
            if(password_verify($userpass, $password)){
                $_SESSION['username'] = $username;
                header("Location: PendingComment.php");
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            }else{
                echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="login.php";
                    </script>';
            }
        }else{
            echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="login.php";
                    </script>';
        }

    }

    function printStatusComment($input){
        if($input == 1){
            $status = "Approved Comment";
        }else if($input == 0){
            $status = "Pending Comment";
        }else if($input == 2){
            $status = "Spam Comment";
        }

        return $status;
    }

    function LogoutAdmin(){
        session_start();

        // Unset all of the session variables
        $_SESSION = array();
        
        // Destroy the session.
        session_destroy();
        
        // Redirect to login page
        header("location: ../admin/index.php");
        exit;
    }

?>