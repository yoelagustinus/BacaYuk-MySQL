<?php
    $page='spam_comment';
    require 'header.php';
    include '../controller/AdminController.php';

    if(isset($_POST['unapprove_button']) && isset($_POST['comment_id'])) {
        $id_comment = $_POST['comment_id'];
        ActionBePendingComment($id_comment, $page);
    }else if(isset($_POST['approve_button']) && isset($_POST['comment_id'])) {
        $id_comment = $_POST['comment_id'];
        ActionBeApprovedComment($id_comment, $page);
    }else if(isset($_POST['delete_button']) && isset($_POST['comment_id'])) {
        $id_comment = $_POST['comment_id'];
        ActionDeleteComment($id_comment);
    }

?>

<div class="container-fluid">
    <h2 style="margin-top: 2rem;">Spam Comments</h2>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Visitor</th>
                    <th scope="col" style="width: 37rem;">Comment</th>
                    <th scope="col">Name of Article</th>
                    <th scope="col">Comment Status</th>
                    <!-- <th scope="col" style="width: 15rem;">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = ViewSpamComment();
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
                    <td>
                        <?php echo $data[4]?> <br>
                        <form action="" name="approve_comment_form" method="POST">
                            <input type="hidden" name="comment_id" value="<?php echo $comment_id?>">
                            <input type="submit" name="approve_button" class="btn btn-success" value="Approve" style="margin-right: 0.5rem;">
                            <input type="submit" name="unapprove_button" class="btn btn-warning" value="Unapprove" style="margin-right: 0.5rem;">
                            <input type="submit" name="delete_button" class="btn btn-danger" value="Delete">
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