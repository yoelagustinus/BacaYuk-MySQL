<?php
    require 'header.php';
    require '../config.php';
    
    require 'ControllerAdmin.php';
    
    

    if(isset($_GET['UserId'])){
        $user = $db->users->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_GET['UserId'])
        ]);
    }

    if(isset($_POST['update'])){

        $data = [
            '$set' => [
                'type' => $_POST['type'],      
            ]
        ];

        $db->users->updateOne([
            '_id' => new MongoDB\BSON\ObjectID($_GET['UserId'])
        ], $data);

        $_SESSION['success'] = "User '$user->name' berhasil diupdate";
        header("Location: ViewUser.php");
    }
    

?>


<div class="container">
    <br>
    <p class="fs-4">Edit <?php echo $user->name ?></p>
    <form method="POST">
        <table class="table" action="" enctype="multipart/form-data">
            <thead>
                <tr>
                    <th scope="col">Coloumn</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td>
                        <div class="form-floating">
                            <?php echo $user->name ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    
                    <th scope="row">Email</th>
                    <td>
                        <div class="form-floating">
                            <?php echo $user->email ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Role</th>
                    <td>
                        <div class="form-check">
                            
                            <input class="form-check-input"  id="flexRadioDefault1" type="radio" name="type" <?php if (isset($type) && $type=="visitor") echo "checked";?>value="visitor" required
                                <?php
                                    if($user->type == "visitor"){
                                        echo "checked";
                                    }
                                ?>
                            >
                            <label class="form-check-label" for="flexRadioDefault1">
                                Visitor
                            </label>
                        </div>

                        <div class="form-check">
                            
                            <input class="form-check-input"  id="flexRadioDefault2" type="radio" name="type" <?php if (isset($type) && $type=="admin") echo "checked";?>value="admin"
                                <?php
                                    if($user->type == "admin"){
                                        echo "checked";
                                    }
                                ?>
                            >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Admin
                            </label>
                        </div>
                        
                        
                    </td>
                </tr>

            </tbody>
        </table>


        <button id="update" name="update" class="btn btn-success">Update</button>

    </form>

    <br><br>
</div>
