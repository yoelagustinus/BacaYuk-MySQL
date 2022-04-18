<?php
    include 'headerVisitor.php';
    require '../config.php';
    include 'ControllerVisitor.php';

    if (isset($_SESSION['success'])) {
            
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            '.$_SESSION['success'].'
            </div>
        </div>';
        unset($_SESSION["success"]);
    }
    
    if(isset($_GET['ContentId'])){
        $content = $db->post->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_GET['ContentId'])
        ]);
    }
    
    $thumbnail = $content->fileName;
    $post_id = $content->_id;

    if(isset($_POST['post_comment'])){
        
        $comment = [
            'comment_sender' => $user->name,
            'text_comment' => $_POST['text_commentar'],
            'post_id' => $post_id,
        ];

        $insertOneResult = $db->commentar->insertOne($comment);
        $_SESSION['success'] = "Komentar kamu berhasil ditambah!";
        echo "<meta http-equiv='refresh' content='0'>";
    }

    $get_comment = $db->commentar->find([
        'post_id' => $post_id
    ]);

    
?>

<link rel="stylesheet" href="comment.css" media="screen">
<!-- artikel -->
<div class="container p-4">
    <div class="d-flex justify-content-center mb-3">
        <?php
        echo '<img src="../images_thumb/'. $thumbnail.'" width="500" class="img-fluid" alt="">';
        ?>
    </div>
    <h4 class="mb-3 text-center"><?php echo $content->title ?></h4>
    <p class="fw-light text-center"><?php echo $content->category . ' / '. $content->created_at ?></p>
    <p>
        <?php
            echo $content->konten;
        ?>
    </p>
    <!-- komentar -->
    <h4 class="mb-3">Komentar</h4>
    <?php
        
        $i=0;
        foreach($get_comment as $comments){
            
            $i++;
        
    ?>
    
    <div class="row row-cols-auto">
        <div class="col"><img src="../images/profil.png" class="rounded-circle" width="45" height="45"></div>
        <div class="col"><h6><?php echo $comments->comment_sender ?></h6>
            <p><?php echo $comments->text_comment ?></p>
        </div>
    </div> 
    
    <?php
        
        }
        
        $jmlh_comment = $i . ' Komentar';
        
        echo '<h6 class="mb-2">'. $jmlh_comment . '</h6>';
    ?>
    <form action="" method="POST">
        <div class="comment" style="width: 50rem;">
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="text_commentar" name="text_commentar" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Beri komentar disini...</label>
            </div>
            <div class="button">
                
                <button id="post_comment" name="post_comment" class="btn btn-primary">Post Komentar</button>
            </div>
        </div>
    </form>
	<?php

    ?>
</div>