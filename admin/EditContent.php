<?php
    require 'header.php';
    require '../config.php';
    
    require 'ControllerAdmin.php';
    
    

    if(isset($_GET['ContentId'])){
        $content = $db->post->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_GET['ContentId'])
        ]);
    }

    if(isset($_POST['update'])){
        
        $data = [
            '$set' => [
                'title' => $_POST['title'], 
                'konten' => $_POST['konten'], 
                'category' => $_POST['category'],
                
            ]
        ];

        $db->post->updateOne([
            '_id' => new MongoDB\BSON\ObjectID($_GET['ContentId'])
        ], $data);

        $_SESSION['success'] = "Content '$content->title' berhasil diupdate";
        header("Location: index.php");
    }
    
    $select_category = $db->category->find();
?>


<div class="container">
    <br>
    <p class="fs-4">Edit <?php echo $content->title ?></p>
    <form method="POST">
        <table class="table" action="" enctype="multipart/form-data">
            <thead>
                <tr>
                    <th scope="col" style='width: 200px'>Coloumn</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Title</th>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" name= "title" id="title" style="height:100px;" required><?php echo $content->title ?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    
                    <th scope="row">Isi Konten</th>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" name= "konten"  style='height: 500px' required><?php echo $content->konten ?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Kategori Kontent</th>
                    <td>
                        <?php
                            echo "<b>$content->category</b>";
                            foreach($select_category as $ctgry){
                                $nama_ctgry = $ctgry->category;
                        ?>
                        
                            <div class="form-check">
                                <input class="form-check-input"  id="flexRadioDefault1" type="radio" name="category" <?php if (isset($category) && $category==$nama_ctgry) echo "checked";?>value=<?php echo $nama_ctgry?> required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <?php echo $nama_ctgry?>
                                </label>
                            </div>
                        <?php
                            }
                        ?> 
                        
                    </td>
                </tr>

                <tr>
                    <th scope="row">Thumbnail Picture</th>
                    <td>
                        <div class="col-md-12">
                            <?php echo '<img src="../images_thumb/'.$content['fileName'].'" width="180">'; ?>
                            <br>
                            <br>
                            <!-- <input id="file" name="file" type="file" placeholder="" class="form-control input-md" required> -->
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>


        <button id="update" name="update" class="btn btn-success">Update</button>

    </form>

    <br><br>
</div>
