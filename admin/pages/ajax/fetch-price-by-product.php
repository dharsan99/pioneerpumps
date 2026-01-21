<?php
include_once ('../../../config/config.inc.php'); 
$product_id = $_POST["product_id"];
$checkvaliduser = $db->prepare("SELECT * FROM `product` WHERE `tbid`='".$product_id."' ");
$checkvaliduser->execute();
$checknum = $checkvaliduser->rowCount();
$num = $checkvaliduser->rowCount();
?>
<?php
while($stmt = $checkvaliduser->fetch(PDO::FETCH_ASSOC)) {
	echo $cost = $stmt["cost"];
?>
<?php
}
?>