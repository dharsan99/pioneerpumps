<?php

session_start();
ob_start();
error_reporting(0);
if ($_REQUEST['error'] == '1') {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
}

$GenralComp = array();

if (($_SERVER['HTTP_HOST'] == 'localhost')) {

    $DBNAME = 'danfoss';
    $DBUSER = 'root';
    $DBPASS = '';
    $db = new PDO("mysql:host=localhost;dbname=$DBNAME;charset=utf8mb4", $DBUSER, $DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection_string = mysqli_connect("localhost", $DBUSER, $DBPASS, $DBNAME);
    $docroot = $_SERVER['DOCUMENT_ROOT'] . "";
    $fsitename = 'http://' . $_SERVER['HTTP_HOST'] . "/mandb/danfoss/";
    $sitename = 'http://' . $_SERVER['HTTP_HOST'] . "/mandb/danfoss/";
    $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    define('DOC_ROOT', $docroot);
    define('WEB_ROOT', $fsitename);
    define('ADMIN_ROOT', $sitename);
} else {
    $DBNAME = 'demowebt_jobportal';
    $DBUSER = 'demowebt_jobportaluser';
    $DBPASS = 'w~L%MUuR4e}K';
    $db = new PDO("mysql:host=localhost;dbname=$DBNAME;charset=utf8mb4", $DBUSER, $DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection_string = mysqli_connect("localhost", $DBUSER, $DBPASS, $DBNAME);
    $docroot = $_SERVER['DOCUMENT_ROOT'] . "/";
    $fsitename = 'http://' . $_SERVER['HTTP_HOST'] . "/";
    $sitename = 'http://' . $_SERVER['HTTP_HOST'] . "/";
    $actual_link = "http://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
    define('DOC_ROOT', $docroot);
    define('WEB_ROOT', $fsitename);
    define('ADMIN_ROOT', $sitename);
}

ini_set('date.timezone', 'Asia/Kolkata');
date_default_timezone_set('Asia/Kolkata');

ini_set('session.gc-maxlifetime', 36000);

ini_set('upload_max_filesize', '300M');

ini_set('post_max_size', '300M');

ini_set('memory_limit', '32M');

ini_set('max_input_time', '60');

ini_set('max_execution_time', '90');

function DB_connetion() {
    global $DBNAME;
    global $DBUSER;
    global $DBPASS;
    $newdb = new PDO("mysql:host=localhost;dbname=$DBNAME;charset=utf8mb4", $DBUSER, $DBPASS);
    $newdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $newdb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $newdb;
}

function DB($sql) {
    global $connection_string;
    $result = mysqli_query($connection_string, $sql);
    return $result;
}

function DB_QUERY($sql) {
    global $connection_string;
    $result = mysqli_fetch_array(mysqli_query($connection_string, $sql));
    return $result;
}

function DB_NUM($sql) {
    global $connection_string;
    $result = mysqli_num_rows(mysqli_query($connection_string, $sql));
    return $result;
}

if (!function_exists('mysql_query')) {

    function mysql_query($sql) {
        global $connection_string;
        $result = mysqli_query($connection_string, $sql);
        return $result;
    }

}

if (!function_exists('mysql_fetch_array')) {

    function mysql_fetch_array($sql) {
        global $connection_string;
        $result = mysqli_fetch_array($sql);
        return $result;
    }

}

if (!function_exists('mysql_fetch_row')) {

    function mysql_fetch_row($sql) {
        global $connection_string;
        $result = mysqli_fetch_row($sql);
        return $result;
    }

}

if (!function_exists('mysql_num_rows')) {

    function mysql_num_rows($sql) {
        global $connection_string;
        $result = mysqli_num_rows($sql);
        return $result;
    }

}
if (!function_exists('mysql_insert_id')) {

    function mysql_insert_id() {
        global $connection_string;
        $result = mysqli_insert_id($connection_string);
        return $result;
    }

}
if (!function_exists('mysql_real_escape_string')) {

    function mysql_real_escape_string($val) {
        global $connection_string;
        $result = mysqli_real_escape_string($connection_string, $val);
        return $result;
    }

}
if (!function_exists('mysql_escape_string')) {

    function mysql_escape_string($val) {
        global $connection_string;
        $result = mysqli_real_escape_string($connection_string, $val);
        return $result;
    }

}
if (!function_exists('mysql_error')) {

    function mysql_error() {
        global $connection_string;
        $result = mysqli_error($connection_string);
        return $result;
    }

}
if (!function_exists('mysql_num_fields')) {

    function mysql_num_fields($val) {
        global $connection_string;
        $result = mysqli_num_fields($val);
        return $result;
    }

}
if (!function_exists('mysql_field_name')) {

    function mysql_field_name($val, $i) {
        global $connection_string;
        $result = mysqli_fetch_field_direct($val, $i);
        return $result->name;
    }

}
if (!function_exists('mysql_close')) {

    function mysql_close($val) {
        global $connection_string;
        $result = mysqli_close($connection_string);
        return $result;
    }

}
if (isset($_REQUEST['showtables'])) {
    $ns = DB("SHOW TABLES");
    while ($fs = mysqli_fetch_array($ns)) {
        print_r($fs[0]);
    }
    exit;
}

function strip_tags_attributes($string, $allowtags = NULL, $allowattributes = NULL) {
    $string = strip_tags($string, $allowtags);
    if (!is_null($allowattributes)) {
        if (!is_array($allowattributes))
            $allowattributes = explode(",", $allowattributes);
        if (is_array($allowattributes))
            $allowattributes = implode(")(?<!", $allowattributes);
        if (strlen($allowattributes) > 0)
            $allowattributes = "(?<!" . $allowattributes . ")";
        $string = preg_replace_callback("/<[^>]*>/i", function($matches) use ($allowattributes) {
            return preg_replace("/ [^ =]*" . $allowattributes . "=(\"[^\"]*\"|'[^']*')/i", "", $matches[0]);
        }, $string);
    }
    return $string;
}

function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

function formatInIndianStyle($num) {
    return number_format((float) $num, 3, '.', '');
}

function postedago($time) {
    $time = time() - $time; // to get the time since that moment
    //echo $time;
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
}

//include_once (__DIR__ . '/uploadimage.php');
include_once ( __DIR__ . '/maillservice/smtp/smtp.php');
include_once (__DIR__ . '/functions_com.php');
//include_once (__DIR__ . '/paging.php');
?>