<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<div class="container">
	<h1>パスワード変更届</h1>
	<?php
	//問い合わせを検索
	$sql = "SELECT * FROM passwd_info WHERE reset=0 ORDER BY timestamp DESC";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	?>
	<FORM action="passwd_reset.php" method="post">
	<table class="table  table-striped">
		<tr class="info">
		<th></th>
			<th>時間</th>
			<th>学籍番号</th>
			<th>氏名</th>
		</tr>
		<?php
		while($row){

			echo '<tr><th><input type="checkbox" name="pwchange[]" value="'.$row['uid'].'">
			<th>'.$row['timestamp'].'</th>
			<th>'.$row['uid'].'</th>
			<th>'.$row['uname'].'</th></tr>';
			$row = mysql_fetch_array($rs);

		}
		echo '</table>';
		?>
		<input type="submit">
</FORM>
		</div>
		<?php
		include('page_footer.php');
?>