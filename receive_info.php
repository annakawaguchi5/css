<?php
/*
require_once('db_inc.php');  //データベース接続
include 'page_header.php';
*/
?>

<?php
if(isset($_SESSION['urole'])){
	$urole=$_SESSION['urole'];
/*
	$sql = "SELECT * FROM tb_info WHERE irole LIKE '%".$urole."%' ORDER BY time";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs);
	while($row){
	echo $row['time']." ".$row['title'];
	}*/
}else{
	die('この機能は使用できません!');
}
	?>

	<?php
				 include('admin_top.php');
				 include('page_footer.php');
				 ?>