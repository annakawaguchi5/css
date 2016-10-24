<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<style>
.indent {
	margin-left: -40px
}

#tab li {
	float: left;
	padding: 10px;
	list-style: none;
	cursor: pointer;
	background: aliceblue;
}

#tab li.select {
	background: royalblue;
	color: white;
}

.disnon {
	display: none;
}

.content_wrap {
	padding: 1em;
	margin-left: 40px;
	clear: left;
	color: #000000;
	background-color: #ffff7f;
	clear: left;
}

#data {
	font-size: 1.3em;
	border: 3px solid #da4033;
	border-radius: 4px;
	margin: 2em 0;
	padding: 2em;
	position: relative;
}

#data::before {
	background-color: #fff;
	color: #da4033;
	content: "基本設定";
	font-weight: bolder;
	left: 1em;
	padding: 0 .5em;
	position: absolute;
	top: -1em;
}

#user {
	font-size: 1.3em;
	border: 3px solid #00479D;
	border-radius: 4px;
	margin: 2em 0;
	padding: 2em;
	position: relative;
}

#user::before {
	background-color: #fff;
	color: #00479D;
	content: "ユーザ情報";
	font-weight: bolder;
	left: 1em;
	padding: 0 .5em;
	position: absolute;
	top: -1em;
}
</style>

<script type="text/javascript">
$(function() {
    $("#tab li").click(function() {
        var num = $("#tab li").index(this);
        $(".content_wrap").addClass('disnon');
        $(".content_wrap").eq(num).removeClass('disnon');
        $("#tab li").removeClass('select');
        $(this).addClass('select')
    });
});
</script>

<div
	class="container">
	<!-- 3グリッドを割り当て -->
	<div class="col-xs-3">

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
	<!-- 3グリッド終わり -->


	<!-- 9グリッドを割り当て -->
	<!-- 年度詳細 -->
	<div class="col-xs-9">
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
	?>
		<div class="indent">
			<ul id="tab">
				<li class="select">基本設定</li>
				<li>ユーザ情報</li>
			</ul>
			<div class="content_wrap">
			<?php
			//コース名、調査期間を表示
			$sql = "SELECT * FROM tb_limit WHERE year=".$dispyear;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;
			?>

				<div id="data">
					<div class="row">

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
						<?php
						//変更
						echo '<a href="data_change.php?year='.$dispyear.'">';
						//echo '<input type="image" value="編集" src="./FSV001BT005_5/button05_touroku_05.jpg" alt="編集"></a>';
						echo '<button value="編集"  alt="編集">編集</button></a>';
						?>
					</div>
				</div>
			</div>


			<div class="content_wrap disnon">
				<!-- ユーザリスト -->
				<div id="user">
				<?php
				//ダウンロード
				include('export_main.php');


				//学生のデータを表示
				$sql = "SELECT * FROM tb_student WHERE year=".$dispyear;
				$rs = mysql_query($sql, $conn);
				if (!$rs) die ('エラー: ' . mysql_error());
				$row = mysql_fetch_array($rs) ;

				echo '<input type="button" src="./img/register.gif" alt="登録" value="ユーザ登録" onclick="window.open(\'importCsv.php?year='.$dispyear.'\', \'_blank\')">';

				echo '<FORM method="POST" action="user_change.php" id="list" name="list" onsubmit="return list(this)">';
				echo '<div style="height:200px; overflow-y:scroll;">';
				echo '<div class="table-responsive">';
				echo '<table border=0 class="table table-headerfixed table-condensed table-striped table-hover table-bordered">';
				echo '<thead><tr class="info"><th class="check"></th><th class="uid">ユーザID</th><th class="uname">氏名</th>
	<th class="halfgp">前期修得単位数</th><th class="halfgpa">前期GPA</th>
	<th class="allgp">年間修得単位数</th><th class="allgpa">年間GPA</th></tr></thead>';
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
				echo'</tbody>';
				include ('buttons.php');	//右下固定ボタン(削除、変更)
				echo '</table>';
				echo '</div></div>';
				echo '</form>';
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 9グリッド終わり -->

				<?php
				include('page_footer.php');
				?>