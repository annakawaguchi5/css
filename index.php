<?php
if ( isset($_SESSION['urole'])) {
	include ('page_header.php');
	require_once('db_inc.php');  //データベース接続
	//ログインしているなら
	$urole = $_SESSION['urole']; //認証済みの権限
	switch($urole){
		case 1:
			include('student_top.php');
			break;
		case 2:
			include('teacher_top.php');
			break;
		case 3:
			include('teacher_top.php');
			break;
		case 9:
			include('admin_top.php');
			break;
	}
}else{
	include('unlogin.php');
}

include ('page_footer.php');
?>