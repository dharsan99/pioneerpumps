<?php
include_once ('../../../config/config.inc.php');

if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . AdminUrl);
    exit;
}
if ($_REQUEST['remove'] != '') {
    $chk = $_REQUEST['remove'];
    $chk = implode(',', $chk);
    $message = delRecords('contact_form', 'tbid', $chk);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin | List Contact Form</title>
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
                                            <li class="breadcrumb-item font-size-18">Contact Form</li>
                                            <li class="breadcrumb-item active font-size-18">/ List Contact Form</li>
                                        </ol>
                                    </div>

                                    <!-- <div class="page-title-right">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                            <a href="<?php // echo AdminUrl . 'category/add_category.htm'; ?>" style="color: #fff;"><i class="bx bxs-user-plus font-size-16 align-middle me-2"></i> Add Category</a>
                                        </button>
                                    </div> -->
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
                                                        <th>S.No.</th>
                                                        <th>Name</th>
                                                        <th>Email-Id</th>
                                                        <th>Mobile Number</th>
                                                        <th>Status</th>
                                                        <th data-sortable="false" align="center" style="text-align: center; padding-right:0; padding-left: 0; width: 10%;">View</th>
                                                        <th data-sortable="false" align="center" class="form-check-primary" style="text-align: center; padding-right:0; padding-left: 0; width: 10%;"><input class="form-check-input" type="checkbox" id="formCheckcolor1" name="check_all" id="check_all" value="1" onclick="javascript:checkall(this.form)" /></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (1) {
                                                        $ContactFormobj = getAllRecords('contact_form', 'ORDER BY `tbid` DESC');
                                                        while ($ContactFormRec = $ContactFormobj->fetch(PDO::FETCH_ASSOC)) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $ContactFormRec['name']; ?></td>
                                                                <td><?php echo $ContactFormRec['email_id']; ?></td>
                                                                <td><?php echo $ContactFormRec['mobile_number']; ?></td>
                                                                <td><?php echo ($ContactFormRec['status'] == '1') ? 'Active' : 'Inactive'; ?></td>
                                                                <td style="text-align: center;"><a href="<?php echo AdminUrl ?>contact_form/<?php echo $ContactFormRec['tbid']; ?>/view-contact_form.htm"><i class="mdi mdi-eye"></i></a></td>
                                                                <td style="text-align: center;"><input class="form-check-input" type="checkbox" id="formCheckcolor1" name="remove[]" value="<?php echo $ContactFormRec['tbid']; ?>" /></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="6">&nbsp;</th>
                                                        <th style="margin:0px auto;" align="center"><button type="submit" class="btn btn-danger waves-effect waves-light" name="removed" id="removed" value="Delete"> DELETE </button></th>
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
                <?php include_once '../../require/foot.php'; ?> 
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
        <?php include_once '../../require/footer.php'; ?> 
        <!-- Footer end -->

    </body>
</html>