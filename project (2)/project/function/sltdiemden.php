<?php
ob_start();
include "../config.php";
include '../vender/connect.php';
session_start();
echo $id=$_SESSION['idget'];
$stmt=$conn->prepare("SELECT * FROM chuyenxe JOIN lotrinh ON chuyenxe.Diemdi=lotrinh.Diemdi WHERE chuyenxe.id=$id");
$stmt->execute();
$lotrinh = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($lotrinh as $data) { 
	?>
	<option value="<?php echo $data['Diemden']; ?>"><?php echo $data['Diemden']; ?></option>
<?php } ?>
