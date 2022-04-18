<?php
    require 'header.php';
    require '../config.php';
    require 'ControllerAdmin.php';

    if (isset($_SESSION['success'])) {
        
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            '.$_SESSION['success'].'
            </div>
        </div>';
        unset($_SESSION["success"]);
    }

    if(isset($_POST['delete'])){
        $id = $_POST['content_id'];
        
        $content = $db->post->deleteOne([
            '_id' => new MongoDB\BSON\ObjectID($id)
        ]);
    
        $_SESSION['success'] = "Content telah Berhasil dihapus";
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<br>
<div class="container">
    <!-- <button type="button" class="btn btn-primary">Add New Konten</button> -->
    <?php echo "<a href='CreateContent.php'><button type='button' class='btn btn-success'>Add New Konten</button></a>"; ?>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Judul Konten</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Upload</th>
                <th scope="col-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                $cursor = $db->post->find();
                foreach($cursor as $post){
                    $id_content = $post->_id;
                    
            ?>
                    <tr>
                        <!-- <th scope="row">1</th> -->
                        <td><?php echo $post->title ?></td>
                        <td><?php echo $post->category ?></td>
                        <td><?php echo $post->created_at ?></td>
                        <td>
                            <?php echo "<a href='EditContent.php?ContentId=$id_content&'><button type='button' class='btn btn-primary'>Edit</button></a>"; ?>
                        </td>
                        <td>    
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $id_content; ?>" class="form-control" name="content_id" id="content_id">
                                    
                                </div>
                                <button type="submit" name="delete" id="delete" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
            <?php
                

                }
            ?>
            
        </tbody>
    </table>
</div>



</body>

