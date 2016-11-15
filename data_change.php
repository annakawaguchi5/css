<?php
include('page_header.php');
include_once('db_inc.php');

if(isset($_GET['year'])){
	$year=$_GET['year'];
}

$sql = "SELECT * FROM tb_limit NATURAL JOIN tb_course WHERE year=$year";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

$stime=$row['stime'];
$ltime=$row['ltime'];
while($row){
if($row['cid']==2){
	$cid1=$row['cid'];
	$cname1=$row['cname'];
	$gp1=$row['gp'];
	$gpa1=$row['gpa'];
	$detail1=$row['detail'];
}else{
	$cid2=$row['cid'];
	$cname2=$row['cname'];
	$gp2="";
	$gpa2="";
	$detail2=$row['detail'];
}
$row = mysql_fetch_array($rs) ;
}
?>

<div class="container" id="datachange" title="データ編集">
	<form class="form-horizontal" action="upload.php" method="post"
		onSubmit="return check(this)" enctype="multipart/form-data"
		name="datachange">
		<table id="form1" class="table table-bordered">
			<tr>
				<td class="header info">年度</td>
				<td><?php echo $year;?></td>
				<?php 	echo '<input type="hidden" name="year" value="'.$year.'">';?>
			</tr>
			<tr>
				<td class="header info">調査開始時刻</td>
				<td>
					<div class='input-group date' id='stime'>
						<span class="input-group-addon"> <span
							class="glyphicon glyphicon-calendar"></span> </span>
							<?php echo '<input
							type="text" class="form-control" name="stime" value="'.$stime.'"/>';?>
					</div>
				</td>
			</tr>
			<tr>
				<td class="header info">調査終了時刻</td>
				<td>
					<div class='input-group date' id='ltime'>
						<span class="input-group-addon"> <span
							class="glyphicon glyphicon-calendar"></span> </span>
							<?php echo '<input
							type="text" class="form-control" name="ltime" value="'.$ltime.'"/>';?>
					</div>
				</td>
			</tr>

			<tr>
				<td class="header info">コース</td>
				<td><?php //include('coursechange.php');//コース数変更?>
					<div class="course1">
					<div class="col-xs-2"><label>コース名</label></div>
					<div class="col-xs-10"><?php echo'<input type="text" class="form-control" name="cname1" value="'.$cname1.'">';?></div><br>
						単位数<?php echo '<input type="text" class="form-control" name="gp1" value="'.$gp1.'">';?>以上
							GPA<?php echo '<input type="text" class="form-control" name="gpa1" value="'.$gpa1.'">';?>以上<br>
						コース説明<br>
						<?php echo '<textarea rows="2" class="form-control" name="detail1" value="'.$detail1.'">';?></textarea>
					</div>
					<div class="course2">
					<div class="col-xs-2"><label>コース名</label></div>
					<div class="col-xs-10"><?php echo'<input type="text" class="form-control" name="cname2" value="'.$cname2.'">';?></div><br>
						単位数<?php echo '<input type="text" class="form-control" name="gp2" value="'.$gp2.'">';?>以上
							GPA<?php echo '<input type="text" class="form-control" name="gpa2" value="'.$gpa2.'">';?>以上<br>
						コース説明<br>
						<?php echo '<textarea rows="2" class="form-control" name="detail2" value="'.$detail2.'">';?></textarea>
					</div>
				</td>
			</tr>
		</table>
		<input type="hidden" name="act" value="upload"> <input type="submit"
			value="登録" />
	</form>
</div>


							<?php include('page_footer.php');?>