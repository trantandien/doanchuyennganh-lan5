<?php
$chon=2;
?>
<form>
	<table>
		<tr>
			<td><input type="text" name="ten1"></td>
			<td><input type="text" name="tuoi1"></td>
			<td><input type="radio" name="chon" value="1"></td>
		</tr>
		<tr>
			<td><input type="text" name="ten2"></td>
			<td><input type="text" name="tuoi<?php echo $chon; ?>"></td>
			<td><input type="radio" name="chon" value="2"></td>
		</tr>
		<tr>
			<td><button type="submit" name="btn">Gửi</button></td>
		</tr>
	</table>
</form>
<?php
if(isset($_GET['btn'])){
	if($_GET['chon']==2){
		echo "hi";
		echo $_GET['tuoi<?php echo $chon; ?>'];
	}else{
		echo "ha";
		echo $_GET['ten1'];
	}
}
?>