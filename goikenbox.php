<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<?php
		//問い合わせを検索
		$sql = "SELECT * FROM goiken_info";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;

		while($row){
			echo $row['timestamp'].' '.$row['note'].'<br>';
			$row = mysql_fetch_array($rs);
		}

		?>
<?php
include('page_footer.php');
?>