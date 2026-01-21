<?php
include ('../../config/config.inc.php');

// Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}
if ($_REQUEST['Submit'] == 'Submit') {

    $insertvalue = array(
        'user_name' => $_REQUEST['user_name'],
        'address' => $_REQUEST['address'],
    );
    if (isset($_FILES["profile"]["name"])) {
        $target_dir = "../../images/admin/profile/";
        //echo $_FILES["profile"]["name"];
        $filename = str_replace(' ', '-', basename($_FILES["profile"]["name"]));
        $target_file = $target_dir . $filename;
        $AllowImageType = array('jpg', 'jpeg' , 'png');
        $imageFileType = strtolower(pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION));
        // Allow certain file format

        if (in_array($imageFileType, $AllowImageType)) {
            if (!file_exists($target_file)) {
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                    $insertvalue['profile'] = $filename;
                } else {
                    echo 'Your store logo is not upload .';
                }
            } else {
                $error = 0;
            }
        }
    }
    // exit;
    if ((isset($_SESSION['BY']) && ($_SESSION['TYPE'] != ''))) {
        $message = updateRecords('admin', $insertvalue, 'tbid', $_SESSION['BY'], '0');
        $showRequest = [];
    }
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin | Profile</title>
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
                                            <li class="breadcrumb-item font-size-18">Profile</li>
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
                                                    <label class="form-label"> Name<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="text" class="form-control" placeholder="Name" value="<?php echo $AdminDetails['user_name']; ?>" name="user_name">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Email<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="text" readonly class="form-control" placeholder="Email" value="<?php echo $AdminDetails['email_id']; ?>" name="email_id">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Mobile Number<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="number" readonly class="form-control" placeholder="Mobile Number" value="<?php echo $AdminDetails['mobile_number']; ?>" name="mobilenumber">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Address<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control" name="address" placeholder=""><?php echo $AdminDetails['address']; ?></textarea>
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Profile<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="file" class="form-control" name="profile" id="formFile">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . 'images/admin/profile/' . $AdminDetails['profile']; ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 float-end">
                                                <button type="submit" name="Submit" value="Submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                </button>
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