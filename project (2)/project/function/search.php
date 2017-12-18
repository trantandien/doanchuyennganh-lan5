<br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
<form class="timnhanh" method="GET" hidden="">
  <table style="border: none;">
    <tr>
      <td align="center" width="100"><img width="20" align="center" src="image/local1.png">Nơi Đi</td>
      <td align="center" width="100"><img width="20" align="center" src="image/local1.png">Nơi Đến</td>
      <td align="center" width="100"><img width="20" align="center" src="image/calendar.png">Ngày Đi</td>
      
    </tr>
    <tr>
      <td><select style="margin-left: 5px" name="noi-di">
        </select></td>
      <td><select style="margin-left: 5px " name="noi-den">
        </select></td>
      <td><input name="setTodaysDate" type="date" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
        echo date('Y-m-d'); ?>">
        </td>
      <td><button name="btnSearch" style="color: white;padding:5px 20px;font-size: 20px;border-radius: 10px">Tìm Xe</button></td>
    </tr>
  </table>
</form>
<a class="tim" style="cursor: pointer;">Tìm Chuyến Xe Nhanh</a>
</div>
<br><div><a style="font-size: 25px">CHUYẾN XE HIỆN CÓ</a></div><br>
<?php
$i=0;
$diemdi = $_GET['noi-di'];
$diemden = $_GET['noi-den'];
$ngaydi = $_GET['setTodaysDate'];
$sql ="SELECT
chuyenxe.id,
chuyenxe.Giodi,
chuyenxe.Gioden,
chuyenxe.Diemdi,
chuyenxe.Diemden,
chuyenxe.Ngaydi,
chuyenxe.Ngayve,
chuyenxe.Giave,
chuyenxe.Chotrong,
chuyenxe.id_lotrinh,
chuyenxe.id_taixe,
chuyenxe.id_xe,
chuyenxe.id_vexe,
lotrinh.Diemdi as diemdi_lotrinh,
lotrinh.Diemden as diemden_lotrinh
FROM
lotrinh
INNER JOIN chuyenxe ON chuyenxe.id_lotrinh = lotrinh.id
WHERE
lotrinh.Diemdi = '$diemdi' AND
lotrinh.Diemden = '$diemden' AND
chuyenxe.Ngaydi = '$ngaydi'
";
$stmt=$conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($_GET);
// print_r($data);
?>
<?php
foreach ($data as $key => $value) {
//	if($value['Diemden']==$_GET['noi-den'] && $value['Diemdi']==$_GET['noi-di'])
  {
   $i++;
?>	
		<div class="chuyen" style="line-height: 50px;float: left;width: all;margin-left: 400px;margin-right: 260px;">
    <div style="text-align: left;float: left;width: 150px">
      <?php echo $value['Diemdi']; ?>
    </div>
    <div style="text-align: left;float: left;margin-left: 50px;width: 50px"><img width="20" align="center" src="image/go.png"></div>
    <div style="text-align: left;float: left;margin-left: 30px;width: 150px">
      <?php echo $value['Diemden']; ?>
    </div>
    <div style="text-align: center;float: right;margin-top: 0px;width: 10px">
      <a href="chon-xe.php?id=<?php echo $value['id'] ?>">
      <button style="color: white;width: 100px;height: 30px;font-weight: bold;">Chọn</button>
      </a>
    </div>  
      <div style="float: right;text-align: right;margin-right: 30px;width: 100px"><b style="color: #FE9A2E">
        <?php echo number_format($value['Giave'],0,',','.')." đ"; ?>
        </b></div>
      </div>
      
	<?php }
}
?>
<br><br><br>
