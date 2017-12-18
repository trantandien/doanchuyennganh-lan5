<?php
ob_start();
include 'config.php';
include 'vender/connect.php';
session_start();
$idget=$_GET['id'];
$mail=$_SESSION['user'];
echo $diemdi=$_GET['Diemdi'];
$stmt=$conn->prepare("SELECT * FROM chuyenxe ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
	if($value['Diemdi']==$diemdi){
		echo $id1=$value['id'];
		echo $chotrong=$value['Chotrong']+1;
		$stmt=$conn->prepare("UPDATE chuyenxe SET Chotrong=$chotrong WHERE id=$id1");
		$stmt->bindParam(":Chotrong",$chotrong,PDO::PARAM_INT);
		$stmt->execute();
	}
	$stmt=$conn->prepare("DELETE FROM donhang WHERE id=$idget");
	$stmt->execute();
}
$dem=0;
$stmt=$conn->prepare("SELECT * FROM donhang");
$stmt->execute();
$data5 = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data5 as $key => $value5) {
        if($value5['Email']==$_SESSION['user']){
          $dem++;
        }
      }$_SESSION['so']=$dem;
header("location:quanly.php");
?>