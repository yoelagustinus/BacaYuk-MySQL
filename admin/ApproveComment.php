<?php
    $page2='edit_comment';
    $page='approve_comment';
    require 'header.php';
    include '../controller/AdminController.php';

    if(isset($_POST['unapprove_button']) && isset($_POST['comment_id'])) {
        $id_comment = $_POST['comment_id'];
        ActionBePendingComment($id_comment, $page);
    }else if(isset($_POST['spam_button']) && isset($_POST['comment_id'])) {
        $id_comment = $_POST['comment_id'];
        ActionSpamComment($id_comment,$page);
    }

?>

<div class="container">
    <h2 style="margin-top: 5rem;">Approved Comments</h2>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Visitor</th>
                    <th scope="col" style="width: 37rem;">Comment</th>
                    <th scope="col">Name of Article</th>
                    <th scope="col">Comment Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = ViewApprovedComment();
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
                            <input type="submit" name="unapprove_button" class="btn btn-warning" value="Unapprove" style="margin-right: 0.5rem;">
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