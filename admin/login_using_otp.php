<?php
include_once '../config/config.inc.php';

if (( $_SESSION['BY'] != '') && ( $_SESSION['TYPE'] == '1')) {
    header("location:" . AdminUrl . 'pages/');
    exit;
}
if (isset($_REQUEST['logsubmit'])) {

    function generateRandomString($length = 4)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0;$i < $length;$i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1) ];
        }
        return $randomString;
    }

    $checkvaliduser = $db->prepare("SELECT * FROM `admin` WHERE `mobile_number`='" . $_REQUEST['mobile_number'] . "' ORDER BY `tbid` ASC");
    $checkvaliduser->execute();
    $checknum = $checkvaliduser->rowCount();
    $row = $checkvaliduser->fetch(PDO::FETCH_ASSOC);

    if($row['mobile_number'] == $_REQUEST['mobile_number']) {
        $Name =  $row['user_name'];
        // set form property values
        $mobile_number = $_REQUEST['mobile_number'];
        $_SESSION['Mobile'] = $_REQUEST['mobile_number'];
        $tbid = $row['tbid'];
        echo $OTP = generateRandomString();

        // Account details
        $apiKey = urlencode('NjM1OTM2Mzk3NDc5NDk3YTcxNzI0MjY0NTU0ODc5NjQ=');
        
        // Message details
        $numbers = array($mobile_number);
        $sender = urlencode('HRSOFF');
        $msg = rawurlencode("Dear $Name,24HRS Application login $OTP - COSMOZEAL TECH LLP");
     
        $numbers = implode(',', $numbers);
     
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $msg);
     
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Add Report
        $query = "UPDATE `admin` SET otp='" . $OTP . "' WHERE tbid='" . $row['tbid'] . "'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        header("location:" . AdminUrl . 'login_verify_otp.php');
        exit;
    } else {
        $message = '<div id="showmessage" class="alert alert-danger alert-dismissible background-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> Invalid Mobile Number! </div>';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Pioneer Pumps - Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo SiteUrl; ?>images/logo/24Hrs.ico">
        <!-- Bootstrap Css -->
        <link href="<?php echo SiteUrl; ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo SiteUrl; ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo SiteUrl; ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="row" id="hideDiv">
                            <div class="col-12">
                                <?php echo $message; ?>
                            </div>
                        </div>
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to Pioneer Pumps.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo SiteUrl; ?>assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo SiteUrl; ?>assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo SiteUrl; ?>images/logo/24Hrs.jpg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="" method="post" autocomplete="off">
                                        <div class="mb-3">
                                            <label for="mobile_number" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="" required="">
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="logsubmit" id="logsubmit" value="login">Get OTP</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <div>
                                <p>© <script>document.write(new Date().getFullYear())</script> Pioneer Pumps. Design & Develop by <i class="mdi mdi-heart text-danger"></i> by Dhya Innovations</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php echo SiteUrl; ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo SiteUrl; ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo SiteUrl; ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo SiteUrl; ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo SiteUrl; ?>assets/libs/node-waves/waves.min.js"></script>
        <!-- App js -->
        <script src="<?php echo SiteUrl; ?>assets/js/app.js"></script>
        <script src="<?php echo SiteUrl ?>assets/js/validation.js"></script>
    </body>
</html>