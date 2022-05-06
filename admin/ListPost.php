<?php
    $page='list_content';
    require 'header.php';
    include '../controller/AdminController.php';

    if(isset($_POST['delete_post_button']) && isset($_POST['content_id'])){
        $id_content = $_POST['content_id'];
        ActionDeletePost($id_content);
    }

?>

<div class="container">
    <h2 style="margin-top: 2rem;">Posts</h2>
    <a type="button" style="margin-bottom: 1rem;" class="btn btn-success" href="AddNewPost.php">Add New Post</a>
    <div class="table-responsive">
        
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">Post Title</th>
                    <th scope="col" style="width: 37rem;">The Content</th>
                    <th scope="col">Category</th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Actions</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = ViewListContent();
                    $i = 0;
                    if(mysqli_num_rows($result)){
                        while($data = mysqli_fetch_array($result)){
                            $i++;
                            $content_id = $data[0];
                            
                ?>
                <tr>
                    <td><?php echo $data[1]?></td>
                    <td><?php echo cutString($data[2])?></td>
                    <td><?php echo $data[3]?></td>
                    <td><?php echo $data[5]?></td>
                    <td>
                        <a type="submit" href="" name="edit_button" class="btn btn-primary" value="edit">Edit</a>
                        <a type="submit" href="../controller/AdminController.php?content_id=<?php echo $content_id?>&" name="edit_button" class="btn btn-danger" value="delete">Delete</a>
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
    </div>
</div>