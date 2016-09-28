<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>
<div class="container">
<!-- 4グリッドを割り当て -->
	<div class="col-xs-4">

		<!-- 年度の新規作成 -->

	<a href="new_year.php"><button class="btn btn-danger btn-block btn-lg" id="new">新規作成</button></a>
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
			echo '<a class="list-group-item" href="year.php?year='.$row['year'].'">'.$row['year'].'年度</a>';
			$row = mysql_fetch_array($rs) ;
		}
		echo '</div></div>';
		?>
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

	echo '<FORM method="POST" action="change_do.php" id="list">';
	echo '<div class="table-responsive">';
	echo '<table border=0 class="table table-striped table-hover table-bordered">';
	echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th>
	<th>前期修得単位数</th><th>前期GPA</th>
	<th>後期修得単位数</th><th>後期GPA</th></tr>';
	while($row){
		echo '<tr>';
		echo '<td>' . '<input type="checkbox" name="students[]" value="'.$row['uid'].'">' . '</td>';
		echo '<td>' . $row['uid'] . '</td>';
		echo '<td>' . $row['uname'] . '</td>';
		echo '<td>' . $row['halfgp'] . '</td>';
		echo '<td>' . $row['halfgpa'] . '</td>';
		echo '<td>' . $row['allgp'] . '</td>';
		echo '<td>' . $row['allgpa'] . '</td>';
		echo '</tr>';
		$row = mysql_fetch_array($rs);
	}

	include ('buttons.php');	//右下固定ボタン(削除、変更)
	?>
	</div>
</div>
<!-- 8グリッド終わり -->

<?php
include('page_footer.php');
?>