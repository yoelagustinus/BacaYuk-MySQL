<?php
    $page='list_category';
    require 'header.php';
    include '../controller/AdminController.php';
    
    if(isset($_POST['create_category']) && isset($_POST['name_category'])){
        CreateNewCategory($_POST['name_category']);
    }
    else if(isset($_POST['btn_update_category'])){
        $id_update_category = $_POST['category_update_id'];
        $text_update = $_POST['text_update_category'];

        echo $id_update_category . "<br>";
        echo $text_update . '<br>';

        $r = UpdateCategory($id_update_category, $text_update);

        echo $r;
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
        <input type="submit" id="create_category" name="create_category" class="btn btn-success" value="Create Category">
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
                    $result = ViewListCategory();
                    $i = 0;
                    if(mysqli_num_rows($result)){
                        while($data = mysqli_fetch_array($result)){
                            $i++;
                            $category_id = $data[0];
                            
                            
                ?>
                <tr>
                    <td>
                        <form action="" method="POST">
                            <input type="text" name="text_update_category" value="<?php echo $data[1]?>">

                            <input type="hidden" name="category_update_id" value="<?php echo $category_id?>">
                        
                        
                    </td>
                    <td>
                            <input type="submit" name="btn_update_category" class="btn btn-success" value="Update">
                        </form>
                    </td>
                </tr>
                <?php
                        }
                        echo "found: " . $i . " Results!";
                    }else{
                        echo "found: 0 Results!";
                    }
                ?>
            </tbody>
        </table>
        
    
    <br><br>
</div>