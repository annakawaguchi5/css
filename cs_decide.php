<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');

//コースの登録条件を検索
$sql="SELECT * FROM tb_course";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$cid = $row['cid'];
$cname = $row['cname'];

echo "<h1>コース決定一覧</h1>";

while($row){
	echo "<h2>".$row['cname']."希望</h2>";
	//学生情報を検索
	$sql2 = "SELECT * FROM tb_user NATURAL JOIN tb_entry NATURAL JOIN tb_course NATURAL JOIN tb_gp WHERE urole='1' AND year='$year' AND cid=".$row['cid'] ;
	$rs2 = mysql_query($sql2, $conn);
	if (!$rs2) die ('エラー: ' . mysql_error());
	$row2 = mysql_fetch_array($rs2) ;



	echo '<table border=0 class="table table-striped table-hover table-bordered">';
	echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加
	while ($row2) {

		//希望提出済みコース未決定の学生情報を検索
	$sql3 = "SELECT * FROM tb_decide";//検索条件を適用したSQL文を作成

	$rs3 = mysql_query($sql3, $conn);
	if (!$rs3) die ('エラー: ' . mysql_error());
	$row3 = mysql_fetch_array($rs3) ;
	var_dump($row3);
	$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
	if($row2['allgp']>=$row['gp'] && $row2['allgpa']>=$row['gpa']){
		$judge = "◯";
	}

	if($row3['cid'] == 1){
		$class1 = "danger";
		$class2 = "default";
	}else if($row3['cid'] == 2){
		$class1 = "default";
		$class2 = "primary";
	}else{
		$class1 = "default";
		$class2 = "default";
	}

		/*
		 if ($row3) {
		 $row2['cid'] = $row3['cid']; // 現在登録しているコースのID
		 $act = 'update';    // すでに登録したため「再登録」とする
		 }else{
		 $row2['cid'] = $row3['cid'];
		 $act = 'insert';
		 }*/
		echo '<tr>';
		echo '<td><input type="checkbox" id='.$row2['uid'].'></th>';
		echo '<td>' . $row2['uid'] . '</td>';
		echo '<td>' . $row2['uname']. '</td>';
		echo '<td>' . $row2['cname'] . '</td>';
		echo '<td>' . $row2['note'] . '</td>';
		echo '<td>' . $row2['allgp'] . '</td>';
		echo '<td>' . $row2['allgpa'] . '</td>';
		echo '<td style="color:red">' . $judge . '</td>';
		if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
			//教員（権限なし）としてログインしているなら
			$disabled = "disabled";
		}else{
			$disabled = "";
		}
		echo'<td>
		<form action="cs_decide_do.php?uid='.$row2['uid'].'" class="form-horizontal" method="post">
		<input type="hidden" name="act" value="'.  $act .'">
		<input type="hidden" name="uname" value="'.$row2['uname'].'">
		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
		</form></td>';

		//$row3 = mysql_fetch_array($rs3) ;

		echo '</tr>';
		$row2 = mysql_fetch_array($rs2) ;


	}echo '</table>';
	$row = mysql_fetch_array($rs);
}

echo'<h2>未提出者</h2>';
$sql="SELECT DISTINCT uid, uname, allgp, allgpa,gp,gpa
FROM tb_user
NATURAL JOIN tb_course
NATURAL JOIN tb_gp
WHERE uid NOT
IN (
SELECT DISTINCT uid
FROM tb_entry
WHERE tb_user.uid = tb_entry.uid
)";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
if($row['allgp']>=$row['gp'] && $row['allgpa']>=$row['gpa']){
	$judge = "◯";
}
$null = null;
echo '<table border=0 class="table table-striped table-hover table-bordered">';
echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加
while ($row) {
	echo '<tr>';
	echo '<td><input type="checkbox"></th>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td>' . $null. '</td>';
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
	echo '</tr>';
	$row = mysql_fetch_array($rs) ;
}
echo '</table>';
include('page_footer.php');  //画面出力終了
?>