<?php
$PAGE['ID'] = '';
$PAGE['KEY'] = 'dashboard';
$PAGE['TYPE'] = '3'; //1-List and 2-Form and 3 - dashboard 
include '../config/config.inc.php';
//Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
    header("location:" . $sitename);
    exit;
}

executeQurey('TRUNCATE `websetting`');

$web_key_here = array(
    'site_name' => 'Job Portal',
    'short_name' => 'Job',
    'meta_title' => 'Job portal | Admin panel',
    'timezone' => 'timezone',
    'faver_icon' => 'timezone',
    'site_logo' => 'timezone',
);

foreach ($web_key_here as $key => $value) {
    $insertvalue = array(
        'web_key' => $key,
        'web_value' => $value,
        'status' => '1',
    );
    $message = insertRecords('websetting', $insertvalue, '0');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../require/head.php'; ?>        
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include '../require/header.php'; ?>  
            <?php include '../require/sidebar.php'; ?>  

            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1> Seeder updated successfully </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <?php include '../require/footer.php'; ?>  
            <?php include '../require/setting.php'; ?>  
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php include '../require/foot.php'; ?>  
    </body>
</html>