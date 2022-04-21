<?php

function connect_db(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "db_bacayuk";
    
    return mysqli_connect($servername,$username,$password,$database);
}