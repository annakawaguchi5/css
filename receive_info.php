<h1>お知らせ</h1>

<?php
if(isset($_SESSION['urole'])){
	$urole=$_SESSION['urole'];
	$year=$_SESSION['year'];
	if($urole==1){
		$where="AND iyear=".$year;
	}else{
		$where="";
	}


	$sql = "SELECT * FROM tb_info WHERE irole LIKE '%".$urole."%' ".$where." GROUP BY time ORDER BY time";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs);
	if($row!=null){
		while($row){
			echo $row['time']." ".$row['title'].'<br>';
			$row = mysql_fetch_array($rs);
		}
	}else{
		echo '新着情報はありません。';
	}
}else{
	die('この機能は使用できません!');
}
?>