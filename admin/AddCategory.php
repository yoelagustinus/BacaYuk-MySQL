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

    if(isset($_POST['create'])){
        $data = [
            'category' => $_POST['category'],
            
        ];
        
        $insertOneResult = $db->category->insertOne($data);
             
        $_SESSION['success'] = "category '" .  $_POST['category'] . "' berhasil dibuat";
        header("Location: AddCategory.php");
    }

    if(isset($_POST['delete'])){
        $id_category = $_POST['category_id'];
        
        $content = $db->category->deleteOne([
            '_id' => new MongoDB\BSON\ObjectID($id_category)
        ]);
    
        $_SESSION['success'] = "Category telah Berhasil dihapus";
        header("Location: AddCategory.php");
    }

?>

<div class="container">
    <br>
    <p class="fs-2">Menambah Category Baru</p>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Name Category</th>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <button id="create" name="create" class="btn btn-success">Create Category</button>
    </form>

    <br><br>
    <p class="fs-2">List Category</p>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name Kategori</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $category = $db->category->find();
                    foreach($category as $ctgr){
                        $id_category = $ctgr->_id;
                ?> 
                <tr>
                    <td>
                        <?php echo $ctgr->category ?>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_category; ?>" class="form-control" name="category_id" id="category_id">
                                
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
        
    
    <br><br>
</div>