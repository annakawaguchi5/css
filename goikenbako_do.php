<?php include('page_header.php');
include_once('db_inc.php');
if(isset($_POST['urole'])){
	$year=$_POST['year'];
	$urole=$_POST['urole'];
}else{
	$year=0;
	$urole=0;
}

$goiken=$_POST['body'];

$sql ="insert into goiken_info(year, urole, note, timestamp) values ($year,$urole,'$goiken',now())";
$res = mysql_query( $sql, $conn );




if (!$res) {
	echo "送信に失敗しました。<br>";
	echo "再度、お問合せ下さい。";
	die('エラー: ' . mysql_error());
}else{

	echo "送信しました。<br>";
	echo "お問合せありがとうございました。";
}

include('page_footer.php');
?>
