<?php

function connect_db(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "db_bacayuk";
    
    return mysqli_connect($servername,$username,$password,$database);
}

// $sql = "CREATE TABLE IF NOT EXISTS tbl_comment(
// 	commentId int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
// 	ArticleName VARCHAR(100) NOT NULL,
// 	NameVisitor VARCHAR(100) NOT NULL,
// 	EmailVisitor VARCHAR(100) NOT NULL,
// 	IsiCommentVisitor LONGTEXT,
// 	CommentStatus int(2)
// )DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";