<?php
include 'require/header-products.php';
include_once ('../config/config.inc.php');
$category_id = $_GET['id'];
?>
<section class="page-header" style="background-image: url(assets/images/backgrounds/page-header-contact.jpg);">
            <div class="container">
                <?php
                        $CategoryRec = getAllRecords('category','WHERE `tbid`=?', array($_REQUEST['id'])); if (is_object($CategoryRec) && method_exists($CategoryRec, 'fetch')) { while ($CategoryDetails = $CategoryRec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                <h2><?php echo $CategoryDetails['category_name']; ?></h2>
                    
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="" class="shop_style">Products</a></li>
                    <li><span><?php echo $CategoryDetails['category_name']; ?></span></li>
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
                            <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.3s"
                                data-wow-duration="1200ms">
                                <div class="categories-box">
                                    <div class="title">
                                        <h3>Categories</h3>
                                    </div>
                                         <ul class="categories clearfix">
                                            <?php
                                                $CategoryRec = getAllRecords('category','ORDER BY `tbid` DESC'); if (is_object($CategoryRec) && method_exists($CategoryRec, 'fetch')) { while ($CategoryDetails = $CategoryRec->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <li><a href="products.php?id=<?php echo $CategoryDetails['tbid']?>"><?php echo $CategoryDetails['category_name']; ?></a></li>
                                            <?php } } ?>
                                        </ul>
                                </div>
                            </div>
                            <!--End sidebar categories Box-->
                            <!--Start single sidebar-->
                         
                            <!--End single sidebar-->

                        </div>
                    </div>
                    <!--End Sidebar Wrapper-->
                    <div class="col-xl-9 col-lg-9">
                        <div class="product-items">
                            <div class="row">
                                <div class="col-xl-12">
                               
                                </div>
                            </div>
                             <div class="all_products">
                                    <div class="row">
                                        <?php
                                            $SubcategoryRec = getAllRecords('subcategory','WHERE `category_id`=?', array($category_id)); if ($SubcategoryRec && is_object($SubcategoryRec) && method_exists($SubcategoryRec, 'fetch')) { while ($SubcategoryDetails = $SubcategoryRec->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="all_products_single text-center">
                                                <div class="all_product_item_image">
                                                   <a href="product-list.php?id=<?php echo $SubcategoryDetails['tbid']?>"> <img src="https://dharsan.in/dhya_clients/pioneerpumps/PioneerPumps_latest/images/subcategory/<?php echo $SubcategoryDetails['image']; ?>" alt=""></a>
                                                    <!-- <div class="all_product_hover">
                                                        <div class="all_product_icon">
                                                            <a href="product.php?id=<?php echo $SubcategoryDetails['tbid']?>"></a>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <h4>
                                                    <a href="product-list.php?id=<?php echo $SubcategoryDetails['tbid']?>" style="font-size: 18px;"><?php echo $SubcategoryDetails['subcategory_name']; ?>
                                                    </a>
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