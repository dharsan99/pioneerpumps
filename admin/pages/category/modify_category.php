<?php 
include_once ('../../../config/config.inc.php'); 

//Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}

if ($_REQUEST['Submit'] == 'Submit') {
    $insertvalue = array(
        'category_name' => $_REQUEST['category_name'],
        'status' => $_REQUEST['status'],
        'created_type' => $_SESSION['TYPE'],
    );
    if (testRepeat('category', 'category_name', $_REQUEST['category_name'], 'tbid', $_REQUEST['htid'])) {
        if(($_FILES["image"]["name"] != '')){
            if (isset($_FILES["image"]["name"])) {
                $target_dir = "../../../images/category/";
                $filename = str_replace(' ', '-', basename($_FILES["image"]["name"]));
                $randnum = rand(1111,9999);
                $target_file = $target_dir . $randnum . $filename;
                $AllowImageType = array('jpg','png','jpeg','gif');
                $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                // Allow certain file format

                if (in_array($imageFileType, $AllowImageType)) {
                    if (!file_exists($target_file)) {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $insertvalue['image'] = $randnum . $filename;
                        } else {
                            echo 'Your image is not upload .';
                        }
                    } else {
                        $error = 0;
                    }
                }
            }

            if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
                $message = updateRecords('category', $insertvalue, 'tbid', $_REQUEST['htid'], '0');
                header("location:" . AdminUrl . 'category/list_category.htm');
                exit;
            }
        }
        else {
            if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
                $message = updateRecords('category', $insertvalue, 'tbid', $_REQUEST['htid'], '0');
                header("location:" . AdminUrl . 'category/list_category.htm');
                exit;
            }
            else {
                $message = insertRecords('category', $insertvalue, '0');
                header("location:" . AdminUrl . 'category/list_category.htm');
                exit;
            }
        }
    }else {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>"' . $_REQUEST['category_name'] . '" Category already exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
    $UpdateRec = getRecords('category', 'tbid', $_REQUEST['htid']);
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin | Modify Category</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- Head Start -->
        <?php include_once '../../require/head.php'; ?> 
        <!-- Head End --> 
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- Header Start -->
            <?php include_once '../../require/header.php'; ?>
            <!-- Header End -->

            <!-- Left Sidebar Start -->
            <?php include_once '../../require/sidebar.php'; ?>
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
                                            <li class="breadcrumb-item font-size-18">Category</li>
                                            <li class="breadcrumb-item active font-size-18">/ Modify Category</li>
                                        </ol>
                                    </div>

                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                            <a href="<?php echo AdminUrl . 'category/list_category.htm'; ?>" style="color: #fff;"><i class="bx bx-list-ul font-size-16 align-middle me-2"></i> List Category</a>
                                        </button>
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
                                                    <label class="form-label">Category Title<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="text" name="category_name" class="form-control" placeholder="Enter Category Title" required id="category_name" onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ')" value="<?php echo ($showRequest['category_name'] == '') ? $UpdateRec['category_name'] : $showRequest['category_name']; ?>">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Image<span class="messages" style="color: red;"> * Size(Height: 150px, Width:150px)</span></label>
                                                    <input type="file" class="form-control image" name="image" id="formFile">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <div id="preview"></div>
                                                </div>
                                                <?php if($UpdateRec['image'] != '') { ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/category/" . $UpdateRec['image']; ?>"
                                                                data-lightbox="1" data-title="Store Logo">
                                                                <img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . "images/category/" . $UpdateRec['image']; ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Status<span class="messages" style="color: red;"> *</span></label>
                                                    <select name="status" class="form-control select2" required>
                                                        <?php $status = ($showRequest['status'] == '') ? $UpdateRec['status'] : $showRequest['status']; ?>
                                                        <!-- <option value="" disabled="disabled" selected="true">Select</option> -->
                                                        <option value="1" <?php echo ( $status == '1') ? 'selected' : ''; ?> >Active</option>
                                                        <option value="0" <?php echo ( $status == '0') ? 'selected' : ''; ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 float-end">
                                                <button type="submit" name="Submit" value="Submit" class="btn btn-primary waves-effect waves-light"><?php echo ($_REQUEST['htid'] == '') ? 'Submit' : 'Update'; ?></button>
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect"><a href="<?php echo AdminUrl . 'category/list_category.htm'; ?>" style="color: #fff;">Cancel</a></button>
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
                <?php include_once '../../require/foot.php'; ?> 
                <!-- Foot end -->
            </div>
            <!-- End main content-->
        </div>
        <!-- END layout-wrapper -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="<?php echo SiteUrl ?>assets/libs/jquery/jquery.min.js"></script>
        <script>
        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function (event) {
                    $('#preview').php('<img src="'+event.target.result+'" width="150" height="auto"/>');
                };
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }
        $(document).ready(function() {
            $(".image").change(function () {
                // var product_image = $(this).val();
                // console.log(product_image);
                imagePreview(this);
            });
        });
        </script>

        <!-- Footer start -->
        <?php include_once '../../require/footer.php'; ?> 
        <!-- Footer end -->

    </body>
</html>