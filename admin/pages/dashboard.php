<?php
include ('../../config/config.inc.php');
//Checking login
$_SESSION['TYPE'] = '1';
if (($_SESSION['BY'] == '') && ($_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- Head Start -->
        <?php include_once '../require/head.php'; ?> 
        <!-- Head End -->
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- Head Start -->
            <?php include_once '../require/header.php'; ?>
            <!-- Head End -->

            <!-- Left Sidebar Start -->
            <?php include_once '../require/sidebar.php'; ?>
            <!-- Left Sidebar End -->
            
            <!-- Start right Content -->
            <div class="main-content">
                <!-- Start Page-content -->
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Category</p>
                                                <?php 
                                                    $sql = "SELECT * FROM `category` WHERE `status` =?"; 
                                                    $result = $db->prepare($sql);
                                                    $result->execute(array('1')); 
                                                    $category = $result->rowCount();
                                                ?>
                                                <h5 class="mb-0"><a href="<?php echo AdminUrl ?>category/list_category.htm" class="text-muted fw-medium">Launch Page <i class="bx bx-right-arrow-circle font-size-18"></i></a></h5>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <?php echo $category ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">SubCategory</p>
                                                <?php 
                                                    $sql = "SELECT * FROM `subcategory` WHERE `status` =?"; 
                                                    $result = $db->prepare($sql);
                                                    $result->execute(array('1')); 
                                                    $subcategory = $result->rowCount();
                                                ?>
                                                <h5 class="mb-0"><a href="<?php echo AdminUrl ?>subcategory/list_subcategory.htm" class="text-muted fw-medium">Launch Page <i class="bx bx-right-arrow-circle font-size-18"></i></a></h5>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <?php echo $subcategory ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Product</p>
                                                <?php 
                                                    $sql = "SELECT * FROM `product` WHERE `status` =?"; 
                                                    $result = $db->prepare($sql);
                                                    $result->execute(array('1')); 
                                                    $product = $result->rowCount();
                                                ?>
                                                <h5 class="mb-0"><a href="<?php echo AdminUrl ?>product/list_product.htm" class="text-muted fw-medium">Launch Page <i class="bx bx-right-arrow-circle font-size-18"></i></a></h5>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <?php echo $product ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Performance Chart</p>
                                                <?php 
                                                    $sql = "SELECT * FROM `performance_chart` WHERE `status` =?"; 
                                                    $result = $db->prepare($sql);
                                                    $result->execute(array('1')); 
                                                    $performance_chart = $result->rowCount();
                                                ?>
                                                <h5 class="mb-0"><a href="<?php echo AdminUrl ?>product/list_performance_chart.htm" class="text-muted fw-medium">Launch Page <i class="bx bx-right-arrow-circle font-size-18"></i></a></h5>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <?php echo $performance_chart ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">News & Events</p>
                                                <?php 
                                                    $sql = "SELECT * FROM `news_events` WHERE `status` =?"; 
                                                    $result = $db->prepare($sql);
                                                    $result->execute(array('1')); 
                                                    $news_events = $result->rowCount();
                                                ?>
                                                <h5 class="mb-0"><a href="<?php echo AdminUrl ?>news_events/list_news_events.htm" class="text-muted fw-medium">Launch Page <i class="bx bx-right-arrow-circle font-size-18"></i></a></h5>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <?php echo $news_events ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Contact Form</p>
                                                <?php 
                                                    $sql = "SELECT * FROM `contact_form` WHERE `status` =?"; 
                                                    $result = $db->prepare($sql);
                                                    $result->execute(array('1')); 
                                                    $contact_form = $result->rowCount();
                                                ?>
                                                <h5 class="mb-0"><a href="<?php echo AdminUrl ?>contact_form/list_contact_form.htm" class="text-muted fw-medium">Launch Page <i class="bx bx-right-arrow-circle font-size-18"></i></a></h5>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <?php echo $contact_form ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page-content -->

                <!-- Foot start -->
                <?php include_once '../require/foot.php'; ?> 
                <!-- Foot end -->
            </div>
            <!-- End main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Footer start -->
        <?php include_once '../require/footer.php'; ?> 
        <!-- Footer end -->
    </body>
</html>