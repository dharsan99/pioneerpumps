<?php 
include 'require/header.php';
include_once ('../config/config.inc.php');

$products_id = $_GET['id'];

?> 
 <section class="page-header" style="background-image: url(assets/images/backgrounds/page-header-contact.jpg);">
            <div class="container">
                  <?php
                        $NewsRec = getAllRecords('news_events','WHERE `tbid`=?', array($products_id)); if ($NewsRec && is_object($NewsRec) && method_exists($NewsRec, 'fetch')) { while ($ProductDetails = $NewsRec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <h2><?php echo $ProductDetails['title']; ?></h2>
              
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="" class="shop_style">News & Events</a></li>
                       <li><span><?php echo $ProductDetails['name']; ?></span></li>
                    <?php } } ?>
                </ul>
            </div>
        </section>
               <?php
                $NewsRec = getAllRecords('news_events','WHERE `tbid`=?', array($products_id)); if ($NewsRec && is_object($NewsRec) && method_exists($NewsRec, 'fetch')) { while ($ProductDetails = $NewsRec->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <section class="product_detail">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="banner-carousel owl-theme owl-carousel">
                                <?php 
                                    global $db;
                                    $sql = "SELECT * FROM news_events WHERE tbid=?";
                                    $checkvaliduser = $db->prepare($sql);
                                    $checkvaliduser->execute(array($products_id));
       
                                    foreach ($checkvaliduser as $key => $row)  {
                                        // $row['Image_url'] = trim($row['Image_url'],'\,');
                                        $temp = explode(',',$row['slider_image'] );
                                        // print_r($temp);
                                        $temp = array_filter($temp);

                                        foreach($temp as $image){
                                            $images[] = trim(str_replace(['[',']'], "", $image));
                                ?>
                                <!-- Slide Item -->
                                <div class="slide-item">
                                    <img src="<?php echo SiteUrl. 'images/news_events/slider_image/'. $image; ?>" alt="">
                                </div>
                                <?php 
                                        } // end inner foreach ($temp as $image)
                                    } // end outer foreach ($checkvaliduser as $row)
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="product_detail_content">
                                <h2><?php echo $ProductDetails['title']; ?></h2>
                                <hr>
                                <!-- <div class="product_detail_review_box">
                                    <div class="product_detail_price_box">
                                        <p>$9.98</p>
                                    </div>
                                    <div class="product_detail_review">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#" class="deactive"><i class="fa fa-star"></i></a>
                                        <span>2 Customer Reviews</span>
                                    </div>
                                </div> -->
                                <div class="product_detail_text">
                                    <p><?php echo $ProductDetails['description']; ?></p>
                                </div>
                                <ul class="list-unstyled product_detail_address">
                                <!--     <li>REF. 4231/406</li>
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
                    </div>
                    <div class="row">
                      
                    </div>
                </div>
            </section>
            <?php } } ?>

       



        <?php
include 'require/footer.php'
?>