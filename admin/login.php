<?php
include_once '../config/config.inc.php';

if (( $_SESSION['BY'] != '') && ( $_SESSION['TYPE'] == '1')) {
    header("location:" . AdminUrl . 'pages/');
    exit;
}
if (isset($_REQUEST['logsubmit'])) {
    $_REQUEST['myusername'];
    $_REQUEST['mypassword'];
    if (($_REQUEST['myusername'] != '') && ($_REQUEST['mypassword'] != '')) {
        // $_SESSION['BY'] = '1';
        // $_SESSION['TYPE'] = '1';
        $message = LoginCheck($_REQUEST['myusername'], $_REQUEST['mypassword'], '', $_REQUEST['myremember'], 'admin');
        if ($message === true) {
            header("location:" . AdminUrl . 'pages/');
            exit;
       }
    } else {
        $message = '<div id="showmessage" class="alert alert-danger alert-dismissible background-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> Email or Password was empty</div>';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Pioneer Pumps - Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Dhya x Pioneer Admin Dashboard" name="description" />
        <meta content="Dhya Innovations" name="author" />
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
                                            <label for="username" class="form-label">Username</label>
                                            <input type="email" class="form-control" name="myusername" id="myusername" placeholder="Email-Id" value="" required="">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="mypassword" id="mypassword" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required="" value="">
                                                <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="logsubmit" id="logsubmit" value="login">Log In</button>
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
    </body>
</html>