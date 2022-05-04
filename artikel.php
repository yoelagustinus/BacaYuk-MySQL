<?php
    include 'controller/VisitorController.php';
    $page="artikel_page";
    include 'header.php'
?>


        <!-- <div class="banner-artikel">   

        </div> -->
        
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <picture>
                        <source srcset="images/tipo_ODB.jpeg" media="(max-width: 600px)">
                        <img src="images/banner_utama.jpg" alt="banner" class="img-fluid" style="width: 100%;">
                    </picture>
                </div>
            </div>
        </div>
            
        <div class="konten-artikel">
            
            <div class="container" style="width: 80%">
                <p class="h1 text-center">Lorem ipsum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at turpis elementum, dignissim erat ut, blandit tellus. Nullam mollis nunc at metus tincidunt ullamcorper. Donec vel nibh metus. Aliquam a ullamcorper eros. Etiam urna ipsum, finibus in arcu vel, mattis eleifend purus. Ut tempor purus ac lacus mollis tincidunt. Ut rutrum, sem at eleifend maximus, ligula urna pulvinar lorem, ut lacinia neque erat sed felis. Praesent varius ante vel libero ultricies, non tempor massa ornare. Fusce euismod dui dignissim, dictum lectus a, lobortis nisl. Aliquam quis posuere erat. Sed quis orci posuere, aliquet nibh vel, tempor ligula. Phasellus convallis sed ligula pellentesque semper.
                </p>
                <p>
                Aliquam suscipit porttitor fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec risus sit amet massa aliquet molestie. Quisque euismod, sapien non egestas ultrices, odio massa congue ligula, quis porta nisi ipsum vel quam. Nunc ornare eleifend risus ac convallis. Duis placerat quis turpis vel pharetra. Nulla lorem massa, interdum non lectus sit amet, convallis dictum lacus. Vivamus molestie bibendum leo, nec semper metus luctus in. Sed semper nulla pharetra, iaculis magna vitae, maximus diam. Cras eu malesuada enim. In finibus accumsan tellus, vel tincidunt turpis porta et. Praesent gravida vitae est ac mollis.
                </p>

                <div class="img-middle">
                    
                </div>

                <p>
                    Donec hendrerit pharetra lectus at faucibus. Phasellus sit amet feugiat magna. Phasellus dapibus rutrum metus, vel placerat est rhoncus eu. Nullam ac venenatis sem, finibus aliquet metus. Pellentesque condimentum interdum mi quis sagittis. Pellentesque sodales nisi eu leo pharetra bibendum. Praesent nec posuere nunc, a pretium nunc.
                </p>

                <p>
                    Integer lobortis imperdiet lacus, eu tempus sem varius eu. In aliquet vitae sapien ut porta. Aliquam eget nisl commodo, ullamcorper magna vitae, fringilla lorem. Nunc eget dolor efficitur, auctor erat a, pulvinar leo. Duis semper consectetur lacinia. Vivamus non eros sodales tortor iaculis faucibus. Nam eget nunc hendrerit, accumsan ligula vel, ornare tellus. 
                </p>

                <p>
                    Proin ultrices felis a sapien tempor, eget aliquet libero accumsan. Maecenas est est, malesuada vitae venenatis vel, placerat in nulla. Nulla imperdiet efficitur porttitor. Nulla non viverra arcu. Duis sed enim sapien. Integer semper nisi eget metus egestas ullamcorper. Cras metus arcu, aliquam id auctor at, gravida nec nisi. Maecenas odio dolor, facilisis quis urna ultrices, iaculis interdum est. Etiam cursus mi vitae ligula finibus vehicula. Nam vitae aliquam nulla.
                </p>
            </div>
        </div>
        

        <div class="section-komentar">
            <div class="radius-komentar" id="form">
                <h3>Comment</h3>
            </div>
            <form action="<?=$_SERVER['PHP_SELF']?>#form" method="POST" accept-charset="UTF-8">
                <div class="form-komentar">
                    
                    <div class="form-floating mb3" style="margin: 0 0 1rem 0">
                        <input type="text" name="nama_pengirim" class="form-control" id="floatingInputNama" placeholder="Your Name" style="border-radius: 15px;" required>
                        <label for="floatingInputNama">Nama Kamu</label>
                    </div>
                
                    <div class="form-floating mb-3">
                        <input type="email" name="email_pengirim" class="form-control" id="floatingInput" placeholder="name@example.com" style="border-radius: 15px;" required>
                        <label for="floatingInput">Email Kamu</label>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" name="komentar_pengirim" placeholder="Leave a comment here" id="floatingTextarea" style="height: 200px; border-radius: 25px; margin: 0 0 1rem 0;" required></textarea>
                        <label for="floatingTextarea2">Tulis Komentar Kamu Disini...</label>
                    </div>
                    <input type="submit" name="submit" value="Send" class="btn btn-lg" style="margin: auto; display: block; background-color: #994650; width: 10rem; margin-bottom: 1rem; color: white;">
                
                </div>
            </form>
            

            <div class="list-comment">
                <?php
                    $result = ListComment();
                    $i = 0;
                    if(mysqli_num_rows($result)){
                        while($data = mysqli_fetch_array($result)){
                            $comment_id= $data[0];
                ?>
                <hr>
                <div class="row">
                    <div class="col-2" style="">
                        <img class="img-photo" src="https://img.icons8.com/material-rounded/60/000000/user.png"/>
                    </div>
                    <div class="col-10" style="">
                        <b><?php echo $data[2]; ?></b>
                        <br>
                        <?php
                            echo $data[4];
                        ?>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>
                


        </div>

        <div class="section-footer">
            <?php include'footer.php'?>
        </div>

        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type='text/javascript'> 
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>


<?php
    
    if(isset($_POST["submit"])){
        $visitor_name = $_POST['nama_pengirim'];
        $visitor_email = $_POST['email_pengirim'];
        $visitor_komentar = $_POST['komentar_pengirim'];
        $artikel_name = "Artikel 1";

        $output_insert_comment = InsertComment($artikel_name,$visitor_name,$visitor_email,$visitor_komentar);
        unset($_POST["submit"]);
        if(strpos($output_insert_comment,"telah dikirim")){
            echo'<script language="javascript">
                    swal("Komentar Kamu telah dikirim" + "\n" + "Dan, Komentar kamu dalam proses seleksi!");
                    window.close();
                </script>';
        }else{
            echo'<script language="javascript">
                swal("Komentar Kamu tidak terkirim");
                window.close();
            </script>';
        }
        unset($_POST["submit"]);
        
    }
?>