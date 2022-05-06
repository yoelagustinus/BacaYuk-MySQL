<?php
    $page='list_category';
    require 'header.php';
    include '../controller/AdminController.php';
    
    if(isset($_POST['create_category']) && isset($_POST['name_category'])){
        CreateNewCategory($_POST['name_category']);
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
                            <input type="text" class="form-control" id="category" name="name_category" required>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <button id="create_category" name="create_category" class="btn btn-success">Create Category</button>
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
                <!-- Output List Category -->
                <!-- <?php
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
                ?> -->
            </tbody>
        </table>
        
    
    <br><br>
</div>