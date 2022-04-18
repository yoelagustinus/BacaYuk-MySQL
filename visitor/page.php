<link rel="stylesheet" href="style.css" media="screen">
<html>
    <body>
        <!-- Tampilan -->
        <div class="tampilan">

            <!-- navbar -->
            <?php 
                include 'headerVisitor.php';

                include 'ControllerVisitor.php';
                

                require '../config.php';
                
                $category_name = $_GET['CategoryName'];
                
                $content = $db->post->find([
                    'category' => $category_name
                ]);
                
                
            ?>

            <!-- konten -->
            <div class="container p-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <center>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner mb-4">
                            <div class="carousel-item active">
                                <img src="../images_thumb/slider-home.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../images_thumb/slider-kesehatan.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../images_thumb/slider-pengetahuan.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </center>    
                </div>
                <center>
                    <h1 class="text-capitalize"><?php echo $category_name?></h1>
                </center>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                        foreach($content as $post){
                            $id_content = $post->_id;
                    
                    ?>  
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                    <?php
                                        echo "<a href='Content.php?ContentId=$id_content&' class='text-decoration-none'>$post->title</a>"; 
                                    ?>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->category ?></h6>
                                    <p>
                                    <?php 
										echo cutString($post->konten);
									?>
                                    </p>
									<a href=<?php echo "Content.php?ContentId=$id_content&"?> class='btn btn-primary' style='margin-top: auto'> Baca selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

