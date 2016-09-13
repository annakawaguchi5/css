<?php
//require_once('db_inc.php');  //データベース接続
?>

<div
	class="container">
	<!-- 更新情報 -->
	<?php
	$sql = "select * from tb_info";	//where関数で年度指定
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs);

	//echo $row['time']." ".$row['title'];
	echo '<h1 style="text-align:center; background-color:orange;">更新情報</h1>';
	?>

	<!-- 3グリッドを割り当て -->
	<div class="col-xs-3 bg-info">

		<!-- 年度の新規作成 -->
	<?php
	include('new_year.php');
	?>
		<!-- 一覧 -->
	<?php
	/*
	 //テーブル名不明
	 $sql = "select * from ";
	 $rs = mysql_query($sql, $conn);
	 if (!$rs) die ('エラー: ' . mysql_error());
	 $row = mysql_fetch_array($rs) ;
	 */
	?>
	<h1>年度一覧</h1>
	</div>

	<!-- 9グリッドを割り当て -->
	<!-- 年度詳細 -->
	<div class="col-xs-9 bg-danger">
	<h1>ex)28年度</h1>



		<?php
		/*
		 $sql = "select * from ";
		 $rs = mysql_query($sql, $conn);
		 if (!$rs) die ('エラー: ' . mysql_error());
		 $row = mysql_fetch_array($rs) ;
		 */
		include('user_list.php');
?>

	</div>
</div>

