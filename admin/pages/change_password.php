<?php
include ('../../config/config.inc.php');

// Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}

if ($_REQUEST['Submit'] == 'Submit') {

    $insertvalue = array(
        'password' => md5($_REQUEST['password']),
    );
    if ($_REQUEST['password'] === $_REQUEST['con_password']) {
        if ((isset($_SESSION['BY']) && ($_SESSION['TYPE'] != '')))
            $message = updateRecords('admin', $insertvalue, 'tbid', $_SESSION['BY'], '0');
            $showRequest = [];
    }else {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>Password does not match !<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        $showRequest = $_REQUEST;
    }
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin | Change Password</title>
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

            <!-- Header Start -->
            <?php include_once '../require/header.php'; ?>
            <!-- Header End -->

            <!-- Left Sidebar Start -->
            <?php include_once '../require/sidebar.php'; ?>
            <!-- Left Sidebar End -->
            
            <!-- Start main Content -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <div class="page-title-left">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item font-size-18">Change Password</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form class="custom-validation" action="#" enctype="multipart/form-data" autocomplete="off" method="POST">
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Old Password<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="password" required class="form-control" placeholder="Old Password" name="old_password" id="old_password">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">New Password<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="password" required class="form-control" placeholder="New Password" name="password" id="password">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Confirm Password<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="password" required class="form-control" placeholder="Confirm Password" name="con_password" id="con_password">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 float-end">
                                                <button type="submit" name="Submit" value="Submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                <button type="reset" class="btn btn-secondary waves-effect"><a href="<?php echo AdminUrl ?>" style="color: #fff;">Cancel</a></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End main content -->

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
