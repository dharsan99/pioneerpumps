<?php
include_once ('../../config/config.inc.php');

if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}
if ($_REQUEST['remove'] != '') {
    $chk = $_REQUEST['remove'];
    $chk = implode(',', $chk);
    $message = delRecords('category', 'tbid', $chk);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin | Upload QR Products</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Upload QR Products" name="description" />
        <meta content="Upload QR Products" name="author" />
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
                                            <li class="breadcrumb-item font-size-18">QR Codes</li>
                                            <li class="breadcrumb-item active font-size-18">/ Upload QR Products</li>
                                        </ol>
                                    </div>

                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                            <a href="<?php echo AdminUrl . 'category/add_qr.htm'; ?>" style="color: #fff;"><i class="bx bxs-user-plus font-size-16 align-middle me-2"></i> Add QR Products</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
        
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form name="removelist" id="removelist" method="POST">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Tbid</th>
                                                        <!-- <th>Image</th> -->
                                                        <th>Serial No</th>
                                                        <th>Model</th>
                                                        <th >M.Date</th>
                                                        <th>Name</th>
                                                        <th>Occupation</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Mobile</th>
                                                        <th>Created</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (1) {
                                                        // $Categoryobj = executeQurey("SELECT `category`.`tbid`, `category`.`category_name`, `store_category`.`store_category_name` as 'store_category_name', `category`.`status` FROM `category` LEFT JOIN `store_category` on `store_category`.`tbid` = `category`.`store_category_id` ORDER BY `tbid` DESC", []);
                                                        $Categoryobj = getAllRecords('qr_search', 'ORDER BY `tbid` DESC');
                                                        while ($CategoryRec = $Categoryobj->fetch(PDO::FETCH_ASSOC)) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $CategoryRec['tbid']; ?></td>
                                                                <!-- <td><img style="min-width: 50px;max-width: 50px;" src="<?php //echo SiteUrl . 'images/category/' . $CategoryRec['image']; ?>"></td> -->
                                                                <td><?php echo $CategoryRec['serial_num']; ?></td>
                                                                <td><?php echo $CategoryRec['model']; ?></td>
                                                                <td><?php echo $CategoryRec['m_date']; ?></td>
                                                                <td><?php echo $CategoryRec['user_name']; ?></td>
                                                                <td><?php echo $CategoryRec['user_type']; ?></td>
                                                                <td><?php echo $CategoryRec['user_city']; ?></td>
                                                                <td><?php echo $CategoryRec['user_state']; ?></td>
                                                                <td><?php echo $CategoryRec['user_mobile']; ?></td>
                                                                <td><?php echo $CategoryRec['created']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                       
                                                        
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> 

                    </div>
                </div>

                <!-- Foot start -->
                <?php include_once '../require/foot.php'; ?> 
                <!-- Foot end -->
            </div>
            <!-- End main content-->

        </div>
        <!-- END layout-wrapper -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="<?php echo SiteUrl ?>assets/libs/jquery/jquery.min.js"></script>

        <script>
            function checkall(objForm) {
                len = objForm.elements.length;
                var i = 0;
                for (i = 0; i < len; i++) {
                    if (objForm.elements[i].type == 'checkbox') {
                        objForm.elements[i].checked = objForm.check_all.checked;
                    }
                }
            }
            $(document).ready(function() {
                $('#removed').click(function () {
                    swal({
                        title: "Are you sure?",
                        text: "you will not be able to recover this seleced record(s)!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $("#removelist").submit();
                        } else {
                            swal("Your selected record(s) is safe!", {
                                icon: "error",
                            });

                        }
                    });
                    return false;
                });
            });
        </script>

        <!-- Footer start -->
        <?php include_once '../require/footer.php'; ?> 
        <!-- Footer end -->

    </body>
</html>