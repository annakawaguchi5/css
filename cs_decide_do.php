<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=3 ) {
	// 教員としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
}else {
	 $uid  = $_GET['uid']; //uidを$uidに代入
	if (isset($_POST['cid'])){
		 $cid  = $_POST['cid'] ;//送信されたcidを受け取り、$cidに代入
		 $uname = $_POST['uname'];
		 $act  = $_POST['act'] ;//送信されたactを受け取り、$actに代入
		if ($act == 'insert'){//新規登録の場合
			$sql = "INSERT INTO tb_decide VALUES('$uid','$uname','$cid')";
			echo "<h2>登録しました</h2>";
		}else{//再登録の場合
			$sql = "UPDATE tb_decide SET uid='$uid', uname='$uname', cid='$cid' WHERE uid='$uid'";
			echo "<h2>更新しました</h2>";
		}
		$rs = mysql_query($sql, $conn); //SQL文を実行
		if (!$rs){
			echo "<h2>登録が失敗しました</h2>";
			echo mysql_error();
		}else{
			//header('cs_decide.php');
		}
	}else{ //エラーを表示
		echo '<h2>エラー：希望コースが決定されていません</h2>';
		echo '<p><a href="cs_decide.php">戻る</a>';
	}
}
include('page_footer.php');
?>
