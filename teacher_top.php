<?php
require_once('db_inc.php');  //データベース接続
if ( isset($_SESSION['uid'])) {	//uidを取得
	$uid = $_SESSION['uid'];
}
?>

	<div class="col-sm-6">
		<!-- お知らせ -->
		<div class="row bg-danger">
		<?php
		include('receive_info.php');
		?>
		</div>

		<!-- 希望・未提出集計 -->
		<?php include ('cs_summary.php');?>
	</div>

	<!-- 通知作成 -->
	<div class="col-sm-6">
	<?php include ('make_info.php');?>
	</div>

