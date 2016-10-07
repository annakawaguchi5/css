<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_POST['change'])){
	$uid = $_POST['change'];
	$uname = $_POST['uname'];
	$upass = $_POST['upass'];
	$halfgp = $_POST['halfgp'];
	$halfgpa = $_POST['halfgpa'];
	$allgp = $_POST['allgp'];
	$allgpa = $_POST['allgpa'];
	foreach( $uid as $c=>$a  ) {
			$output[] = array($uid[$c], $uname[$c],$upass[$c],$halfgp[$c],$halfgpa[$c],$allgp[$c],$allgpa[$c]);
		}
	foreach($output as $u=>$b){
		/*
		echo $uid=$b[0]."<br>";
		echo $uname=$b[1]."<br>";
		echo $upass=$b[2]."<br>";
		echo $halfgp=$b[3]."<br>";
		echo $halfgpa=$b[4]."<br>";
		echo $allgp=$b[5]."<br>";
		echo $allgpa=$b[6]."<br>";
		*/
		$sql = "UPDATE tb_user NATURAL JOIN tb_gp SET uname='$uname',upass='$upass',halfgp='$halfgp',halfgpa='$halfgpa',allgp='$allgp',allgpa='$allgpa' WHERE uid='$uid'";
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