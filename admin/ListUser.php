<?php
    $page='list_user';
    require 'header.php';
    include '../controller/AdminController.php';

?>

<div class="container">
    <h2 style="margin-top: 2rem;">List Users</h2>
    <div class="table-responsive">
        
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = ViewPendingComment();
                    $i = 0;
                    if(mysqli_num_rows($result)){
                        while($data = mysqli_fetch_array($result)){
                            $i++;
                            $comment_id= $data[0];
                            $status = printStatusComment($data[5]);
                ?>
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?php echo $data[2] . "<br>" . $data[3]?></td>
                    <td><?php echo $data[4]?> <br>
                        <form action="" method="POST">
                            <input type="hidden" name="comment_id" value="<?php echo $comment_id?>">
                            <input type="submit" name="approve_button" class="btn btn-success" value="Approve" style="margin-right: 0.5rem;">
                            <input type="submit" name="spam_button" class="btn btn-secondary" value="Spam">
                        </form>
                    </td>
                    <td><?php echo $data[1]?></td>
                    <td><?php echo $status?></td>
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