<?php
    
    require 'header.php';
    include '../controller/AdminController.php';

?>

<div class="container">
    <h2 style="margin-top: 2rem;">Add New Post</h2>
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
                        <!-- <?php
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
                        ?>  -->
                        
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


</div>