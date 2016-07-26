<?php
if(isSet($_POST['region_id'])) {
include 'dbconnect.php';
$stmt = $mysql->prepare("SELECT d.district_id, d.district_name FROM districts d LEFT JOIN regions r ON r.region_id = d.region_id WHERE r.region_id='".$_POST['region_id']."'");
$stmt->execute();
$stmt->bind_result($district, $name);
while ($row = $stmt->fetch()) : ?>
<option value="<?php echo $district; ?>"><?php echo $name; ?></option>
<?php endwhile; ?>
<?php }
//$mysql->close(); // to close or not to close?
?>