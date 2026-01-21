<?php 
include 'require/header-products.php';
include_once ('../config/config.inc.php');
$subcategory_id = $_GET['id'];
?> 
<section class="page-header" style="background-image: url(assets/images/backgrounds/page-header-contact.jpg);">
            <div class="container">
               <?php
                        $SubcategoryRec = getAllRecords('subcategory','WHERE `tbid`=?', array($_REQUEST['id'])); if (is_object($SubcategoryRec) && method_exists($SubcategoryRec, 'fetch')) { while ($SubcategoryDetails = $SubcategoryRec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <h2><?php echo $SubcategoryDetails['subcategory_name']; ?></h2>
                   
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="" class="shop_style">Products</a></li>
                    <li><span><?php echo $SubcategoryDetails['subcategory_name']; ?></span></li>
                    <?php } } ?>
                </ul>
            </div>
        </section>

        <section class="product">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="sidebar-wrapper style2">
                            <!--Start single sidebar-->
                         
                            <!--End single sidebar-->
                            <!--Start sidebar categories Box-->
                          
                            <!--End sidebar categories Box-->
                            <!--Start sidebar categories Box-->
                
                            <!--End sidebar categories Box-->
                            <!--Start single sidebar-->
                         
                            <!--End single sidebar-->

                        </div>
                    </div>
                    <!--End Sidebar Wrapper-->
                    <div class="col-xl-12 col-lg-12">
                        <div class="product-items">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="showing-result-shorting">
                                  
                                    </div>
                                </div>
                            </div>
                             <div class="all_products">
                                   <div class="row">
                                        <?php
                                            $ProductRec = getAllRecords('product','WHERE `subcategory_id`=?', array($subcategory_id)); if ($ProductRec && is_object($ProductRec) && method_exists($ProductRec, 'fetch')) { while ($ProductDetails = $ProductRec->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="all_products_single text-center">
                                                <div class="all_product_item_image">
                                                    <img src="https://dharsan.in/dhya_clients/pioneerpumps/PioneerPumps_latest/images/product/banner_image/<?php echo $ProductDetails['banner_image']; ?>"
                                                    alt="">
                                                    <div class="all_product_hover">
                                                        <div class="all_product_icon">
                                                            <a href="product-detail.php?id=<?php echo $ProductDetails['tbid']?>"><span class="icon-shopping-cart"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4>
                                                    <a href="product-detail.php?id=<?php echo $ProductDetails['tbid']?>" style="font-size: 18px;"><?php echo $ProductDetails['product_name']; ?></a>
                                                   
                                                </h4>
                                                  
                                            </div>
                                        </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
include 'require/footer.php'
?>