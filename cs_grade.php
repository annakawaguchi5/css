<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
 //学生としてログインしているなら
  $uid   = $_SESSION['uid'];   // 認証済みのユーザID
  $uname = $_SESSION['uname']; // 認証済みのユーザ名
echo "<h2>成績確認</h2>";
$sql="SELECT uname, halfgp, halfgpa
FROM tb_gp
NATURAL JOIN tb_user
WHERE uid = '$uid'";
//検索条件を適用したSQL文を作成
}
$rs = mysql_query($sql,$conn);
if(!$rs)die('エラー： '.mysql_error());
$row = mysql_fetch_array($rs);
echo '<table border=1>';
echo '<tr><th>氏名</th><th>修得単位数</th><th>ＧＰＡ</th></tr>';
while($row){
	echo '<tr>';
	echo '<td>'.$row{'uname'}.'</td>';
	echo '<td>'.$row{'halfgp'}.'</td>';
	echo '<td>'.$row{'halfgpa'}.'</td>';
	echo'</tr>';
	$row=mysql_fetch_array($rs);
}
echo '</table>';
include('page_footer.php');
?>