<?php
require_once('db_inc.php');  //データベース接続

if ( isset($_SESSION['uid'])) {	//uidを取得
	$uid = $_SESSION['uid'];

//コース決定情報


//更新情報


//成績情報
include('cs_grade.php');

}
?>