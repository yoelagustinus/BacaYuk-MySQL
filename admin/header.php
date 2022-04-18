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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <img src="../images/BacaYuk.png" alt="" width="40" height="40">
              <a class="navbar-brand fw-bold text-success" href="index.php">Baca Yuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Konten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="ViewUser.php">View User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="AddCategory.php">View Category</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="EditProfile.php"><?php echo $user->name ?> </a>
            </li> -->
          </ul>
          <div class="d-flex flex-row-reverses">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Logout</a>
              </li>
              </ul>
          </div> 
        </div>
      </div>
    </nav>
  </body>
</html>