<?php
include_once ('../../../config/config.inc.php'); 
$category_id = $_POST["category_id"];
$checkvaliduser = $db->prepare("SELECT * FROM `subcategory` WHERE `category_id`='".$category_id."' ");
$checkvaliduser->execute();
$checknum = $checkvaliduser->rowCount();
$num = $checkvaliduser->rowCount();
?>
<option value="" disabled="disabled" selected="true">Select SubCategory</option>
<?php
while($stmt = $checkvaliduser->fetch(PDO::FETCH_ASSOC)) {
?>
<option value="<?php echo $stmt["tbid"];?>"><?php echo $stmt["subcategory_name"];?></option>
<?php
}
?>