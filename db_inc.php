<?php
////////////////////////////////////////////
//$env = "run"; // 公開用サーバのDBへ接続。この行をコメントアウトすると、開発環境となる
/*cas用
 * if (isset($env) and $env==="run"){
	$conn = mysql_connect("localhost","k14jk037","joho2016");
	mysql_select_db("wpk14jk037", $conn);
}*/
//css用
if (isset($env) and $env==="run"){
	$conn = mysql_connect("localhost","k14jk032","joho2016");
	mysql_select_db("css", $conn);
}
////////////////////////////////////////////////
else{
  $conn = mysql_connect("localhost","root","");//MySQLサーバへ接続
  mysql_select_db("css", $conn);    // 使用するデータベースを指定
}
mysql_query('set names utf8', $conn); //文字コードをutf8に設定（文字化け対策）
?>