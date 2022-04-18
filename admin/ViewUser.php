<?php
    require 'header.php';
    require '../config.php';
    require 'ControllerAdmin.php';

    if (isset($_SESSION['success'])) {
        
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            '.$_SESSION['success'].'
            </div>
        </div>';
        unset($_SESSION["success"]);
    }

    if(isset($_POST['delete'])){
        $id = $_POST['user_id'];
        
        $delete_user = $db->users->deleteOne([
            '_id' => new MongoDB\BSON\ObjectID($id)
        ]);
    
        $_SESSION['success'] = "User telah Berhasil dihapus";
        header("Location: ViewUser.php");
    }

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<br>
<div class="container">
    
    <table class="table table-striped">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
    <tbody>
        <?php
            
            $users = $db->users->find();
            foreach($users as $user){
                $user_id = $user->_id;
                
        ?>
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->type ?></td>
                    <td>
                        <?php echo "<a href='EditUser.php?UserId=$user_id&'><button type='button' class='btn btn-primary'>Edit</button></a>"; ?>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $user_id; ?>" class="form-control" name="user_id" id="user_id">
                                
                            </div>
                            <button type="submit" name="delete" id="delete" class="btn btn-danger">Hapus</button>
                        </form>                        
                    </td>
                </tr>
        <?php
            

            }
        ?>
        
    </tbody>
    </table>
</div>



</body>

