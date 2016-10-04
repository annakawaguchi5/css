<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');

echo "<h1>コース決定一覧</h1>";



//総合コース/////////////////////////////////////////////////////////////////

$sql = "SELECT uid, cid,uname, cname, note, allgp, allgpa
FROM tb_user
NATURAL JOIN tb_gp
NATURAL JOIN tb_entry
NATURAL JOIN tb_course
WHERE YEAR ='$year'
AND cid=2";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
echo "<h2>".$row['cname']."</h2>";
echo '<table border=0 class="table table-striped table-hover table-bordered">';
echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加


while($row){

	//学生情報を検索
	$gp = $row['allgp'];
	$gpa = $row['allgpa'];
	$cid=$row['cid'];
	$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
	if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
		$judge = "◯";
	}
	//希望提出済みコース未決定の学生情報を検索
	$class1 = "default";
	$class2 = "default";
	if($cid==1){
		$class1 = "danger";
		$class2 = "default";
	}else if($cid == 2){
		$class1 = "default";
		$class2 = "primary";
	}
	if ($row) { // 現在登録しているコースのID
		$act = 'update';    // すでに登録したため「再登録」とする
	}else{
		$act = 'insert';
	}
	echo '<tr>';
	echo '<td><input type="checkbox"></th>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td>' . $row['cname'] . '</td>';
	echo '<td>' . $row['note'] . '</td>';
	echo '<td>' . $row['allgp'] . '</td>';
	echo '<td>' . $row['allgpa'] . '</td>';
	echo '<td style="color:red">' . $judge . '</td>';
	if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
		//教員（権限なし）としてログインしているなら
		$disabled = "disabled";
	}else{
		$disabled = "";
	}
		echo'<td>
		<form action="cs_decide_do.php?uid='.$row['uid'].'" class="form-horizontal" method="post">
		<input type="hidden" name="act" value="'.  $act .'">
		<input type="hidden" name="uname" value="'.$row['uname'].'">
		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
		</form></td>';
		echo '</tr>';

	$row = mysql_fetch_array($rs) ;
}echo '</table>';

///////////////////////////////////////////////////////////////////////////



//応用コース
$sql = "SELECT uid, cid,uname, cname, note, allgp, allgpa
FROM tb_user
NATURAL JOIN tb_gp
NATURAL JOIN tb_entry
NATURAL JOIN tb_course
WHERE YEAR ='$year'
AND cid=1";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
echo "<h2>".$row['cname']."</h2>";
echo '<table border=0 class="table table-striped table-hover table-bordered">';
echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加


while($row){

	//学生情報を検索
	$gp = $row['allgp'];
	$gpa = $row['allgpa'];
	$cid=$row['cid'];

	$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
	if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
		$judge = "◯";
	}

	//希望提出済みコース未決定の学生情報を検索



	$class1 = "default";
	$class2 = "default";


	if($cid==1){
		$class1 = "danger";
		$class2 = "default";
	}else if($cid == 2){
		$class1 = "default";
		$class2 = "primary";
	}


	if ($row) { // 現在登録しているコースのID
		$act = 'update';    // すでに登録したため「再登録」とする
	}else{
		$act = 'insert';
	}


	echo '<tr>';
	echo '<td><input type="checkbox"></th>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td>' . $row['cname'] . '</td>';
	echo '<td>' . $row['note'] . '</td>';
	echo '<td>' . $row['allgp'] . '</td>';
	echo '<td>' . $row['allgpa'] . '</td>';
	echo '<td style="color:red">' . $judge . '</td>';
	if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
		//教員（権限なし）としてログインしているなら
		$disabled = "disabled";
	}else{
		$disabled = "";
	}
		echo'<td>
		<form action="cs_decide_do.php?uid='.$row['uid'].'" class="form-horizontal" method="post">
		<input type="hidden" name="act" value="'.  $act .'">
		<input type="hidden" name="uname" value="'.$row['uname'].'">
		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
		</form></td>';

		echo '</tr>';


	$row = mysql_fetch_array($rs) ;
}echo '</table>';



//未提出/////////////////////////////////////////////////////////////////////////////
echo '<h2>未提出者</h2>';
$sql = "SELECT uid, uname, allgp, allgpa
FROM tb_user
NATURAL JOIN tb_gp
WHERE year='$year'
AND uid NOT
IN (
SELECT uid
FROM tb_entry
)";



$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

echo '<table border=0 class="table table-striped table-hover table-bordered">';
echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加
while ($row) {
	$gp = $row['allgp'];
	$gpa = $row['allgpa'];
	$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
	if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
		$judge = "◯";
	}
	//希望提出済みコース未決定の学生情報を検索

	$class1 = "default";
	$class2 = "default";
	echo '<tr>';
	echo '<td><input type="checkbox"></th>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td>' . "" . '</td>';
	echo '<td>' . "" . '</td>';
	echo '<td>' . $row['allgp'] . '</td>';
	echo '<td>' . $row['allgpa'] . '</td>';
	echo '<td style="color:red">' . $judge . '</td>';
	if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
		//教員（権限なし）としてログインしているなら
		$disabled = "disabled";
	}else{
		$disabled = "";
	}
	echo'<td>
		<form action="cs_decide_do.php?uid='.$row['uid'].'" class="form-horizontal" method="post">
		<input type="hidden" name="act" value="'.  $act .'">
		<input type="hidden" name="uname" value="'.$row['uname'].'">
		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
		</form></td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs) ;
}
echo '</table>';

include('page_footer.php');  //画面出力終了
?>