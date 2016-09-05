<?php
if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
	echo "<h2>成績確認</h2>";
	$sql="SELECT uname, halfgp, halfgpa, gp, gpa
FROM tb_gp
NATURAL JOIN tb_user
WHERE uid = '$uid'";
	//検索条件を適用したSQL文を作成
}
$rs = mysql_query($sql,$conn);
if(!$rs)die('エラー： '.mysql_error());
$row = mysql_fetch_array($rs);
echo '氏名：'.$row['uname'];
echo '<table border=2>';
echo '<tr><th></th><th>修得単位数</th><th>ＧＰＡ</th></tr>';
while($row){
	//前期
	echo '<td>前期</td>';
	echo '<td>'.$row['halfgp'].'</td>';
	echo '<td>'.$row['halfgpa'].'</td>';
	echo'</tr>';
	//後期
	echo '<td>後期</td>';
	echo '<td>'.$row['gp'].'</td>';
	echo '<td>'.$row['gpa'].'</td>';
	echo'</tr>';
	//合計
	$allgp = $row['halfgp']+$row['gp'];
	$allgpa = $row['halfgpa']+$row['gpa'];
	echo '<td>合計</td>';
	echo '<td>'.$allgp.'</td>';
	echo '<td>'.$allgpa.'</td>';
	echo'</tr>';
	$row=mysql_fetch_array($rs);
}
echo '</table>';
include('page_footer.php');
?>