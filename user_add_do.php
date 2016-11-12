<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if($_SESSION['urole']==9){
	$year=$_GET['year'];
	$uid = $_POST['uid']; //新規登録画面により送信されたユーザID
	$uname = $_POST['uname'];  //登録画面より送信されたユーザ名s
	$upass = $_POST['upass'];	//パスワード
	$urole = $_POST['urole'];	//種別
	/*
	if($_POST['halfgp']==""){
		$halfgp = "NULL";
	}else{
		$halfgp = $_POST['halfgp'];
	}
	if($_POST['halfgpa']==""){
		$halfgpa = "NULL";
	}else{
		$halfgpa = $_POST['halfgpa'];
	}
	if($_POST['allgp']==""){
		$allgp = "NULL";
	}else{
		$allgp = $_POST['allgp'];
	}
	if($_POST['allgpa']==""){
		$allgpa = "NULL";
	}else{
		$allgpa = $_POST['allgpa'];
	}
	*/
	$sql = "SELECT uid FROM tb_user WHERE uid='$uid'";
	//echo $sql;
	$rs = mysql_query($sql, $conn);
	if (!$rs)die ('エラー: ' . mysql_error());
	$row= mysql_fetch_array($rs);
	if($row || $uid==""){
		echo "ユーザIDがすでに使われています。";
		echo '<p><a href="importCsv.php">戻る</a>';
	}else{
	//$where = 'WHERE 1';
	if($urole==1){
		$sql = "INSERT INTO tb_user VALUES ('$uid', '$uname', '$upass', $urole)";//検索条件を適用したSQL文を作成
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs)die ('エラー: ' . mysql_error());

		$sql = "INSERT INTO tb_gp(year,uid) VALUES ($year, '$uid')";//検索条件を適用したSQL文を作成
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs)die ('エラー: ' . mysql_error());
	}else{
		$sql = "INSERT INTO tb_user VALUES ('$uid', '$uname', '$upass', $urole)";//検索条件を適用したSQL文を作成
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs)die ('エラー: ' . mysql_error());
	}
	/*
	 if($urole==1){
		$sql = "INSERT INTO tb_gp VALUE ($year, '$uid', $halfgp, $halfgpa, $allgp, $allgpa)";
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs)die ('エラー: ' . mysql_error());
	}
	*/
	echo "登録しました";
	echo '<p><a href="importCsv.php">戻る</a>';
	}
}else{
	echo '<h1 style="color:red">警告：あなたの権限ではこの機能を使えません。</h1>';
}


include('page_footer.php');  //画面出力終了
?>