<?php include('page_header.php');
include_once('db_inc.php');

$urole=$_POST['$urole'];
$uid=$_POST['gakuseki'];
$uname=$_POST['name'];



/*
 $sql ="select uid from passwd_info where uid='$uid'";
 $rs = mysql_query( $sql, $conn );
 if (!$rs) die ('エラー: ' . mysql_error());
 $row = mysql_fetch_array($rs) ;
 */
if($urole=="" || $uid=="" || $uname==""){
	echo "ユーザ種別、ユーザID、名前を記入してください。".'<br>';
	echo '<h4><a href="passwd_info.php">戻る</a></h4>';
}else{
	$sql ="insert into passwd_info(uid, uname, urole, timestamp, reset) values ('$uid','$uname',$urole,now(), 0)";
	$res = mysql_query( $sql, $conn );
	if (!$res) {
		echo "送信に失敗しました。";
		die('エラー: ' . mysql_error());
	}else{
		echo "送信しました。";
	}






	echo '<h4><a href="login.php">戻る</a></h4>';
}


include('page_footer.php');
?>