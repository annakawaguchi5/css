<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_POST['change'])){
	$uid = $_POST['change'];
	$uname = $_POST['uname'];
	$upass = $_POST['upass'];
	if($_POST['halfgp']==0){
		$halfgp = "NULL";
	}else{
		$halfgp = $_POST['halfgp'];
	}
	if($_POST['halfgpa']==0){
		$halfgpa = "NULL";
	}else{
		$halfgpa = $_POST['halfgpa'];
	}
	if($_POST['allgp']==0){
		$allgp = "NULL";
	}else{
		$allgp = $_POST['allgp'];
	}
	if($_POST['allgpa']==0){
		$allgpa = "NULL";
	}else{
		$allgpa = $_POST['allgpa'];
	}

	foreach( $uid as $c=>$a  ) {
			$output[] = array($uid[$c], $uname[$c],$upass[$c],$halfgp[$c],$halfgpa[$c],$allgp[$c],$allgpa[$c]);
		}
	foreach($output as $u=>$b){

		$uid=$b[0];
		$uname=$b[1];
		$upass=$b[2];
		echo $halfgp=$b[3];
		echo $halfgpa=$b[4];
		echo $allgp=$b[5];
		echo $allgpa=$b[6];

		$sql = "UPDATE tb_user NATURAL JOIN tb_gp SET uname='$uname',upass='$upass',halfgp=$halfgp,halfgpa=$halfgpa,allgp=$allgp,allgpa=$allgpa WHERE uid='$uid'";
		echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());


		echo '<h2>' . $uid . '</h2>';
	}
	echo '<h2>の情報を変更しました。</h2>';
	echo '<a href="year.php">戻る</a>';
}else{
	echo '<h2>変更するユーザIDが与えられていません</h2>';
	echo '<a href="year.php"><button class="btn btn-default">戻る</button></a>';
}
include('page_footer.php');
?>