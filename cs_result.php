<?php
if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名

}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}

// ログイン中のユーザ($uid)の決定状況を検索する
$sql = "SELECT * FROM tb_decide natural join tb_course WHERE uid = '$uid';";
//テーブル作成後、変更あるえる
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs) ;
if (!$rs){
	echo 'データがありません。';
	die ('エラー: ' . mysql_error());
}else{
echo '<div class="row">
<div class="bg-warning">
	<h1>決定結果</h1>
	<h1 class="text-center">';
	if($row){
		echo '<small>おめでとうございます!<br>あなたは</small>'.$row['cname'].'<small>に決定しました。</small>';
	}else{
		echo '<small>あなたは</small>コース未決定<small>です。</small>';
	}
	echo '</h1></div></div>';
}
?>