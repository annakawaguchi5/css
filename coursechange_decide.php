<?php
include('page_header.php');
include_once('db_inc.php');

$year=2016;//どこからか受け取る


if(isset($_POST['コース名'])){
	$course=$_POST['コース名'];
	$gp=$_POST['単位数'];
	$gpa=$_POST['GPA'];
	$detail=$_POST['コース説明'];
	$youken=$_POST['要件'];
	if($youken=="要件なし"){
		$youken=1;
		$gp=NULL;
		$gpa=NULL;
	}else if($youken=="要件あり"){
		$youken=2;
	}

	$sql ="UPDATE sample_course SET year='$year', cid='$youken', cname='$course', detail='$detail', gp='$gp', gpa='$gpa' WHERE cid='$youken'" ;
	$res = mysql_query( $sql, $conn );

}


if(isset($_POST['コース名1'])){
	$course1=$_POST['コース名1'];
	$gp1=$_POST['単位数1'];
	$gpa1=$_POST['GPA1'];
	$detail1=$_POST['コース説明1'];
	$youken1=$_POST['要件1'];
	if($youken1=="要件なし"){
		$youken1=1;
		$gp1=NULL;
		$gpa1=NULL;
	}else if($youken=="要件あり"){
		$youken1=2;
	}

	$sql ="UPDATE sample_course SET year='$year', cid='$youken1', cname='$course1', detail='$detail1', gp='$gp1', gpa='$gpa1' WHERE cid='$youken1'";
	$res = mysql_query( $sql, $conn );

}


	if (!$res) {
		echo "決定に失敗しました。";
		die('エラー: ' . mysql_error());
	}else{

		echo "決定しました。";
	}
include('page_footer.php');
?>