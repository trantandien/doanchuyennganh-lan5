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

<br>
<?php
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
  if($value['Username']==$_SESSION['user']){ 
    if($value['level']==1){
      ?>
      <div><h2>Thông Tin Tài Khoản</h2></div>
  <div><br>
    <table style="background-color: #EFEFFB;border: none;">
      <tr>
        <td>Họ Tên </td>
        <td><?php echo $value['TenTV']; ?></td>
      </tr>
      <tr>
        <td>Số Điện Thoại </td>
        <td><?php echo "0".$value['Phone']; ?></td>
      </tr>
      <tr>
        <td>Địa Chỉ </td>
        <td><?php echo $value['Diachi']; ?></td>
      </tr>
      <tr>
        <td colspan="2"><a style="color: #0080FF">Thay Đổi Mật Khẩu</a></td>
      </tr>
    </table>
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
    <td align="center" width="100px"><img width="20" src="image/x1.png"> HỦY</td>
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
    <td width="100px" style="text-align: center;">

      <a 
       onclick='return ConfirmDialog("Bạn có chắc chắn muốn hủy vé đã đặt ? ")'
       style="color: red" 
       href="huyve.php?id=
       <?php echo $value['id']; ?>
       &sl=<?php echo $value['Soluong']; ?>
       &Diemdi=<?php echo $value['Diemdi']; ?>">
       HỦY VÉ
      </a>
    </td>
  <?php $dem++;$ten=$value['TenHanhKhach']; }?>
  </tr>
  <?php
}
?>
</table></div>
<?php
  }else{ 
      header("location:admin.php");
   }
  }
}
?>
