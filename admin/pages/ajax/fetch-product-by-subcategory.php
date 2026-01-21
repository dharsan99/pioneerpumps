<?php
include_once ('../../../config/config.inc.php'); 
$subcategory_id = $_POST["subcategory_id"];
$checkvaliduser = $db->prepare("SELECT * FROM `product` WHERE `subcategory_id`='".$subcategory_id."' ");
$checkvaliduser->execute();
$checknum = $checkvaliduser->rowCount();
$num = $checkvaliduser->rowCount();
?>
<option value="" disabled="disabled" selected="true">Select Product</option>
<?php
while($stmt = $checkvaliduser->fetch(PDO::FETCH_ASSOC)) {
?>
<option value="<?php echo $stmt["tbid"];?>"><?php echo $stmt["product_name"];?></option>
<?php
}
?>