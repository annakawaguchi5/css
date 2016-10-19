<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>
<!--
<style>
tbody{display:block;}
tbody{height:100px; overflow-y:scroll;}
td,th{table-layout:fixed;}
.check{width:10px;}
.uid{width:50px;}
.uname{width:50px;}
.halfgp{width:30px;}
.halfgpa{width:30px;}
.allgp{width:30px;}
.allgpa{width:30px;}
</style>
-->
<div
	class="container">
	<!-- 4グリッドを割り当て -->
	<div class="col-xs-4">

		<!-- 年度の新規作成 -->

		<a href="new_year.php"><button class="btn btn-danger btn-block btn-lg"
				id="new">新規作成</button> </a> <br>


		<!-- 年度一覧 -->
				<?php
				$sql = "select * from tb_limit GROUP BY year ORDER BY year DESC";
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

	//コース名、調査期間を表示
	//変更
	echo '<a href="data_change.php?year='.$dispyear.'">
	<input type="image" value="編集" src="./FSV001BT005_5/button05_touroku_05.jpg" alt="編集"></a>';

	$sql = "SELECT * FROM tb_limit WHERE year=".$dispyear;
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	?>
		<div class="row">

		<h3>設定</h3>

			<!-- 左6グリッド 調査時刻-->
			<div class="col-sm-6">
				調査開始時刻：
				<?php echo $row['stime'];?>
				<br> 調査終了時刻：
				<?php echo $row['ltime'];?>
			</div>
			<!-- 右6グリッド コース-->
			<div class="col-sm-6">
			<?php
			$sql = "SELECT * FROM tb_course WHERE year=".$dispyear;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;
			echo '<ul>';
			while($row){
				echo '<li>'.$row['cname'].'</li>';
				$row = mysql_fetch_array($rs) ;
			}
			echo '</ul>';
			?>
			</div>
		</div>




		<?php
		//ダウンロード
		include('export_main.php');



		//学生のデータを表示
		$sql = "SELECT * FROM tb_user NATURAL JOIN tb_gp WHERE year=".$dispyear;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;

		echo '<input type="image" src="./img/register.gif" alt="登録" onclick="window.open(\'importCsv.php?year='.$dispyear.'\', \'_blank\')">';

		echo '<FORM method="POST" action="user_change.php" id="list" name="list" onsubmit="return list(this)">';
		echo '<div style="height:100px; overflow-y:scroll;">';
		echo '<div class="table-responsive">';
		echo '<table border=0 class="table table-headerfixed table-condensed table-striped table-hover table-bordered">';
		echo '<thead><tr class="info"><th class="check"></th><th class="uid">ユーザID</th><th class="uname">氏名</th>
	<th class="halfgp">前期修得単位数</th><th class="halfgpa">前期GPA</th>
	<th class="allgp">後期修得単位数</th><th class="allgpa">後期GPA</th></tr></thead>';
		echo '<tbody>';
		while($row){

			echo '<tr>';
			echo '<td class="check"><input type="checkbox" name="students[]" value="'.$row['uid'].'"></td>';
			echo '<td class="uid">' . $row['uid'] . '</td>';
			echo '<td class="uname">' . $row['uname'] . '</td>';
			echo '<td class="halfgp">' . $row['halfgp'] . '</td>';
			echo '<td class="halfgpa">' . $row['halfgpa'] . '</td>';
			echo '<td class="allgp">' . $row['allgp'] . '</td>';
			echo '<td class="allgpa">' . $row['allgpa'] . '</td>';
			echo '</tr>';
			$row = mysql_fetch_array($rs);

		}
<<<<<<< HEAD

		include ('buttons.php');	//右下固定ボタン(削除、変更)
=======
		echo'</tbody>';
	//	include ('buttons.php');	//右下固定ボタン(削除、変更)
		echo '</table>';
		echo '</div></div>';
>>>>>>> 1eb8caa60cabc59679f300e13f1541c0a949ec67
		echo '</form>';
		?>
		<!-- 8グリッド終わり -->

		<?php
		include('page_footer.php');
?>