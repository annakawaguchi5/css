<?php
include('page_header.php');
include_once('db_inc.php');

if(isset($_GET['year'])){
	$year=$_GET['year'];
}

$sql = "SELECT * FROM tb_limit WHERE year='$year'";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$stime=$row['stime'];
$ltime=$row['ltime'];
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
				<td><?php include('coursechange.php');?></td>
			</tr>
		</table>
		<input type="hidden" name="act" value="upload"> <input type="submit"
			value="登録" />
	</form>
</div>


							<?php include('page_footer.php');?>