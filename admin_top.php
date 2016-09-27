<?php
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');
?>

<div class="container">

	<!-- 更新情報 -->
	<!-- 7グリッドを割り当て -->
	<div class="col-sm-7 bg-danger">
	<?php
	include('receive_info.php');
	?>
	</div>



	<!-- 通知作成 -->
	<!-- 5グリッドを割り当て -->
	<div class="col-sm-5">
	<?php include("make_info.php");?>
	</div>
</div>
