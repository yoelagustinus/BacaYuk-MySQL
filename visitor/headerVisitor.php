<?php

require '../config.php';
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

if (empty($_SESSION['email'])) {
    header("Location: ../index.php");
}

$email = $_SESSION['email'];

$user = $db->users->findOne([
    'email' => $email,
]);

$pg_category = $db->category->find();

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <title>Baca Yuk!</title>
        <style type="text/css">
            body { background: #ECEFF1 !important; }
        </style>
    </head>
    <body>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <!-- Tampilan -->
        <div class="tampilan">

            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <img src="../images/BacaYuk.png" alt="" width="40" height="40">
                                <a class="navbar-brand fw-bold text-success" href="home.php">Baca Yuk</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="pengetahuan.php">Pengetahuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="kesehatan.php">Kesehatan</a>
                            </li> -->
                            <?php
                            foreach($pg_category as $pg){
                                $category_name = $pg->category;
                            ?>
                            <li class="nav-item">
                            <?php 
                                echo "<a class='nav-link active' aria-current='page' href='page.php?CategoryName=$category_name&'><p class='text-capitalize'>$category_name</p></a>";
                            ?>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="aboutUs.php">About Us</a>
                            </li>
                        </ul>
                        <div class="user-setting">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $user->name ?> 
                                       <img src="../images/profil.png" class="rounded-circle" width="25" height="25">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>    
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </body>
</html>
