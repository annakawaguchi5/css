<?php include('page_header.php');
include_once('db_inc.php');
?>

<!-- 年度指定をどうするか -->


<?php
$title = $_POST['title'];
$message = $_POST['message'];
$urole = $_POST['urole'];
$year = $_POST['year'];

//var_dump($urole);
//var_dump($year);

$irole = "";
$dispr="";
$dispy="";

$r=array(
	1=>'学生',
	2=>'教員(権限なし)',
	3=>'教員(権限あり)',
	9=>'管理者'
);

	foreach($urole as $u){
		$irole=$irole.$u;
		$dispr=$dispr.$r[$u].', ';
	}
	//echo $dispr;
	foreach($year as $y){
$sql ='insert into tb_info values ("'.$title.'", "'.$message.'", '.$irole.', '.$y.', now())';
//echo $sql;
$rs = mysql_query($sql, $conn);
$dispy.=$y.', ';

if (!$rs) {
	echo "送信に失敗しました。";
	die('エラー: ' . mysql_error());
	//autoLink();
}


	//echo "メッセージ：" . $message;
	//autoLink();

}
echo "以下の情報を送信しました。<br>";
echo "年度：<br>".$dispy."<br>";
echo "宛先：<br>".$dispr."<br>";
	echo "タイトル：" . $title."<br>";
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
