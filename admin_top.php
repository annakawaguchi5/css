<?php
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');
//require_once('db_inc.php');  //データベース接続
?>

<div
	class="container">
	<!-- 更新情報 -->
	<div class="bg-danger">
	<?php
		include('receive_info.php');
	?>
	</div>

	<!-- 4グリッドを割り当て -->
	<div class="col-xs-4">

		<!-- 年度の新規作成 -->
	<?php
	include('new_year.php');
	?>
		<br>


		<!-- 年度一覧 -->
		<?php
		$sql = "select * from tb_course GROUP BY year ORDER BY year DESC";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		echo '<div class="panel panel-info">
				<div class="panel-heading">
					年度一覧
				</div>
				<div class="list-group">';
		while($row){
			echo '<a class="list-group-item" href="index.php?year='.$row['year'].'">'.$row['year'].'年度</a>';
			$row = mysql_fetch_array($rs) ;
		}
		echo '</div></div>';
		?>

		<!-- 通知作成 -->
		<?php //include("info.php");?>

	</div>
	<!-- 4グリッド終わり -->

	<!-- 8グリッドを割り当て -->
	<!-- 年度詳細 -->
	<div class="col-xs-8">
	<?php
	if(isset($_GET['year'])){
		$dispyear = $_GET['year'];
	}else{
		//最新年を検索
		$sql = "SELECT MAX(year) FROM tb_limit";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		$dispyear = $row['MAX(year)'];
	}
	echo '<h1>'.$dispyear.'年度</h1>';

	//最新年のデータを表示
	$sql = "SELECT * FROM tb_user NATURAL JOIN tb_gp WHERE year=".$dispyear;
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;

	echo '<table border=0 class="table table-striped table-hover table-bordered">';
	echo '<tr class="info"><th>ユーザID</th><th>氏名</th><th>前期修得単位数</th><th>前期GPA</th><th>後期修得単位数</th><th>後期GPA</th></tr>';
	while($row){
		echo '<tr>';
		echo '<td>' . $row['uid'] . '</td>';
		echo '<td>' . $row['uname'] . '</td>';
		echo '<td>' . $row['halfgp'] . '</td>';
		echo '<td>' . $row['halfgpa'] . '</td>';
		echo '<td>' . $row['allgp'] . '</td>';
		echo '<td>' . $row['allgpa'] . '</td>';
		echo '</tr>';
		$row = mysql_fetch_array($rs);
	}
	?>

	</div>
	<!-- 8グリッド終わり -->
</div>

