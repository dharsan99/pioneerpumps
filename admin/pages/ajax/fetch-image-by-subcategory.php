<?php
include_once ('../../../config/config.inc.php'); 
$subcategory_id = $_POST["subcategory_id"];
$checkvaliduser = $db->prepare("SELECT * FROM `product_image` WHERE `subcategory_id`='".$subcategory_id."' ");
$checkvaliduser->execute();
$checknum = $checkvaliduser->rowCount();
$num = $checkvaliduser->rowCount();
?>
<?php
while($stmt = $checkvaliduser->fetch(PDO::FETCH_ASSOC)) {
?>
<input type="radio" name="image1" id="image1" value="<?php echo $stmt['product_image']; ?>">
<img style="min-width: 150px;max-width: 150px;" src="<?php echo SiteUrl . "images/seller/product/" . $stmt['product_image']; ?>">
<?php
}
?>