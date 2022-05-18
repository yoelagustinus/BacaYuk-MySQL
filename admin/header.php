<?php
    // session_start();

    // //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
    // if (empty($_SESSION['username'])) {
    //     header("Location: ./");
    // }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="shortcut icon" href="https://www.warungsatekamu.org/wp-content/uploads/2021/09/logo-Satee-02.png">
        <title>Admin Project Panel</title>
    </head>

    <body>

        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="">
            <div class="container">
                <a class="navbar-brand">
                <img src="https://www.warungsatekamu.org/wp-content/uploads/2021/09/logo-Satee-02.png" height="40">
                    Admin Project Panel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php if($page2=='edit_comment'){echo 'active';}?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../images/icons-comment.png" style="width: 1rem;">
                                Edit Comments
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item  <?php if($page=='pending_comment'){echo 'active';}?>" href="PendingComment.php">Pending Comments</a>
                                </li>
                                <li>
                                    <a class="dropdown-item  <?php if($page=='approve_comment'){echo 'active';}?>" href="ApproveComment.php">Approved Comments</a>
                                </li>
                                <li>
                                    <a class="dropdown-item  <?php if($page=='spam_comment'){echo 'active';}?>" href="SpamComment.php">Spam Comments</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='list_content'){echo 'active';}?>" href="ListPost.php">
                        <img src="../images/icons-post.png" style="width: 1rem;">
                        Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='list_category'){echo 'active';}?>" href="ListCategory.php">
                        <img src="../images/icons-category.png" style="width: 1rem;">
                        Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='list_user'){echo 'active';}?>" href="ListUser.php">
                        <img src="../images/icons-user.gif" style="width: 1rem;">
                        Users</a>
                    </li>
                </ul>

                
                <span class="navbar-text">
                    <a class="nav-link" type="submit" href="../controller/AdminController.php?fn=log_out&">Log out</a>
                </span>
                </div>
            </div>
        </nav>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>