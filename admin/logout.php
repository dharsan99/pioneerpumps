<?php
include '../config/config.inc.php';
session_destroy();
session_unset();
header("location:" . AdminUrl);
exit;
?>