<?php
	function connect_db(){
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$database = "db_bacayuk";
		
		return mysqli_connect($servername,$username,$password,$database);
	}
	
	//  CREATE TABLE IF NOT EXISTS tbl_content(
	// 	content_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	// 	content_title VARCHAR(100) NOT NULL,
	// 	the_content LONGTEXT NOT NULL,
	// 	Content_category VARCHAR(100) NOT NULL,
	// 	name_file LONGTEXT,
	// 	created_at LONGTEXT
	// )DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;"
	
	//  CREATE TABLE IF NOT EXISTS tbl_users(
	// 	user_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	// 	user_name VARCHAR(100) NOT NULL,
	// 	user_email VARCHAR(100) NOT NULL,
	// 	user_password LONGTEXT NOT NULL,
	// 	user_foto LONGTEXT,
	// 	user_type LONGTEXT
	// )DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";

	//  CREATE TABLE IF NOT EXISTS tbl_category(
	// 	category_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	// 	category_name VARCHAR(100) NOT NULL
	// )DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

    