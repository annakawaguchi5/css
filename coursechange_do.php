<?php include('page_header.php');
include_once('db_inc.php');

	echo $course=$_POST['course'];
	echo $detail=$_POST['detail'];
	echo $goiken=$_POST['body'];

	$sql ="insert into goiken_info(note,timestamp) value('$goiken',now())";

	$res = mysql_query( $sql, $conn );




	if (!$res) {
		echo "送信に失敗しました。";
		die('エラー: ' . mysql_error());
	}else{

		echo "送信しました。";
	}
?>
