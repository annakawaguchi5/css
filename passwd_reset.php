<?php
//include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
session_start();

if($_SESSION['urole']==9 && isset($_POST['pwchange'])){
	$uid=$_POST['pwchange'];





	foreach($uid as  $u){

		//パスワード変更
		$sql = "UPDATE tb_user SET upass='abcd' WHERE uid='$u'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());

		//変更済に更新
		$sql = "UPDATE passwd_info SET reset=1 WHERE uid='$u'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
	}

	header("Location:passwd_box.php");
}
include('page_footer.php');
?>