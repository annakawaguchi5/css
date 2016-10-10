<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

$uid = $_POST['uid']; //新規登録画面により送信されたユーザID
$uname = $_POST['uname'];  //登録画面より送信されたユーザ名
$pass = $_POST['pass'];	//パスワード
$urole = $_POST['urole'];	//種別

$where = 'WHERE 1';
$sql = "insert into tb_user values('$uid', '$uname', '$pass', $urole)";//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) {die ('エラー: ' . mysql_error());
}else{

	echo "<h2>";
	echo "ユーザID: $uid<br>";
	echo "ユーザ名: $uname<br>";
	echo "パスワード: $pass<br>";
	if($urole==1){
		echo "種別: 学生<br>";
	}else if($urole==2){
		echo "種別: 教員<br>";
	}else{
		echo "種別: 管理者<br>";
	}
	echo 'を登録しました。</h2>';
}

include('page_footer.php');  //画面出力終了
?>