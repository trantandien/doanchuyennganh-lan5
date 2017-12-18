<br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
<form class="timnhanh" method="GET" action="search.php" hidden="">
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
</div><br>
<?php
$idget=$_GET['id'];
$stmt=$conn->prepare("SELECT * FROM chuyenxe JOIN xe ON xe.id=chuyenxe.id_xe WHERE chuyenxe.id=$idget");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 10px;font-weight: bolder;">
  <tr>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> HÃNG XE</td>
    <td align="center" width="90px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>
    <td align="center" width="140px"><img width="20" src="image/clock.png"> THỜI GIAN ĐI</td>
    <td align="center" width="110px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="100px"><img width="20" src="image/xe.png"> LOẠI XE</td>
    <td align="center" width="100px"><img width="20" src="image/money1.png"> GIÁ</td>
    <td align="center" width="100px"><img width="20" src="image/ticket.png"> ĐẶT VÉ</td>
  </tr>
</table>
<table style="border: solid 5px; border-bottom: solid 5px; border-color: #003399; border-spacing: 1px; ">
<?php foreach ($data as $chonxe) {?>
  <tr>
  <?php
  $first_date = strtotime($chonxe['Ngaydi']);
  $second_date = strtotime($chonxe['Ngayve']);
  $datediff = abs($first_date - $second_date);
  $first_time = strtotime($chonxe['Giodi']);
  $second_time = strtotime($chonxe['Gioden']);
  $timediff = abs($first_time - $second_time);
  ?>
    <td align="center" width="90px"><?php echo $chonxe['Tenxe']; ?></td>
    <td align="center" width="150px"><?php echo $chonxe['Giodi']; ?></td>
    <td rowspan="3" align="center" width="50px" rowspan="2"><?php echo $tgd=(floor($datediff / (60*60))+ floor($timediff / (60*60))."H"); ?></td>
    <td align="center" width="110px"><?php echo $chonxe['Gioden']; ?></td>
    <td align="center" width="10px" colspan="3"><?php echo $chonxe['Soluongghe']." chỗ<br>Còn trống ".$chonxe['Chotrong']; ?></td>
    <td rowspan="3" align="center" width="120px" ><?php echo number_format($chonxe['Giave'],0,',','.')." VNĐ"; ?></td>
    <form method="GET" action="thanh-toan.php">
    <input type="text" name="idget" value="<?php echo $chonxe['id']; ?>" hidden>
    <input type="text" name="diemden" value="<?php echo $chonxe['Diemden']; ?>" hidden>
    <input type="text" name="diemdi" value="<?php echo $chonxe['Diemdi']; ?>" hidden>
    <input type="text" name="tenxe" value="<?php echo $chonxe['Tenxe']; ?>" hidden>
    <input type="text" name="giodi" value="<?php echo $chonxe['Giodi']; ?>" hidden>
    <input type="text" name="gioden" value="<?php echo $chonxe['Gioden']; ?>" hidden>
    <input type="text" name="soluong" value="<?php echo $chonxe['Soluongghe']; ?>" hidden>
    <input type="text" name="chotrong" value="<?php echo $chonxe['Chotrong']; ?>" hidden>
    <input type="text" name="gia" value="<?php echo $chonxe['Giave']; ?>" hidden>
    <input type="text" name="tgd" value="<?php echo $tgd; ?>" hidden>
    <?php if($chonxe['Chotrong']>0){ ?>
    <td align="center" width="100px" rowspan="3"><button type="submit" style="color: white;height: 30px;width: 100px;font-weight: bolder;margin-top: 5px">ĐẶT VÉ</button></td>
    <?php }else{?>
    <td align="center" width="100px" rowspan="3"><button type="button" style="color: white;height: 30px;background: red;width: 100px;font-weight: bolder;margin-top: 5px">HẾT VÉ</button></td>
    <?php  } ?>
    </form>
  </tr>
  <tr>
    <td rowspan="2" align="center" width="100px"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"></td>
    <td align="center" width="200px"><?php echo $chonxe['Diemdi']; ?></td>
    <td align="center" width="200px"><?php echo $chonxe['Diemden']; ?></td>
    <td align="center" width="200px"> <img width="20" src="image/nuoc.png"><img width="20" src="image/banh.png"> <img width="20" src="image/wifi.png"></td>
  </tr>
  <tr>
    <td align="center" width="200px"><?php echo $chonxe['Ngaydi']; ?></td>
    <td align="center" width="50px"><?php echo $chonxe['Ngayve']; ?></td>
  </tr>
<?php } ?>
</table>
