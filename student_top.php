<?php
require_once('db_inc.php');  //データベース接続
if ( isset($_SESSION['uid'])) {	//uidを取得
	$uid = $_SESSION['uid'];
	?>

<div class="container">

	<!-- コース決定情報 -->
<?php
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y-m-d H:i:s');

include('cs_result.php');?>

	<div class="row">

		<!-- 5グリッドを割り当て -->

		<div class="col-sm-5 bg-info">
			<!-- お知らせ -->
			<!-- <h1>お知らせ</h1>
			2016.09.13 成績情報をアップロードしました。<br> 2016.09.10 2016年度のコース希望調査システムを開設しました。
		-->
		<?php include('receive_info.php')?>
		</div>



		<!-- 7グリッドを割り当て -->

		<div class="col-sm-7 bg-danger">
			<!-- 成績情報 -->
		<?php
		include('cs_grade.php');}
		?>



		</div>


	</div>
</div>
