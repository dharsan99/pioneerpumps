<?php 
include_once ('../../../config/config.inc.php'); 

//Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}

if ($_REQUEST['Submit'] == 'Submit') {

    $insertvalue = array(
        'category_id' => $_REQUEST['category_id'],
        'subcategory_id' => $_REQUEST['subcategory_id'],
        'product_name' => $_REQUEST['product_name'],
        'description' => $_REQUEST['description'],
        'application' => $_REQUEST['application'],
        'features' => $_REQUEST['features'],
        'technical_specification' => $_REQUEST['technical_specification'],
        'material_of_construction' => $_REQUEST['material_of_construction'],
        'performance_chart' => $_REQUEST['performance_chart'],
        'status' => $_REQUEST['status'],
        'created_type' => $_SESSION['TYPE'],
    );
    
    if (testRepeat('product', 'product_name', $_REQUEST['product_name'], 'tbid', $_REQUEST['htid'])) {
        if(($_FILES["product_image"]["name"] != '') || ($_FILES["banner_image"]["name"] != '') || ($_FILES["brochure"]["name"] != '')){
            if(!empty($_FILES["product_image"]["name"])){
                foreach($_FILES['product_image']['name'] as $key=>$val){
                    $targetDir = "../../../images/product/image/"; 
                    $allowTypes = array('jpg','png','jpeg','gif');  
                    // File upload path 
                    $fileName = basename($_FILES['product_image']['name'][$key]);
                    $randnum = rand(1111,9999);
                    $targetFilePath = $targetDir . $randnum . $fileName; 

                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){ 
                        // Upload file to server 
                        if(move_uploaded_file($_FILES["product_image"]["tmp_name"][$key], $targetFilePath)){ 
                            // Image db insert sql 
                            $insertvalue['product_image'] .= $randnum . $fileName.","; 
                        }else{ 
                            $errorUpload .= $_FILES['product_image']['name'][$key].' | '; 
                        }
                    }else{ 
                        $errorUploadType .= $_FILES['product_image']['name'][$key].' | '; 
                    } 
                }
            }

            if (isset($_FILES["banner_image"]["name"])) {
                $target_dir = "../../../images/product/banner_image/";
                $filename = str_replace(' ', '-', basename($_FILES["banner_image"]["name"]));
                $randnum = rand(1111,9999);
                $target_file = $target_dir . $randnum . $filename;
                $AllowImageType = array('jpg','png','jpeg','gif');
                $imageFileType = strtolower(pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION));
                // Allow certain file format

                if (in_array($imageFileType, $AllowImageType)) {
                    if (!file_exists($target_file)) {
                        if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file)) {
                            $insertvalue['banner_image'] = $randnum . $filename;
                        } else {
                            echo 'Your product image is not upload .';
                        }
                    } else {
                        $error = 0;
                    }
                }
            }

            if (isset($_FILES["brochure"]["name"])) {
                $target_dir = "../../../images/product/brochure/";
                //echo $_FILES["store_logo"]["name"];
                $filename = str_replace(' ', '-', basename($_FILES["brochure"]["name"]));
                $target_file = $target_dir . $filename;
                $AllowImageType = array('pdf');
                $imageFileType = strtolower(pathinfo($_FILES["brochure"]["name"], PATHINFO_EXTENSION));
                // Allow certain file format

                if (in_array($imageFileType, $AllowImageType)) {
                    if (!file_exists($target_file)) {
                        if (move_uploaded_file($_FILES["brochure"]["tmp_name"], $target_file)) {
                            $insertvalue['brochure'] = $filename;
                        } else {
                            echo 'Your brochure is not upload .';
                        }
                    } else {
                        $error = 0;
                    }
                }
            }

            if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
                $message = updateRecords('product', $insertvalue, 'tbid', $_REQUEST['htid'], '0');
                header("location:" . AdminUrl . 'product/list_product.htm');
                exit;
            }
        }
        else {
            if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
                $message = updateRecords('product', $insertvalue, 'tbid', $_REQUEST['htid'], '0');
                header("location:" . AdminUrl . 'product/list_product.htm');
                exit;
            }
            else {
                $message = insertRecords('product', $insertvalue, '0');
                header("location:" . AdminUrl . 'product/list_product.htm');
                exit;
            }
        }
    }else {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>"' . $_REQUEST['product_name'] . '" Product name already exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
    $UpdateRec = getRecords('product', 'tbid', $_REQUEST['htid']);
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin | Modify Product</title>
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
                                            <li class="breadcrumb-item font-size-18">Product</li>
                                            <li class="breadcrumb-item active font-size-18">/ Modify Product</li>
                                        </ol>
                                    </div>

                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                            <a href="<?php echo AdminUrl . 'product/list_product.htm'; ?>" style="color: #fff;"><i class="bx bx-list-ul font-size-16 align-middle me-2"></i> List Product</a>
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
                                                    <label class="form-label">Category<span class="messages" style="color: red;"> *</span></label>
                                                    <select name="category_id" id="category_id" class="form-control select2" required>
                                                        <option value="" disabled="disabled" selected="true">Select</option>
                                                        <?php
                                                        $category_id = ($showRequest['category_id'] == '') ? $UpdateRec['category_id'] : $showRequest['category_id'];
                                                        echo optionBoxs('category', 'tbid', 'category_name', '', $category_id);
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Subcategory<span class="messages" style="color: red;"> *</span></label>
                                                    <select name="subcategory_id" id="subcategory_id" class="form-control select2" required>
                                                        <option value="" disabled="disabled" selected="true">Select</option>
                                                        <?php
                                                        $subcategory_id = ($showRequest['subcategory_id'] == '') ? $UpdateRec['subcategory_id'] : $showRequest['subcategory_id'];
                                                        echo optionBoxs('subcategory', 'tbid', 'subcategory_name', '', $subcategory_id);
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Product Name<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" required id="product_name" onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()+ ')" value="<?php echo ($showRequest['product_name'] == '') ? $UpdateRec['product_name'] : $showRequest['product_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Description<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control ckeditor" rows="5" name="description" placeholder="" required onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/.:-?1,''"" ')"><?php echo ($showRequest['description'] == '') ? $UpdateRec['description'] : $showRequest['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Applications<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control ckeditor" rows="5" name="application" placeholder="" required onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/.:-?1,''"" ')"><?php echo ($showRequest['application'] == '') ? $UpdateRec['application'] : $showRequest['application']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Features<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control ckeditor" rows="5" name="features" placeholder="" required onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/.:-?1,''"" ')"><?php echo ($showRequest['features'] == '') ? $UpdateRec['features'] : $showRequest['features']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Technical Specification<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control ckeditor" rows="5" name="technical_specification" placeholder="" required onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/.:-?,''"" ')"><?php echo ($showRequest['technical_specification'] == '') ? $UpdateRec['technical_specification'] : $showRequest['technical_specification']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Material of Construction<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control ckeditor" rows="5" name="material_of_construction" placeholder="" required onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/.:-?,''"" ')"><?php echo ($showRequest['material_of_construction'] == '') ? $UpdateRec['material_of_construction'] : $showRequest['material_of_construction']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Performance Chart<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea class="form-control ckeditor" rows="5" name="performance_chart" placeholder="" required onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/.:-?,''"" ')"><?php echo ($showRequest['performance_chart'] == '') ? $UpdateRec['performance_chart'] : $showRequest['performance_chart']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Product Image<span class="messages" style="color: red;"> * Size(Height: 150px, Width:150px)</span></label>
                                                    <input type="file" class="form-control" name="product_image[]" id="formFile1" multiple <?php if($_REQUEST['htid'] == ''){ ?> required <?php } ?>>
                                                </div>
                                                <?php 
                                                    if($UpdateRec['product_image'] != '') { 
                                                        global $db;
                                                        $sql = "SELECT * FROM product WHERE tbid=?";
                                                        $checkvaliduser= $db->prepare($sql);
                                                        $checkvaliduser->execute(array($UpdateRec['tbid']));
                           
                                                        foreach ($checkvaliduser as $key => $row)  {
                                                            // $row['Image_url'] = trim($row['Image_url'],'\,');
                                                            $temp = explode(',',$row['product_image'] );
                                                            // print_r($temp);
                                                            $temp = array_filter($temp);

                                                            foreach($temp as $image){
                                                                $images[]=trim(str_replace(array('[',']'),"",$image));
                                                                // foreach($images as $image){  
                                                ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/product/image/" . $image; ?>"
                                                                data-lightbox="1" data-title="Product Image">
                                                                <img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . "images/product/image/" . $image; ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  
                                                                // }
                                                            }  
                                                        }    
                                                    }  
                                                ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Banner Image<span class="messages" style="color: red;"> * Size(Height: 150px, Width:150px)</span></label>
                                                    <input type="file" class="form-control image display_image" name="banner_image" id="formFile">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <div id="preview"></div>
                                                </div>
                                                <?php if($UpdateRec['banner_image'] != '') { ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/product/banner_image/" . $UpdateRec['banner_image']; ?>"
                                                                data-lightbox="1" data-title="Store Logo">
                                                                <img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . "images/product/banner_image/" . $UpdateRec['banner_image']; ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Brochure</label>
                                                    <input type="file" class="form-control" name="brochure" id="formFile" multiple>
                                                </div>
                                                <?php if($UpdateRec['brochure'] != '') { ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail" style="margin-top: 35px;">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/product/brochure/" . $UpdateRec['brochure']; ?>"
                                                                data-lightbox="1" data-title="Id Proof">
                                                                <a target="_blank" href="<?php echo SiteUrl . "images/product/brochure/" . $UpdateRec['brochure']; ?>">View Brochure</a>
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
                                                        <option value="1" <?php echo ( $status == '1') ? 'selected' : ''; ?>>Active</option>
                                                        <option value="0" <?php echo ( $status == '0') ? 'selected' : ''; ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 float-end">
                                                <button type="submit" name="Submit" value="Submit" class="btn btn-primary waves-effect waves-light"><?php echo ($_REQUEST['htid'] == '') ? 'Submit' : 'Update'; ?></button>
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect"><a href="<?php echo AdminUrl . 'product/list_product.htm'; ?>" style="color: #fff;">Cancel</a></button>
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
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
        $(document).ready(function() {
            $('#category_id').change(function() {
                var category_id = $(this).val();

                // console.log(category_id );

                $.ajax({
                    url: "<?php echo AdminUrl ?>pages/ajax/fetch-subcategory-by-category.php",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(result) {
                        $("#subcategory_id").html(result);
                    }
                });
            });
            $('#subcategory_id').change(function() {
                var subcategory_id = $(this).val();

                // console.log(subcategory_id );

                $.ajax({
                    url: "<?php echo AdminUrl ?>pages/ajax/fetch-image-by-subcategory.php",
                    type: "POST",
                    data: {
                        subcategory_id: subcategory_id
                    },
                    success: function(result) {
                        $("#product_images").html(result);
                    }
                });
            });
        });
        function imagePreview1(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function (event) {
                    $('#preview').html('<img src="'+event.target.result+'" width="150" height="auto"/>');
                };
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }
        $(document).ready(function() {
            $(".display_image").change(function () {
                var display_image = $(this).val();
                console.log(display_image);
                imagePreview1(this);
            });
        });
        $(document).ready(function() {
           $('.ckeditor').ckeditor();
        });
        </script>
        
        <!-- Footer start -->
        <?php include_once '../../require/footer.php'; ?> 
        <!-- Footer end -->

    </body>
</html>