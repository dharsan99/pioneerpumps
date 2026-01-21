<?php

/* Insert Function  */

function insertRecords($TableName, $aryVal, $showQuery = 0) {//testing Completed
    global $db;
    try {
        if (count($aryVal) > 0) {
            $strField = "";
            $strVal = "";
            $genrateArrValue = array();

            foreach ($aryVal as $field => $val) {
                $strField .= "`" . $field . "`,";
                $strVal .= "?,";
                array_push($genrateArrValue, trim($val));
            }
            $strField = trim($strField, ',');
            $strVal = trim($strVal, ',');
            $sql = "INSERT INTO `$TableName` ( $strField ) VALUES ( " . $strVal . " )";
        } else {
            $showQuery = '1';
            $sql = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> No fields present in array <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        if ($showQuery == '1') {
            $sql = "INSERT INTO `$TableName` ( $strField ) VALUES ( " . $strVal . " ) ( " . implode(',', $genrateArrValue) . " )";
            return $sql;
        } elseif ($showQuery == '2') {
            $get1 = $db->prepare($sql);
            $get1->execute($genrateArrValue);
            return $db->lastInsertId();
        } else {
            $get1 = $db->prepare($sql);
            $get1->execute($genrateArrValue);
            $insert_id = $db->lastInsertId();
            return '<div id="showmessage" class="alert alert-success alert-dismissible fade show" role="alert"><i class="mdi mdi-check-all me-2"></i> Successfully Inserted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $e->errorInfo[2] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $e . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    } catch (Exception $exc) {
        return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $exc . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

/* Update Function */

function updateRecords($TableName, $aryVal, $primary_id, $id, $showQuery = 0) {//testing Completed
    global $db;
    try {
        if (count($aryVal) > 0) {
            $strField = "";
            $setVal = "";
            $genrateArrValue = array();
            foreach ($aryVal as $field => $val) {
                $strField .= "`" . $field . "`=?,";
                array_push($genrateArrValue, trim($val));
            }
            $strField = trim($strField, ',');
            $sql = "UPDATE `$TableName` SET  $strField  WHERE `$primary_id` =?";
            array_push($genrateArrValue, trim($id));
        } else {
            $showQuery = 1;
            $sql = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> No fields present in array <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }

        if ($showQuery == 1) {
            $sql = "UPDATE `$TableName` SET  $strField  WHERE `$primary_id` ='$id' ( " . implode(',', $genrateArrValue) . " )";
            return $sql;
        } else {
            $get1 = $db->prepare($sql);
            $get1->execute($genrateArrValue);

            return '<div id="showmessage" class="alert alert-success alert-dismissible fade show" role="alert"><i class="mdi mdi-check-all me-2"></i> Successfully Updated <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    } catch (Exception $exc) {
        return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $exc . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

/* Delete Function */

function delRecords($tablename, $primary_id, $id, $imagepath = '', $imagefilename = '', $showQuery = 0) {//testing Completed
    global $db;
    try {
        $b = explode(",", $id);
        $createsym = trim(str_repeat('?,', count($b)), ',');

        if (($imagepath != '') && ($imagefilename != '')) {
            foreach ($b as $c) {
                $get = $db->prepare("SELECT * FROM `$tablename` WHERE `$primary_id`=?");
                $get->execute(array($c));
                $get1 = $get->fetch(PDO::FETCH_ASSOC);
                $getimagename = $get1[$imagefilename];
                unlink($imagepath . $getimagename);
            }
        }

        if ($showQuery == '1') {
            $sql = "DELETE FROM `$tablename` WHERE `$primary_id` IN ($createsym)  ( " . implode(',', $b) . " )";
        } else {
            $get1 = $db->prepare("DELETE FROM `$tablename` WHERE `$primary_id` IN ($createsym)");
            $get1->execute($b);

            $sql = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> Successfully Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        return $sql;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1451) {
            return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> Selected records not allowed delete process. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $e . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    } catch (Exception $exc) {
        return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $exc . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

/* Select Option function */

function optionBoxs($tablename, $optionvalue, $displaymsg, $condition = '', $selectvalue = '', $show = 0) {//testing Completed
    global $db;
    if ($selectvalue == '') {
        $getarrselct = '';
    } else {
        $getarrselct = explode(',', $selectvalue);
    }
    $optiontag = '';
    if ($show == '1') {
        $optiontag = "<option>SELECT * FROM `$tablename` $condition <option>";
    } else {
        try {
            $message1 = $db->prepare("SELECT * FROM `$tablename` $condition");
            $message1->execute();
            while ($message = $message1->fetch(PDO::FETCH_ASSOC)) {
                $settg = (count($getarrselct) == 0) ? ' ' : ((in_array($message[$optionvalue], $getarrselct)) ? 'selected="selected"' : '');
                $optiontag .= '<option value="' . $message[$optionvalue] . '" ' . $settg . ' >' . htmlentities(stripslashes($message[$displaymsg])) . '</option>';
                $settg = '';
            }
        } catch (Exception $exc) {
            $optiontag = "<option>$exc<option>";
        }
    }
    return $optiontag;
}

/* Select one value function */

function getValue($tablename, $primary_id, $id, $selectfiled) { //testing Completed
    global $db;
    try {
        $get1 = $db->prepare("SELECT * FROM `$tablename` WHERE `$primary_id`=?");
        $get1->execute(array($id));
        $get = $get1->fetch(PDO::FETCH_ASSOC);
        return htmlentities(stripslashes($get[$selectfiled]));
    } catch (Exception $exc) {
        return '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $exc . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

/* Check already exits value fucntion */

function testRepeat($tableName, $filedName, $testValue, $primaryKey, $updateValue = '', $condition = '', $show = 0) {
    global $db;
    try {
        if ($show == '1') {
            $val = "SELECT * FROM `$tableName` WHERE `$filedName`= $testValue and  `$primaryKey`!='$updateValue' $condition";
        } else {
            if ($updateValue == '') {

                $res1 = $db->prepare("SELECT * FROM `$tableName` WHERE `$filedName`= ? and  `$primaryKey` !='' $condition");
                $res1->execute(array($testValue));
            } else {
                $res1 = $db->prepare("SELECT * FROM `$tableName` WHERE `$filedName`= ? and  `$primaryKey` != ? $condition");
                $res1->execute(array($testValue, $updateValue));
            }
            $res = $res1->fetch(PDO::FETCH_ASSOC);

            if ($res[$filedName] == '') {
                $val = 1;
            } else {
                $val = 0;
            }
        }
    } catch (Exception $ex) {
        $val = $ex;
    }
    return $val;
}

/* Select one records function */

function getRecords($tablename, $primary_id, $id) {//testing Completed
    global $db;
    try {
        $get1 = $db->prepare("SELECT * FROM `$tablename` WHERE `$primary_id`=?");
        $get1->execute(array($id));
        $get = $get1->fetch(PDO::FETCH_ASSOC);
        return $get;
    } catch (Exception $exc) {
        $res = array();
        $res['error'] = '1';
        $res['errormsg'] = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i>' . $exc . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        return $res;
    }
}

/* Select all records function */

function getAllRecords($tablename, $condition = '', $show = '') {//testing Completed
    global $db;
    // Gracefully handle missing DB connection
    if (!($db instanceof PDO)) {
        return null; // Return null so caller can skip fetching
    }
    if ($show == '1') {
        $get1 = "SELECT * FROM `$tablename` $condition ";
    } else {
        try {
            $get1 = $db->prepare("SELECT * FROM `$tablename` $condition ");
            $get1->execute();
        } catch (Exception $exc) {
            // Return null instead of error string to prevent fetch() errors
            $get1 = null;
        }
    }
    return $get1;
}

/* Execute Query function  start here */

function executeQurey($getQuery, $getValue = array(), $show = 0) {
    global $db;
    if (1) {
        if ($show == '1') {
            $get1 = $getQuery;
        } else {
            try {
                $get1 = $db->prepare($getQuery);
                $get1->execute($getValue);
            } catch (Exception $exc) {
                // Return null instead of error string to prevent fetch() errors
                $get1 = null;
            }
        }
    }
    return $get1;
}

/* Execute Query function  end here */

/*  Fetch Query function  start here */

function fetchQuery($getQuery, $getValue = array(), $show = 0) {
    global $db;
    if (1) {

        if ($show == '1') {
            $get = $getQuery;
        } else {
            try {
                $get1 = $db->prepare($getQuery);
                $get1->execute($getValue);
                $get = $get1->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $exc) {
                // Return null instead of error string to prevent fetch() errors
                $get = null;
            }
        }
    }
    return $get;
}

/* Fetch Query function  end here */

/*  Fetch All Query function  start here */

function fetchAllQuery($getQuery, $getValue = array(), $show = 0) {
    global $db;
    if (1) {
        if ($show == '1') {
            $get = $getQuery;
        } else {
            try {
                $get1 = $db->prepare($getQuery);
                $get1->execute($getValue);
                $get = $get1->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $exc) {
                // Return null instead of error string to prevent fetch() errors
                $get = null;
            }
        }
    }
    return $get;
}

/* Fetch Query function  end here */


/* Image Compress  function  start here */

function compress_image($destination_url, $quality) {

    $info = getimagesize($destination_url);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($destination_url);
        imagejpeg($image, $destination_url, $quality, '');
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($destination_url);
        imagegif($image, $destination_url, $quality, '');
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($destination_url);
        imagepng($image, $destination_url, $quality, '');
    }

    return $destination_url;
}

/* Login  function  start here */

function LoginCheck($username, $password, $ip = '', $rememberme = '', $action = '') {

    global $db;

    if (($action == 'employeer')) { //type : 2
        $tablename = 'employeer';
        $usernameinfiled = 'email_id';
        $passwordinfiled = 'password';
        $primarykey = 'tbid';
        $tablestatus = 'status';
        $SESSION_ID_KEY = 'EMPBY';
        $SESSION_TYPE = '2';
        $COOKIE_NAME = 'employeeuser';
        $COOKIE_REMEMBER = 'employeeremember';
    } elseif (($action == 'users')) {
        $tablename = 'users';
        $usernameinfiled = 'email_id';
        $passwordinfiled = 'password';
        $primarykey = 'tbid';
        $tablestatus = 'status';
        $SESSION_ID_KEY = 'USERBY';
        $SESSION_TYPE = '3';
        $COOKIE_NAME = 'username';
        $COOKIE_REMEMBER = 'userremember';
    } else {  //type : 1
        $tablename = 'admin';
        $usernameinfiled = 'email_id';
        $passwordinfiled = 'password';
        $primarykey = 'tbid';
        $tablestatus = 'status';
        $SESSION_ID_KEY = 'BY';
        $SESSION_TYPE = '1';
        $COOKIE_NAME = 'adminuser';
        $COOKIE_REMEMBER = 'adminremember';
    }

    //section 1 
    $stmt = $db->prepare("SELECT * FROM `$tablename` WHERE `$usernameinfiled`=? AND `$passwordinfiled`=? ");
    $stmt->execute(array($username, md5($password)));
    $ress = $stmt->fetch(PDO::FETCH_ASSOC);
    //section 2 
    if ($ress[$primarykey] != '') {

        if ($ress[$tablestatus] != '1') {
            $res = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> Your Account was deactivated by admin. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } elseif ($ress[$passwordinfiled] == md5($password)) {
            $_SESSION[$SESSION_ID_KEY] = $ress[$primarykey]; //set value id
            $_SESSION['TYPE'] = $SESSION_TYPE; //user type
            $_SESSION['SITE'] = '24Hrs'; //user type
            if ($rememberme == '1') {
                //Means 10 days change value of 10 to how many days as you want to remember the user details on user's computer
                setcookie($COOKIE_NAME, $username, time() + (60 * 60 * 24 * 10));
                setcookie($COOKIE_REMEMBER, '1', time() + (60 * 60 * 24 * 10));
            } else {
                setcookie($COOKIE_NAME, '', -1);
                setcookie($COOKIE_REMEMBER, '', -1);
            }
            $res = true;
        } else {
            $res = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> Email or Password was incorrect. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    } else {
        $res = '<div id="showmessage" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper me-2"></i> Invalid login details! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    return $res;
}

function logout() {
    global $db;
    // $sql = $db->prepare("UPDATE `admin_history` SET `checkouttime`='" . date('Y-m-d H:i:s') . "' WHERE `id`=?");
    // $sql->execute(array($_SESSION['admhistoryid']));
    $_SESSION['BY'] = '';
    $_SESSION['TYPE'] = '';
}

/* .. Technical function start here .. */

function FindFileExits($path, $filename) {
    if (file_exists($path . $filename)) {
        return true;
    } else {
        return false;
    }
}

if (!function_exists('generateNumericOTP')) {

// Function to generate OTP 
    function generateNumericOTP($n) {

        // Take a generator string which consist of 
        // all numeric digits 
        // $generator = "1A3B5C7D9E0F2G4H6I8J";
        $generator = "1357902468";
        // Iterate for n-times and pick a single character 
        // from generator and append it to $result 
        // Login for generating a random character from generator 
        //     ---generate a random number 
        //     ---take modulus of same with length of generator (say i) 
        //     ---append the character at place (i) from generator to result 
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        // Return result 
        return $result;
    }

}


// Find date difference in two date 
if (!function_exists('DateAndTimeDiff')) {

    function DateAndTimeDiff($Parameters = array()) {
        if ($Parameters['date_from'] == '')
            return 'From date missing';
        if ($Parameters['date_to'] == '')
            return 'To date missing';

        $date1 = new DateTime($Parameters['date_from']); //From date 
        $date2 = new DateTime($Parameters['date_to']); // To date
        if ($Parameters['action'] == 'days')
            $days = $date1->diff($date2)->format('%R%a'); // Return days 
        else
            $days = $date1->diff($date2)->format('%R%a');
        return (int) $days;
    }

}

function getcategory($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `category` WHERE `tbid`=? ORDER BY `tbid` DESC");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

function getsubcategory($a, $b) {
    global $db;
    $get1 = $db->prepare("SELECT * FROM `subcategory` WHERE `tbid`=? ORDER BY `tbid` DESC");
    $get1->execute(array($b));
    $get = $get1->fetch(PDO::FETCH_ASSOC);
    $res = $get[$a];
    return $res;
}

/* .. Technical function end here .. */
?>