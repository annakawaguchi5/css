<?php
include ('page_header.php');
require_once('db_inc.php');  //データベース接続

if ( isset($_SESSION['urole'])) {
	//ログインしているなら
	$urole = $_SESSION['urole']; //認証済みの権限
	switch($urole){
		case 1:
			include('student_top.php');
			break;
		case 2:
			include('teacher_top.php');
			break;
		case 9:
			include('admin_top.php');
			break;
	}

}else{
	echo '<h2 class="col-xs-offset-1 col-xs-6"><a href="login.php">ログインしてください。</a></h2>';
}

include ('page_footer.php');
?>