<?php
    
    require 'header.php';
    include '../controller/AdminController.php';
    $content_id = $_GET['content_id'];
    $result_content = ViewListContentEveryEach($content_id);
    $get_post = mysqli_fetch_assoc($result_content);

    if(isset($_POST['update_post'])){
        $title_post = $_POST['title'];
        $isi_post_konten = $_POST['isi_konten'];
        $category_post = $_POST['category'];
        $excerpt_post = $_POST['excerpt_konten'];
        $link_youtube = $_POST['link_youtube'];

        //process image post
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $save_folder = "../images/posts/".$filename;
        $db_file_folder = $filename;
        $new_name_file = $title_post;

        UpdateContent($content_id, $title_post, $isi_post_konten, $category_post, $excerpt_post, $link_youtube, $db_file_folder);

        move_uploaded_file($tempname, $save_folder);
        


        
    }

?>

<style>
    .ex1{
        background-color: lightblue;
        width: 20rem;
        height: 110px;
        overflow: scroll;
    }
</style>

<div class="container" style="">
    <h2 style="margin-top: 5rem;">Add New Post</h2>
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
                            <textarea class="form-control" name= "title" id="title" required><?php echo $get_post['content_title']?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Isi Konten</th>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" name="isi_konten" id="konten" style="height: 500px"><?php echo $get_post['the_content']?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Kategori Kontent</th>
                    <td>
                        <p>
                            <?php
                                $category = $get_post['content_category'];
                                echo $category;
                            ?>
                        </p>
                        <div class="ex1">

                        
                            <?php
                                $result_category = ViewListCategory();
                                
                                if(mysqli_num_rows($result_category)){
                                    while($ctgry = mysqli_fetch_array($result_category)){
                                        $nama_ctgry = $ctgry[1];
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input"  id="flexRadioDefault1" type="radio" name="category" <?php if (isset($category) && $category==$nama_ctgry) echo "checked";?>value=<?php echo $category?> required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?php echo $nama_ctgry?>
                                    </label>
                                </div>
                            <?php


                            
                                    }
                                }
                            ?>
                        </div>
                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">Excerpt Post</th>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" name="excerpt_konten" id="excerpt" style="height: 8rem"><?php echo $get_post['content_excerpt']?></textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Link for Youtube</th>
                    <td>
                        <div class="col-md-12">
                            <p>Digunakan untuk Embed Link Youtube:</p>
                            <textarea class="form-control" name="link_youtube" id="link_youtube"><?php echo $get_post['youtube_link']?></textarea>
						</div>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Post Picture</th>
                    <td>
                        <img src="<?php echo '../images/posts/'.$get_post['name_file'];?>" style="width: 200px">
                        <br><br>
                        <div class="col-md-12">
						    <input id="file" name="uploadfile" type="file" placeholder="" class="form-control input-md" value="<?php echo $get_post['name_file']?>" accept=".jpg, .jpeg, .png">
						</div>
                    </td>
                </tr>

            </tbody>
        </table>

        <input type="submit" name="update_post" class="btn btn-success" value="Update">

    </form>


</div>