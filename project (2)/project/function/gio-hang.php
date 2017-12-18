<div><br>
<a align="center" style="font-size: 30px">GIỎ HÀNG</a><br><br>
<?php if(isset($_SESSION['user'])){ ?>
<?php
$dem=0;
$stmt=$conn->prepare("SELECT * FROM donhang");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 11px;font-weight: bolder;">
  <tr>
    <td align="center" width="90px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>
    <td align="center" width="110px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="100px"><img width="20" src="image/v.png"> SỐ LƯỢNG</td>
    <td align="center" width="100px"><img width="20" src="image/seat1.png"> SỐ GHẾ</td>
    <td align="center" width="100px"><img width="20" src="image/money1.png"> GIÁ</td>
  </tr>
</table>
<table style="border: none;line-height: 50px;font-size: 11px;font-weight: bolder;">
<?php foreach ($data as $key => $value) { ?>
<tr>
<?php 
  if($value['Email']==$_SESSION['user']){ 
    ?>
    <td width="90px" style="text-align: center;"><?php echo $value['Diemdi']; ?></td>
    <td width="110px" style="text-align: center;"><?php echo $value['Diemden']; ?></td>
    <td width="100px" style="text-align: center;"><?php echo "1" ?></td>
    <td width="100px" style="text-align: center;"><?php echo $value['Vitri']; ?></td>
    <td width="100px" style="text-align: center;"><?php echo number_format($value['Giave'],0,',','.')." VNĐ"; ?></td>
  <?php $dem++;$ten=$value['TenHanhKhach']; }?>
  </tr>
  <?php
}
if(isset($ten)){
  echo "Tên Hành Khách : ".$ten."<br>";
echo "Số Lượng Vé : ".$dem;  
}

}else{
  header("location:index.php");
}
?>
</table>
<center>
</center>