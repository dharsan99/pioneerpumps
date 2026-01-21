<?php 
include_once ('../../../config/config.inc.php'); 

//Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}

if ($_REQUEST['Submit'] == 'Submit') {
    $insertvalue = array(
        'title' => $_REQUEST['title'],
        'name' => $_REQUEST['name'],
        'date' => $_REQUEST['date'],
        'description' => $_REQUEST['description'],
        'status' => $_REQUEST['status'],
        'created_type' => $_SESSION['TYPE'],
    );
    // if (testRepeat('category', 'category_name', $_REQUEST['category_name'], 'tbid', $_REQUEST['htid'])) {
        
        if (isset($_FILES["banner_image"]["name"])) {
            $target_dir = "../../../images/news_events/banner_image/";
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

        if(!empty($_FILES["slider_image"]["name"])){
            foreach($_FILES['slider_image']['name'] as $key=>$val){
                $targetDir = "../../../images/news_events/slider_image/"; 
                $allowTypes = array('jpg','png','jpeg','gif');  
                // File upload path 
                $fileName = basename($_FILES['slider_image']['name'][$key]);
                $randnum = rand(1111,9999);
                $targetFilePath = $targetDir . $randnum . $fileName; 

                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["slider_image"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insertvalue['slider_image'] .= $randnum . $fileName.","; 
                    }else{ 
                        $errorUpload .= $_FILES['slider_image']['name'][$key].' | '; 
                    }
                }else{ 
                    $errorUploadType .= $_FILES['slider_image']['name'][$key].' | '; 
                } 
            }
        }

        if (isset($_FILES["document_proof"]["name"])) {
            $target_dir = "../../../images/news_events/document_proof/";
            //echo $_FILES["store_logo"]["name"];
            $filename = str_replace(' ', '-', basename($_FILES["document_proof"]["name"]));
            $randnum = rand(1111,9999);
            $target_file = $target_dir . $randnum . $filename;
            $AllowImageType = array('pdf');
            $imageFileType = strtolower(pathinfo($_FILES["document_proof"]["name"], PATHINFO_EXTENSION));
            // Allow certain file format

            if (in_array($imageFileType, $AllowImageType)) {
                if (!file_exists($target_file)) {
                    if (move_uploaded_file($_FILES["document_proof"]["tmp_name"], $target_file)) {
                        $insertvalue['document_proof'] = $randnum . $filename;
                    } else {
                        echo 'Your address proof is not upload .';
                    }
                } else {
                    $error = 0;
                }
            }
        }

        if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
            $message = updateRecords('news_events', $insertvalue, 'tbid', $_REQUEST['htid'], '0');
            header("location:" . AdminUrl . 'news_events/list_news_events.htm');
            exit;
        }
        else {
            $message = insertRecords('news_events', $insertvalue, '0');
            header("location:" . AdminUrl . 'news_events/list_news_events.htm');
            exit;
        }
    // }else {
    //     $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>"' . $_REQUEST['category_name'] . '" Category already exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    // }
}
if ((isset($_REQUEST['htid']) && ($_REQUEST['htid'] != ''))) {
    $UpdateRec = getRecords('news_events', 'tbid', $_REQUEST['htid']);
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin | Add News & Events</title>
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
                                            <li class="breadcrumb-item font-size-18">News & Events</li>
                                            <li class="breadcrumb-item active font-size-18">/ Add News & Events</li>
                                        </ol>
                                    </div>

                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                            <a href="<?php echo AdminUrl . 'news_events/list_news_events.htm'; ?>" style="color: #fff;"><i class="bx bx-list-ul font-size-16 align-middle me-2"></i> List News & Events</a>
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
                                                    <label class="form-label">Title<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required id="title" onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ')" value="<?php echo ($showRequest['title'] == '') ? $UpdateRec['title'] : $showRequest['title']; ?>">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Name<span class="messages" style="color: red;"> *</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required id="name" onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ')" value="<?php echo ($showRequest['name'] == '') ? $UpdateRec['name'] : $showRequest['name']; ?>">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Date<span class="messages" style="color: red;"> *</span></label>
                                                    <div class="input-group mb-2" id="datepicker2">
                                                        <input type="text" class="form-control" name="date" id="date" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true" value="<?php echo ($child1 == '') ? $UpdateRec['child1'] : $child1; ?>">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <label class="form-label">Description<span class="messages" style="color: red;"> *</span></label>
                                                    <textarea type="text" rows="5" name="description" class="form-control ckeditor" placeholder="Enter Description" required id="description" onkeypress="return AllowCustomFormat(this.event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ')"><?php echo ($showRequest['description'] == '') ? $UpdateRec['description'] : $showRequest['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label for="formFile" class="form-label">Banner Image<span class="messages" style="color: red;"> * Size(Height: 150px, Width:150px)</span></label>
                                                    <input class="form-control display_image" type="file" name="banner_image" id="formFile" <?php if($_REQUEST['htid'] == ''){ ?> required <?php } ?>>
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <div id="preview"></div>
                                                </div>
                                                <?php if($UpdateRec['banner_image'] != '') { ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/news_events/banner_image/" . $UpdateRec['banner_image']; ?>"
                                                                data-lightbox="1" data-title="Store Logo">
                                                                <img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . "images/news_events/banner_image/" . $UpdateRec['banner_image']; ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label">Slider Image<span class="messages" style="color: red;"> * Size(Height: 150px, Width:150px)</span></label>
                                                    <input type="file" class="form-control" name="slider_image[]" id="formFile1" multiple <?php if($_REQUEST['htid'] == ''){ ?> required <?php } ?>>
                                                </div>
                                                <?php 
                                                    if($UpdateRec['slider_image'] != '') { 
                                                        global $db;
                                                        $sql = "SELECT * FROM news_events WHERE tbid=?";
                                                        $checkvaliduser= $db->prepare($sql);
                                                        $checkvaliduser->execute(array($UpdateRec['tbid']));
                           
                                                        foreach ($checkvaliduser as $key => $row)  {
                                                            // $row['Image_url'] = trim($row['Image_url'],'\,');
                                                            $temp = explode(',',$row['slider_image'] );
                                                            // print_r($temp);
                                                            $temp = array_filter($temp);

                                                            foreach($temp as $image){
                                                                $images[]=trim(str_replace(array('[',']'),"",$image));
                                                                // foreach($images as $image){  
                                                ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/news_events/slider_image/" . $image; ?>"
                                                                data-lightbox="1" data-title="Product Image">
                                                                <img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . "images/news_events/slider_image/" . $image; ?>">
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
                                                    <label for="formFile" class="form-label">Document Proof</label>
                                                    <input class="form-control" type="file" name="document_proof" id="formFile2">
                                                </div>
                                                <?php if($UpdateRec['document_proof'] != '') { ?>
                                                <div class="col-sm-4 mb-2">
                                                    <div class="thumbnail" style="margin-top: 35px;">
                                                        <div class="thumb">
                                                            <a href="<?php echo SiteUrl . "images/news_events/document_proof/" . $UpdateRec['document_proof']; ?>"
                                                                data-lightbox="1" data-title="Document Proof">
                                                                <a target="_blank" href="<?php echo SiteUrl . "images/news_events/document_proof/" . $UpdateRec['document_proof']; ?>">View Document Proof</a>
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
                                                <button type="reset" class="btn btn-secondary waves-effect"><a href="<?php echo AdminUrl . 'news_events/list_news_events.htm'; ?>" style="color: #fff;">Cancel</a></button>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $(function () {
                    $('#date').datepicker();
                    $('#date').datepicker('setDate', new Date());
                });
                $(function () {
                    var date = new Date();
                    date.setMonth(date.getMonth() + 1, 1);
                    $('#date').datepicker({ defaultDate: date });
                });
               $('.ckeditor').ckeditor();
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
        </script>

        <!-- Footer start -->
        <?php include_once '../../require/footer.php'; ?> 
        <!-- Footer end -->

    </body>
</html>