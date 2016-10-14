<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<?php
		//問い合わせを検索
		$sql = "SELECT * FROM passwd_info";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		?>
		<table class="table  table-striped" >
		 <tr class="info"><th>時間</th><th>学籍番号</th><th>氏名</th></tr>
		<?php
		while($row){

			echo '<tr><th>'.$row['timestamp'].'</th><th>'.$row['uid'].'</th><th>'.$row['uname'].'</th>';
			$row = mysql_fetch_array($rs);

		}
		echo '</table>';


		?>
<?php
include('page_footer.php');
?>