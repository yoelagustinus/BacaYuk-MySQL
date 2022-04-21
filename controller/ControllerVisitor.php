<?php
    include 'config.php';

    function cutString($text){
        if(empty($text)){
            $newText = '';
        }else{
            $newText = substr($text, 0, 100);
            $newText .='...';
        }

        return $newText;
    }

    function GetUser($email){
        $conn_db = connect_db();

        $sql = "SELECT * FROM tbl_users WHERE user_email = '$email'";

        $query = mysqli_query($conn_db, $sql);
        $row = mysqli_fetch_array($query);

        return $row;
    }

    function GetContent(){
        //select All
        $conn_db = connect_db();

        $sql = "SELECT * FROM tbl_contents ORDER BY created_at ASC";
    }

    function GetContentCategory(){


    }

