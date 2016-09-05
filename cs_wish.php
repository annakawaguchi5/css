<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
	echo '<h2>コース希望登録</h2>';
}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}
$courses = array(
1=>'情報技術応用コース',
2=>'情報科学総合コース'
);
//変数の初期化
$cid = 1;         //希望のコースID;
$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;

//コース決定済みでないかチェック
$sql = "select * from tb_entry where uid='$uid' not in(select uid from tb_decide)";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

if($row==null){
	// ログイン中のユーザ($uid)の希望状況を検索する
	$sql = "select * from tb_entry where uid = '$uid';";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;

	if ($row) {
		$cid = $row['cid']; // 現在登録しているコースのID
		$act = 'update';    // すでに登録したため「再登録」とする
	}
	echo '<form class="form-horizontal container" action="cs_wish_save.php" method="post">';
	echo '<input type="hidden" name="act" value="'.  $act .'">'; //非表示送信

		foreach ($courses as $id => $name ){
			if ($id == $cid){  //登録状況を反映したラジオボタンを作成
				echo '<input type="radio" name="cid" value="'.$id.'" checked>'.$name.'<br>';
			}else if($id != $cid){
				echo '<input type="radio" name="cid" value="'.$id.'">'.$name.'<br>';
			}
		}

	echo '<div class="form-group">';
	echo '<label for="note" class="text-danger">興味のある研究分野や自己アピール:</label>';
	echo '<textarea class="form-control" name ="note"></textarea>';
	echo '</div></h3>';

	echo '<button type="submit" class="btn btn-default col-sm-offset-1">送信</button>';
	echo '</form>';
}else{
	echo 'コースが決定しているため、この機能は利用できません。</h3>';
}

include('page_footer.php');//画面出力終了
?>
