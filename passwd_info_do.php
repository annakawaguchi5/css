<?php include('page_header.php');
include_once('db_inc.php');

$uid=$_POST['gakuseki'];
$uname=$_POST['name'];



$sql ="select uid from passwd_info where uid='$uid'";
$rs = mysql_query( $sql, $conn );
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

if($uid=="" || $uname==""){
	echo "学籍番号、名前を記入してください。".'<br>';
	echo '<h4><a href="passwd_info.php">戻る</a></h4>';
}else{


	if($uid==$row['uid']){
		$sql ="UPDATE passwd_info SET  uname='$uname',  timestamp=now() WHERE uid='$uid'";
		$res = mysql_query( $sql, $conn );
		if (!$res) {
			echo "送信に失敗しました。";
			die('エラー: ' . mysql_error());
		}else{
			echo "送信しました。";
		}
	}else {

		$sql ="insert into passwd_info(uid, uname, timestamp) values ('$uid','$uname',now())";
		$res = mysql_query( $sql, $conn );
		if (!$res) {
			echo "送信に失敗しました。";
			die('エラー: ' . mysql_error());
		}else{
			echo "送信しました。";
		}

	}




echo '<h4><a href="login.php">戻る</a></h4>';
}


include('page_footer.php');
?>