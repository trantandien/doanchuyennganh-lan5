<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 10px;font-weight: bolder;">
  <tr>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> HÃNG XE</td>
    <td align="center" width="90px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>
    <td align="center" width="140px"><img width="20" src="image/clock.png"> THỜI GIAN ĐI</td>
    <td align="center" width="110px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="100px"><img width="20" src="image/xe.png"> LOẠI XE</td>
    <td align="center" width="100px"><img width="20" src="image/money1.png"> GIÁ</td>
    <td align="center" width="100px"><img width="20" src="image/ticket.png"> XÁC NHẬN</td>
  </tr>
</table>
<table style="border: none;line-height: 50px;font-size: 10px;font-weight: bolder;">
  <tr>
    <td rowspan="" align="center" width="90px"><?php echo $_GET['tenxe']; ?></td>
    <td rowspan="" align="center" width="90px"><?php echo $_GET['giodi']; ?></td>
    <td rowspan="2" align="center" width="140px"><?php echo $_GET['tgd']; ?></td>
    <td rowspan="" align="center" width="110px"><?php echo $_GET['gioden']; ?></td>
    <td align="center" width="100px"><?php echo $_GET['soluong']." Chỗ"; ?></td>
    <td rowspan="2" align="center" width="100px"><?php echo number_format($_GET['gia'],0,",",".")." VNĐ"; ?></td>
    <div hidden>
    <?php echo $str=$_SERVER["REQUEST_URI"] ; 
    echo "<hr>";
    echo $str1=stripos($str,'?');
    echo "<hr>";
    echo $cat=substr($str, $str1+1);
    ?></div>
    <td rowspan="2" align="center" width="100px"><form method="POST">
    <button type="submit" name="chon" style="color:white;font-weight: bolder;padding: 5px 0">Xác Nhận Chuyến Xe</button></form></td>
    <?php
    if(isset($_POST['chon'])){
      echo $soluongve=$_POST['soluongve'];
      header("location:thanh-toan.php?$cat&soluongve=$soluongve");      
    }
    ?>
  </tr>
  <form method="POST">
  <?php if(isset($_GET['soluongve'])){ ?>
  <input type="text" name="slve" value="<?php echo $_GET['soluongve']; ?>" hidden>
  <?php } ?>
  <tr>
    <td align="center" width="90"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"></td>
    <td align="center" width="90"><?php echo $_GET['diemdi']; ?></td>
    <td align="center" width="110"><?php echo $_GET['diemden']; ?></td>
    <td align="center" width="100px"><?php echo $_GET['chotrong']; ?></td>
  </tr>
  <tr>
    <td colspan="7"><hr></td>
  </tr>  
</table>
<?php 
if(isset($_GET['soluongve'])){
echo "Mời Khách Chọn Ghế";
}else{
  echo "Vui Lòng Xác Nhận Chuyến Xe Trước Khi Chọn";
}

$idget2=$_GET['idget'];
$soday=$_GET['soluong']/4;
$diemdi000=$_GET['diemdi'];
$stmt=$conn->prepare("SELECT * FROM donhang JOIN chuyenxe ON chuyenxe.Diemdi=donhang.Diemdi AND chuyenxe.Diemden=donhang.Diemden JOIN xe ON chuyenxe.id_xe=xe.id ");
$stmt->execute();
$don = $stmt->fetchAll(PDO::FETCH_ASSOC);
$mangdayghe1=array();
$mangdayghe2=array();
$mangdayghe3=array();
$mangdayghe4=array();
foreach ($don as $key => $dhh) {
  if($dhh['id']==$idget2){
  $dayghe=substr($dhh['Vitri'], 0,1);
  if($dayghe==1){
    $dayghe;
    $mangdayghe1[]=$dhh['Vitri']%10;
  }
  if($dayghe==2){
    $dayghe;
    $mangdayghe2[]=$dhh['Vitri']%10;
  }
  if($dayghe==3){
    $dayghe;
    $mangdayghe3[]=$dhh['Vitri']%10;
  }
  if($dayghe==4){
    $dayghe;
    $mangdayghe4[]=$dhh['Vitri']%10;
  }
}}
?>
<div style="">
  <table style="border: none">
    <tr>
    <?php for($j=$soday;$j>=1;$j--){ ?>
    <td align="center"<?php if(!in_array($j, $mangdayghe1)){ echo "style='background-color:#04B45F;color:white'"; }else{
      echo "style='background-color:#FA5858;color:white'";
    } ?>><?php 
    echo $j."</br>";
    if(!in_array($j, $mangdayghe1)){?>
    <input type="checkbox" name="ghe[]" value="<?php echo $j; ?>"></td>
    <?php }else{
      echo "FULL";
      }} ?>
    <td align="center" rowspan="2" style="background: #E6E6E6">Ghế<br>Tài<br>Xế</td>
    <td align="center" rowspan="5"></td>
    <td bgcolor="#0080FF" align="center" style="color: white">1<br><input type="radio" name="day" value="1"></td>
    </tr>
    <tr>
    <?php for($j=$soday;$j>=1;$j--){ ?>
    <td align="center"<?php if(!in_array($j, $mangdayghe2)){ echo "style='background-color:#04B45F;color:white'"; }else{
      echo "style='background-color:#FA5858;color:white'";
    } ?>><?php 
    echo $j."</br>";
    if(!in_array($j, $mangdayghe2)){?>
    <input type="checkbox" name="ghe[]" value="<?php echo $j; ?>"></td>
    <?php }else{
      echo "FULL";
      }} ?>
    <td bgcolor="#0080FF" align="center" style="color: white">2<br><input type="radio" name="day" value="2"></td>
    </tr>
    <tr>
      <td colspan="10"><a style="margin: 10px"></td>
    </tr>
    <tr>
    <?php for($j=$soday;$j>=1;$j--){ ?>
    <td align="center"<?php if(!in_array($j, $mangdayghe3)){ echo "style='background-color:#04B45F;color:white'"; }else{
      echo "style='background-color:#FA5858;color:white'";
    } ?>><?php 
    echo $j."</br>";
    if(!in_array($j, $mangdayghe3)){?>
    <input type="checkbox" name="ghe[]" value="<?php echo $j; ?>"></td>
    <?php }else{
      echo "FULL";
      }} ?>
    <td align="center"></td>
    <td bgcolor="#0080FF" align="center" style="color: white">3<br><input type="radio" name="day" value="3"></td>
    </tr>
    <tr>
    <?php for($j=$soday;$j>=1;$j--){ ?>
    <td align="center"<?php if(!in_array($j, $mangdayghe4)){ echo "style='background-color:#04B45F;color:white'"; }else{
      echo "style='background-color:#FA5858;color:white'";
    } ?>><?php 
    echo $j."</br>";
    if(!in_array($j, $mangdayghe4)){?>
    <input type="checkbox" name="ghe[]" value="<?php echo $j; ?>"></td>
    <?php }else{
      echo "FULL";
      }} ?>
    <td align="center">Cửa</td>
    <td bgcolor="#0080FF" align="center" style="color: white">4<br><input type="radio" name="day" value="4"></td>
    </tr>
  </table>
</div>
<?php
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$hanhkhach = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div style="margin: 0 150px"><hr></div>
<?php
$errors=array();
if(isset($_POST['btnThanhtoan'])){
  if(isset($_GET['soluongve'])){
    echo $_POST['slve'];  
  }
  if(empty($_POST['day'])){
    $errors[]="Vui Lòng Chọn Dãy Ghế";
  }
  if(empty($_POST['ghe'])){
    $errors[]="Vui Lòng Chọn Số Ghế";
  }
  foreach ($errors as $error) { ?>
    <div style="background-color: pink;color: red"><?php echo $error."</br>"; ?></div>
  <?php }
  if(empty($errors)){
    $ok=$_POST['ghe'];
    foreach ($ok as $ok) {
    if(isset($_POST['slve'])){
    $vitri=$_POST['day'].$ok;
    $data1=array(
      'TenHanhKhach' => $_POST['txtName'],
      'Phone' => $_POST['txtPhone'],
      'Email' => $_POST['txtEmail'],
      'Soluong' => $_POST['slve'],
      'Diemdi' => $_POST['diemdi'],
      'Giodi' => $_POST['giodi'],
      'Diemden' => $_POST['diemden'],
      'Gioden' => $_POST['gioden'],
      'Giave' => $_POST['gia'],
      'Vitri'=>$vitri
      );
  $stmt = $conn->prepare("INSERT INTO donhang(TenHanhKhach,Phone,Email,Soluong,Diemdi,Giodi,Diemden,Gioden,Giave,Vitri) VALUES (:TenHanhKhach,:Phone,:Email,:Soluong,:Diemdi,:Giodi,:Diemden,:Gioden,:Giave,:Vitri)");
            $stmt->bindParam(":TenHanhKhach",$_POST['txtName'],PDO::PARAM_STR);
            $stmt->bindParam(":Phone",$_POST['txtPhone'],PDO::PARAM_INT);
            $stmt->bindParam(":Email",$_POST['txtEmail'],PDO::PARAM_STR);
            $stmt->bindParam(":Soluong",$_POST['slve'],PDO::PARAM_INT);
            $stmt->bindParam(":Diemdi",$_POST['diemdi'],PDO::PARAM_STR);
            $stmt->bindParam(":Giodi",$_POST['giodi'],PDO::PARAM_STR);
            $stmt->bindParam(":Diemden",$_POST['diemden'],PDO::PARAM_STR);
            $stmt->bindParam(":Gioden",$_POST['gioden'],PDO::PARAM_STR);
            $stmt->bindParam(":Giave",$_POST['gia'],PDO::PARAM_INT);
            $stmt->bindParam(":Vitri",$vitri,PDO::PARAM_STR);
            $stmt->execute();
            $idget1=$_GET['idget'];
      $stmt=$conn->prepare("SELECT Chotrong FROM chuyenxe WHERE id=$idget1");
      $stmt->execute();
      $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
      $conlai=$data2['Chotrong']-1;
      $_SESSION['Chotrong']=$conlai;
      $stmt=$conn->prepare("UPDATE chuyenxe SET Chotrong=$conlai WHERE id=$idget1");
      $stmt->bindParam(":Chotrong",$conlai,PDO::PARAM_INT);
      $stmt->execute();
      $dem=0;
$stmt=$conn->prepare("SELECT * FROM donhang");
$stmt->execute();
$data5 = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data5 as $key => $value5) {
        if($value5['Email']==$_SESSION['user']){
          $dem++;
        }
      }$_SESSION['so']=$dem;
      ?>
<div style="background: white;border: 2px solid #E0E6F8;padding: 10px 0px;position: absolute;top: 220px;left: 400px"><div style="border-bottom: 1px solid #E0E6F8;padding-bottom: 10px"><h2 align="center">Thông Báo</h2></div>
<form action="index.php">
  <table style="border: none;width: 200px;">
    <tr>
      <td align="center"><div style="margin-top: 50px">Thanh Toán Thành Công !!!<br><br>Chúng Tôi Sẽ Liên Hệ Lại Trong Thời Gian Sớm Nhất</div></td>
    </tr>
    <tr>
      <td align="center"><button id="Okdn" type="submit" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">OK</button></td>
    </tr>
  </table>
</form>
</div>
<?php
    
}
}
}
}
?>
<input type="text" name="diemden" value="<?php echo $_GET['diemden']; ?>" hidden>
    <input type="text" name="diemdi" value="<?php echo $_GET['diemdi']; ?>" hidden>
    <input type="text" name="tenxe" value="<?php echo $_GET['tenxe']; ?>" hidden>
    <input type="text" name="giodi" value="<?php echo $_GET['giodi']; ?>" hidden>
    <input type="text" name="gioden" value="<?php echo $_GET['gioden']; ?>" hidden>
    <input type="text" name="soluong" value="<?php echo $_GET['soluong']; ?>" hidden>
    <input type="text" name="chotrong" value="<?php echo $_GET['chotrong']; ?>" hidden>
    <input type="text" name="gia" value="<?php echo $_GET['gia']; ?>" hidden>
    <input type="text" name="tgd" value="<?php echo $_GET['tgd']; ?>" hidden>
<table style="border: none;width: 950px">
<?php foreach ($hanhkhach as $hk) {
  if($hk['Username']==$_SESSION['user']){
?>
  <tr>
    <td>Họ Tên Hành Khách</td>
    <td colspan="2"><?php echo $hk['TenTV']; ?><input type="text" name="txtName" value="<?php echo $hk['TenTV']; ?>" hidden></td>
    <td rowspan="4"><button type="submit" name="btnThanhtoan" style="color: white;width: 100px;height: 30px;font-weight: bolder;">Thanh Toán</button></td>
  </tr>
  <tr>
    <td>Số Điện Thoại</td>
    <td colspan="6"><?php echo "0".$hk['Phone']; ?><input type="text" name="txtPhone" value="<?php echo $hk['Phone']; ?>" hidden></td>
  </tr>
  <tr>
    <td>Email</td>
    <td colspan="6"><?php echo $hk['Email']; ?><input type="text" name="txtEmail" value="<?php echo $hk['Email']; ?>" hidden></td>
  </tr>  
<?php } } ?>
</table>
</form>
