<?php
if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
	echo "<h2>成績確認</h2>";
	$sql="SELECT uname, halfgp, halfgpa, allgp, allgpa
FROM tb_gp
NATURAL JOIN tb_user
WHERE uid = '$uid'";
	//検索条件を適用したSQL文を作成
}
$rs = mysql_query($sql,$conn);
if(!$rs)die('エラー： '.mysql_error());
$row = mysql_fetch_array($rs);

echo '<table border=0 class="table table-hover">';
echo '<tr class="info"><th></th><th>取得単位数</th><th>GPA</th></tr>';
while ($row) {
	echo '<tr><td>前期</td><td>'.$row['halfgp'].'</td><td>'.$row['halfgpa'].'</td></tr>';
	echo '<tr><td>年間</td><td>'.$row['allgp'].'</td><td>'.$row['allgpa'].'</td></tr>';
	$row = mysql_fetch_array($rs) ;
}
echo '</table>';
?>