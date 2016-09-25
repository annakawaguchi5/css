<?php
require_once('db_inc.php');  //データベース接続
if ( isset($_SESSION['uid'])) {	//uidを取得
	$uid = $_SESSION['uid'];
}
	?>

<div class="container">

	<!-- お知らせ -->
	<div class="row bg-success">
			<?php
		include('receive_info.php');
	?>
	</div>


	<div class="row bg-danger">
		<!-- 希望・未提出集計 -->
	<?php include ('cs_summary.php');?>
	</div>
</div>
