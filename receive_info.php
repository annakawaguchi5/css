<?php
/*
 require_once('db_inc.php');  //データベース接続
 include 'page_header.php';
 */
?>

<h1>お知らせ</h1>

<?php
if(isset($_SESSION['urole'])){
	$urole=$_SESSION['urole'];

	$sql = "SELECT * FROM tb_info WHERE irole LIKE '%".$urole."%' ORDER BY time";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs);
	if($row!=null){
		while($row){
			echo $row['time']." ".$row['title'];
			$row = mysql_fetch_array($rs);
		}
	}else{
		echo '新着情報はありません。';
	}
}else{
	die('この機能は使用できません!');
}
?>

<?php
include('page_footer.php');
?>