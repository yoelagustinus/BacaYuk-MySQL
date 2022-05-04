<?php

    include 'config.php';

    //visitor
    function InsertComment($article_name,$visitor_name,$visitor_email,$visitor_komentar){
        $conn_db = connect_db();
        mysqli_set_charset($conn_db, "utf8mb4");

        $output = "";
        $sql = "INSERT INTO tbl_comment(ArticleName,NameVisitor,EmailVisitor,IsiCommentVisitor,CommentStatus) VALUES ('$article_name', '$visitor_name','$visitor_email','$visitor_komentar',0)";

        if (mysqli_query($conn_db, $sql)) {
            $output = "Komentar kamu telah dikirim! <br> Dan, Komentar kamu dalam proses Seleksi!";
        } else {
            $output = "Komentar kamu gagal dikirim";
        }
        
        mysqli_close($conn_db);

        return $output;
    }

    function ListComment(){
        //select row komentar yang sudah di approved sesuai artikel, pakai if
        $conn_db = connect_db();

        $sql = "SELECT * from tbl_comment WHERE CommentStatus=1";
        $row = mysqli_query($conn_db, $sql);
        
        return $row;

    }