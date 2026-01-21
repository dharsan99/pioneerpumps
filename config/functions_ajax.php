<?php

include 'config.inc.php';
global $db;
if (($_REQUEST['image'] != '') && ($_REQUEST['id'] != '') && ($_REQUEST['table'] != '') && ($_REQUEST['path'] != '') && ($_REQUEST['images'] != '') && ($_REQUEST['pid'] != '')) {
    

    unlink($_REQUEST['path'] . $_REQUEST['image']);
    $updateimg = $db->prepare("UPDATE `" . $_REQUEST['table'] . "` SET `" . $_REQUEST['images'] . "`=? WHERE  md5(`" . $_REQUEST['pid'] . "`) =?");
    $updateimg->execute(array('', $_REQUEST['id']));

//    $htry = $db->prepare("INSERT INTO `history` (`page`,`pageid`,`action`,`userid`,`ip`,`actionid`,`info`) VALUES (?,?,?,?,?,?,?)");
//    $htry->execute(array('Manage Profile', 9, 'Delete', $_SESSION['UID'], $_SERVER['REMOTE_ADDR'], $_REQUEST['id'], 'Image Deletion'));

    echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-close"></i>Succesfully Deleted</h4><!--<a href="' . $sitename . 'settings/adddepartment.htm">Add another one</a>--></div>';
}

// Test repeated values

if ($_REQUEST['reaptaction'] != '') {
    $configData = array();
    if ($_REQUEST['reaptaction'] == 'repeatdepartment') {
        $configData = array(
            'tablename' => 'departments',
            'primarykey' => 'tbid',
            'filedname' => 'name',
            'testningvalue' => $_REQUEST['testvalue'],
            'updatevalue' => $_REQUEST['updatevalue'],
            'show' => $_REQUEST['show'],
        );
        $condition = '';
    }
    if ($_REQUEST['reaptaction'] == 'repeatdesignation') {
        $configData = array(
            'tablename' => 'designations',
            'primarykey' => 'tbid',
            'filedname' => 'name',
            'testningvalue' => $_REQUEST['testvalue'],
            'updatevalue' => $_REQUEST['updatevalue'],
            'show' => $_REQUEST['show'],
        );
        $condition = " and `department` ='" . $_REQUEST['department'] . "'";
    }
    if ($_REQUEST['reaptaction'] == 'repeatempphonenumber') {
        $configData = array(
            'tablename' => 'employee',
            'primarykey' => 'tbid',
            'filedname' => 'mobilenumber',
            'testningvalue' => $_REQUEST['testvalue'],
            'updatevalue' => $_REQUEST['updatevalue'],
            'show' => $_REQUEST['show'],
        );
        $condition = '';
    }
    if ($_REQUEST['reaptaction'] == 'repeatempemailid') {
        $configData = array(
            'tablename' => 'employee',
            'primarykey' => 'tbid',
            'filedname' => 'emailid',
            'testningvalue' => $_REQUEST['testvalue'],
            'updatevalue' => $_REQUEST['updatevalue'],
            'show' => $_REQUEST['show'],
        );
        $condition = '';
    }
    if ($_REQUEST['reaptaction'] == 'repeatempusername') {
        $configData = array(
            'tablename' => 'employee',
            'primarykey' => 'tbid',
            'filedname' => 'username',
            'testningvalue' => $_REQUEST['testvalue'],
            'updatevalue' => $_REQUEST['updatevalue'],
            'show' => $_REQUEST['show'],
        );
        $condition = '';
    }
    if ($_REQUEST['reaptaction'] == 'repeatempregisternum') {
        $configData = array(
            'tablename' => 'employee',
            'primarykey' => 'tbid',
            'filedname' => 'registernumber',
            'testningvalue' => $_REQUEST['testvalue'],
            'updatevalue' => $_REQUEST['updatevalue'],
            'show' => $_REQUEST['show'],
        );
        $condition = '';
    }


    if (count($configData)) {
        $testresult = testRepeat($configData['tablename'], $configData['primarykey'], $configData['filedname'], $configData['testningvalue'], $configData['updatevalue'], $condition, $configData['show']);
    } else {
        $testresult = 2;
        $testresultmsg = 'Table name missing';
    }
    echo json_encode(array('status' => $testresult, 'msg' => $testresultmsg));
}
// Category ,subcategory,innercategory
if ($_REQUEST['selectoption'] != '') {
    echo '<option> Select Designation</option>';
    if ($_REQUEST['selectoption'] == 'selectdesignaion') {
        $configData = array(
            'tablename' => 'designations',
            'primarykey' => 'tbid',
            'displayname' => 'name',
            'show' => '0',
        );
        $condition = "and `department`='" . $_REQUEST['testvalue'] . "'";
    }
    if ($_REQUEST['testvalue'] != '') {
        echo optionBoxs($configData['tablename'], $configData['primarykey'], $configData['displayname'], "where `status`='1' $condition   ", '', $configData['show']);
    }
}
?>
