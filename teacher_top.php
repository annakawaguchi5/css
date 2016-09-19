<?php
require_once('db_inc.php');  //データベース接続
if ( isset($_SESSION['uid'])) {	//uidを取得
	$uid = $_SESSION['uid'];
}
	?>

<div class="container">

	<!-- お知らせ -->
	<div class="row bg-success">
		<h1>お知らせ</h1>
		2016.09.13 成績情報をアップロードしました。<br> 2016.09.10 2016年度のコース希望調査システムを開設しました。
	</div>


	<div class="row bg-danger">
		<!-- 希望・未提出集計 -->
	<?php include ('cs_summary.php');?>
	</div>
</div>
