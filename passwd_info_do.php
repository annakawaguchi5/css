<?php include('page_header.php');
include_once('db_inc.php');

	$uid=$_POST['gakuseki'];
	$uname=$_POST['name'];
	$message=$_POST['body'];

	$sql ="insert into passwd_info(uid, uname, note, timestamp) values ('$uid','$uname','$message',now())";

	$res = mysql_query( $sql, $conn );

	if (!$res) {
		echo "送信に失敗しました。";
		die('エラー: ' . mysql_error());
	}else{

		echo "送信しました。";
	}
	include('page_footer.php');
?>