<?php include('page_header.php');
include_once('db_inc.php');
?>

<!-- 年度指定をどうするか -->


<?php
$title = $_POST['title'];
$message = $_POST['message'];
$urole = $_POST['urole'];
$year = $_POST['year'];

var_dump($urole);
var_dump($year);

$irole = "";

	foreach($urole as $u){
		$irole=$irole.$u;
	}
	foreach($year as $y){
$sql ='insert into tb_info values ("'.$title.'", "'.$message.'", '.$irole.', '.$y.', now())';
echo $sql;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());

if (!$rs) {
	echo "送信に失敗しました。";
	die('エラー: ' . mysql_error());
	//autoLink();
}else{

	echo "以下の情報を送信しました。";
	echo "タイトル：" . $title;
	echo "メッセージ：" . $message;
	//autoLink();
}
}
/*
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());



if (!$rs) {
	echo "送信に失敗しました。";
	die('エラー: ' . mysql_error());
	//autoLink();
}else{

	echo "以下の情報を送信しました。";
	echo "タイトル：" . $title;
	echo "メッセージ：" . $message;
	//autoLink();
}*/
include_once('page_footer.php');
?>
