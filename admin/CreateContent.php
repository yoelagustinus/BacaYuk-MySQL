<?php
    require 'header.php';
    require '../config.php';
    require 'ControllerAdmin.php';
    

    if(isset($_POST['create'])){
        $date= mktime(date("m"),date("d"),date("Y"));
        $today_date=date("d M Y", $date);
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'title' => $_POST['title'],
            'konten' => $_POST['konten'],
            'category'=> $_POST['category'],
            'created_at' => $today_date,
        ];

        //Upload File Images
        if($_FILES['file']) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], '../images_thumb/'.$_FILES['file']['name'])) {
                $data['fileName'] = $_FILES['file']['name'];
            } else {
                echo "Failed to upload file.";
            }
        }
        
        $insertOneResult = $db->post->insertOne($data);
             
        $_SESSION['success'] = "Content '" .  $_POST['title'] . "' berhasil dibuat";
        header("Location: index.php");
    }

    $select_category = $db->category->find();
?>


<div class="container">
    <br>
    <p class="fs-2">Menambah Konten Baru</p>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Coloumn</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Title</th>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" name= "title" id="title" required></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Isi Konten</th>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" name= "konten" id="konten" style="height: 500px" required></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Kategori Kontent</th>
                    <td>
                        <?php
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
						    <input id="file" name="file" type="file" placeholder="" class="form-control input-md" required>
						</div>
                    </td>
                </tr>

            </tbody>
        </table>


        <button id="create" name="create" class="btn btn-success">Create</button>

    </form>

    <br><br>
</div>
