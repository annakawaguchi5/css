<?php include('page_header.php');
include_once('db_inc.php');

	$year=$_POST['year'];
	$urole=$_POST['urole'];
	$goiken=$_POST['body'];

	$sql ="insert into goiken_info(year, urole, note, timestamp) values ('$year','$urole','$goiken',now())";

	$res = mysql_query( $sql, $conn );




	if (!$res) {
		echo "送信に失敗しました。";
		die('エラー: ' . mysql_error());
	}else{

		echo "送信しました。";
	}
?>
