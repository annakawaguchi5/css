<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

echo "<h2>決定結果</h2>";

if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名

}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}

// ログイン中のユーザ($uid)の決定状況を検索する
$sql = "SELECT * FROM tb_decide WHERE uid = '$uid';";
//テーブル作成後、変更あるえる
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs) ;
if (!$rs){
	echo 'データがありません。';
	die ('エラー: ' . mysql_error());
}else{
	if($row['cid']==1){
		echo '<h2>'.$row['uname'].'さんは【応用コース】に決定しました。</h2>';
	}else if($row['cid']==2){
		echo '<h2>'.$row['uname'].'さんは【総合コース】に決定しました。</h2>';
	}else{
		echo '<h2>'.$uname.'さんは【コース未決定】です。</h2>';
}
}

	include('page_footer.php');  //画面出力終了
?>