   <?php
include 'require/header-gallery.php';
?>


        <section class="gallery_two">
            <div class="container">
                <div class="row masonary-layout">
                     <?php
                                            $SubcategoryRec = getAllRecords('gallery','ORDER BY `tbid` DESC'); if ($SubcategoryRec && is_object($SubcategoryRec) && method_exists($SubcategoryRec, 'fetch')) { while ($SubcategoryDetails = $SubcategoryRec->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 masonary-item">
                        <div class="gallery_two_single">
                            <div class="gallery_two_image">
                                <img src="https://dharsan.in/dhya_clients/pioneerpumps/PioneerPumps_latest/images/gallery/<?php echo $SubcategoryDetails['banner_image']; ?>" alt=""><p><?php echo $SubcategoryDetails['title']; ?></p>
                                
                                <div class="gallery_two_hover_box">
                                    <div class="gallery_two_icon">
                                        <a class="img-popup" href="https://dharsan.in/dhya_clients/pioneerpumps/PioneerPumps_latest/images/gallery/<?php echo $SubcategoryDetails['banner_image']; ?>"><span
                                                class="icon-plus-symbol"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
          
                
            </div>
        </section>
        
        <?php
include 'require/footer.php'
?>