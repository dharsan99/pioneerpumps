     <?php 
include 'require/header-products.php';
include_once ('../config/config.inc.php');

$products_id = $_GET['id'];
?> 

       <section class="page-header" style="background-image: url(assets/images/backgrounds/page-header-contact.jpg);">
            <div class="container">
                  <?php
                        $ProductRec = getAllRecords('product','WHERE `tbid`=?', array($products_id)); if ($ProductRec && is_object($ProductRec) && method_exists($ProductRec, 'fetch')) { while ($ProductDetails = $ProductRec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <h2><?php echo $ProductDetails['product_name']; ?></h2>
              
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="" class="shop_style">Shop</a></li>
                       <li><span><?php echo $ProductDetails['product_name']; ?></span></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
               <?php
                $ProductRec = getAllRecords('product','WHERE `tbid`=?', array($products_id)); if ($ProductRec && is_object($ProductRec) && method_exists($ProductRec, 'fetch')) { while ($ProductDetails = $ProductRec->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <section class="product_detail">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="banner-carousel owl-theme owl-carousel">
                                <?php 
                                    global $db;
                                    $sql = "SELECT * FROM product WHERE tbid=?";
                                    $checkvaliduser = $db->prepare($sql);
                                    $checkvaliduser->execute(array($products_id));
       
                                    foreach ($checkvaliduser as $key => $row)  {
                                        // $row['Image_url'] = trim($row['Image_url'],'\,');
                                        $temp = explode(',',$row['product_image'] );
                                        // print_r($temp);
                                        $temp = array_filter($temp);

                                        foreach($temp as $image){
                                            $images[]=trim( str_replace( array('[',']') ,"" ,$image ) );
                                            // foreach($images as $image){ 
                                ?>
                                <!-- Slide Item -->
                                <div class="slide-item">
                                    <img src="<?php echo SiteUrl. 'images/product/image/'. $image; ?>" alt="">
                                </div>
                                <?php 
                                        }   // close foreach($temp as $image)
                                    } // close foreach checkvaliduser
                                } // close if foreach top
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="product_detail_content">
                                <h3>About our <?php echo $ProductDetails['product_name']; ?></h3>
                                <hr>
                                <div class="product_detail_text">
                                    <p><?php echo $ProductDetails['description']; ?></p>
                                </div>
                                </div>

                                 
                                <div class="product_detail_content">
                                 <h4>Features</h4>
                                <hr>
                                <div class="product_detail_text">
                                    <p><?php echo $ProductDetails['features']; ?></p>
                                </div>
                                </div>
                                 <!-- <ul class="list-unstyled product_detail_address">
                                   <li>REF. 4231/406</li>
                                    <li>Available in store</li>
                                </ul> -->
                              
                                <!-- <ul class="list-unstyled category_tag_list">
                                    <li>Category: Food</li>
                                    <li>Tags: Vegetables, Fruits</li>
                                </ul>
                                <div class="product_detail_share_box">
                                    <div class="share_box_title">
                                        <h2>Share with friends</h2>
                                    </div>
                                    <div class="share_box_social">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-dribbble"></i></a>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                                                 <hr>

                                  <h4>Applications</h4>
                                <hr>
                                                                    <div class="product_detail_text">

                                                <p><?php echo $ProductDetails['application']; ?></p>
                                            </div>
                                              
                                
                                   <hr>

                                  <h4>Technical Specification</h4>
                                <hr>
                                                                    <div class="product_detail_text">

                                                <p><?php echo $ProductDetails['technical_specification']; ?></p>
                                            </div>
                                            
                                                      <h4>Material of Construction</h4>
                                <hr>
                                                                    <div class="product_detail_text">

                                                <p><?php echo $ProductDetails['material_of_construction']; ?></p>
                                            </div>
                                            
                                             <h4>Performance Chart</h4>
                                <hr>
                                                                    <div class="product_detail_text">

                                                <p class="product_detail_text"><?php echo $ProductDetails['performance_chart']; ?></p>
                                            </div>
                                            
                                            
                                              <div class="product-quantity-box">
                                  
                                    <div class="addto-cart-box">
                                        <button class="thm-btn" >Enquire this Product</button>
                                    </div>
                                   
                                </div>
                                
                                
                   <!-- <div class="row">
                        <div class="col-xl-12">
                            <div class="product-tab-box tabs-box">
                                <ul class="tab-btns tab-buttons clearfix list-unstyled">
                                    <li data-tab="#features" class="tab-btn active-btn"><span>Features</span></li>
                                    <li data-tab="#application" class="tab-btn"><span>Applications</span></li>
                                    <li data-tab="#technical" class="tab-btn"><span>Technical Specification</span></li>
                                    <li data-tab="#material" class="tab-btn"><span>Material of Construction</span></li>
                                    <li data-tab="#performance" class="tab-btn"><span>Performance Chart</span></li>
                                </ul>
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="features">
                                        <div class="product-details-content">
                                            <div class="desc-content-box">
                                                <p><?php echo $ProductDetails['features']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab" id="application">
                                        <div class="product-details-content">
                                            <div class="desc-content-box">
                                                <p><?php echo $ProductDetails['application']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab" id="technical">
                                        <p><?php echo $ProductDetails['technical_specification']; ?></p>
                                         <ul class="additionali_nfo list-unstyled">
                                            <li><span>Weight:</span>3kg</li>
                                            <li><span>Category:</span>Food</li>
                                            <li><span>Tags:</span>Vegetables, Fruits</li>
                                        </ul> 
                                    </div>

                                    <div class="tab" id="material">
                                        <div class="reviews-box">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="product_reviews_box">
                                                        <p><?php echo $ProductDetails['material_of_construction']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab" id="performance">
                                        <div class="product-details-content">
                                            <div class="desc-content-box">
                                                <p><?php echo $ProductDetails['performance_chart']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </section>
            <?php } } ?>

            <section class="all_products_two">
                <div class="container">
                    <div class="block-title text-center">
                        <p>Shop items</p>
                        <h3>similar products</h3>
                        <div class="leaf">
                            <img src="<?php echo SiteUrl ?>files/assets/images/resources/leaf.png" alt="">
                        </div>
                    </div>
                    <div class="all_products">
                        <div class="row">
                            <?php
                                $ProductRec = getAllRecords('product','WHERE `tbid`=?', array($products_id)); if ($ProductRec && is_object($ProductRec) && method_exists($ProductRec, 'fetch')) { while ($ProductDetails = $ProductRec->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="all_products_single text-center">
                                    <div class="all_product_item_image">
                                        <a href="product-detail.php?id=<?php echo $ProductDetails['tbid']?>">
                                            <img src="<?php echo SiteUrl. 'images/product/banner_image/'. $ProductDetails['banner_image']; ?>" alt="">
                                        </a>
                                        <!-- <div class="all_product_hover">
                                            <div class="all_product_icon">
                                                <a href="#"><span class="icon-shopping-cart"></span></a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <h5><a href="product-detail.php?id=<?php echo $ProductDetails['tbid']?>"><?php echo $ProductDetails['product_name']; ?></a></h5>
                                    <!-- <p>$5.98</p> -->
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </section>


            <?php
include 'require/footer.php'
?>