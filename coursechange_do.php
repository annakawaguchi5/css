<?php include('page_header.php');

if(isset($_GET['year'])){	//更新
	$year=$_GET['year'];
	$act="update";
}else if(isset($_POST['year'])){	//新規作成
	$year=$_POST['year'];
	$stime=$_POST['stime'];
	$ltime=$_POST['ltime'];
	$act=$_POST['act'];
}
if(isset($_POST['list6_0_0'])){
	$course=$_POST['list6_0_0'];
	$gp=$_POST['list6_1_0'];
	$gpa=$_POST['list6_2_0'];
	$detail=$_POST['list6_3_0'];
	$cid=1;
}else{
	echo "記入されていません";
}
if(isset($_POST['list6_0_1'])){
	$course1=$_POST['list6_0_1'];
	$gp1=$_POST['list6_1_1'];
	$gpa1=$_POST['list6_2_1'];
	$detail1=$_POST['list6_3_1'];
	$cid1=2;
}

?>

<style>
.button_wall {
	text-align: center;
}
</style>

<div class="container">
	<h1>内容確認</h1>
	<h3>基本情報</h3>
	<FORM method="POST" action="upload.php">
	<?php


	echo '<input type="hidden" name="year" value="'.$year.'">';
	echo '<input type="hidden" name="stime" value="'.$stime.'">';
	echo '<input type="hidden" name="ltime" value="'.$ltime.'">';

	echo '<input type="hidden" name="cid" value="'.$cid.'">';
	echo '<input type="hidden" name="cid1" value="'.$cid1.'">';

	echo '<input type="hidden" name="act" value="'.$act.'">';
	?>
		<table class="table table-bordered" width="100%">
			<thead>
				<tr class="active info">
					<th width="30%">項目</th>
					<th width="70%">内容</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>年度</td>
					<td><?php echo $year; ?></td>
				</tr>
				<input type="hidden" name="year" value="<?php echo $year; ?>">
				<tr>
					<td>調査開始時刻</td>
					<td><?php echo $stime; ?></td>
				</tr>
				<input type="hidden" name="stime" value="<?php echo $stime; ?>">
				<tr>
					<td>調査終了時刻</td>
					<td><?php echo $ltime; ?></td>
				</tr>
				<input type="hidden" name="ltime" value="<?php echo $ltime; ?>">
			</tbody>
		</table>


		<h3>コース情報</h3>
		<?php
		if(isset($_POST['list6_0_0'])){ ?>
		<table class="table table-bordered" width="100%">
			<thead>
				<tr class="active success">
					<th width="30%">項目</th>
					<th width="70%">内容</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>コース名</td>
					<td><?php echo $course; ?></td>
				</tr>
				<input type="hidden" name="コース名" value="<?php echo $course; ?>">

				<tr>
					<td>単位数</td>
					<td><?php echo $gp; ?></td>
				</tr>
				<input type="hidden" name="単位数" value="<?php echo $gp; ?>">

				<tr>
					<td>GPA</td>
					<td><?php echo $gpa; ?></td>
				</tr>
				<input type="hidden" name="GPA" value="<?php echo $gpa; ?>">

				<tr>
					<td>コース説明</td>
					<td><?php echo $detail; ?></td>
				</tr>
				<input type="hidden" name="コース説明" value="<?php echo $detail; ?>">
			</tbody>
		</table>

		<?php }?>
		<?php if(isset($_POST['list6_0_1'])){?>
		<table class="table table-bordered" width="100%">
			<thead>
				<tr class="active success">
					<th width="30%">項目</th>
					<th width="70%">内容</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>コース名</td>
					<td><?php echo $course1; ?></td>
				</tr>
				<input type="hidden" name="コース名1" value="<?php echo $course1; ?>">

				<tr>
					<td>単位数</td>
					<td><?php echo $gp1; ?></td>
				</tr>
				<input type="hidden" name="単位数1" value="<?php echo $gp1; ?>">

				<tr>
					<td>GPA</td>
					<td><?php echo $gpa1; ?></td>
				</tr>
				<input type="hidden" name="GPA1" value="<?php echo $gpa1; ?>">

				<tr>
					<td>コース説明</td>
					<td><?php echo $detail1; ?></td>
				</tr>
				<input type="hidden" name="コース説明1" value="<?php echo $detail1; ?>">
			</tbody>
		</table>
		<?php }?>
		<p>以上が記入された内容となります。</p>
		<p>全て記入されており、正しければ決定を押してください。</p>
		<div class="button_wall">
			<input type="submit" value="決定する">
		</div>
	</FORM>
</div>

		<?php include('page_footer.php');?>