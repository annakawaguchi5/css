<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');

echo "<h1>コース決定一覧</h1>";
//コース情報を検索
$sql="select * from tb_course where year=".$year;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$gp = $row['gp'];
$gpa = $row['gpa'];

//学生情報を検索
//$sql = "select * from tb_user natural join tb_entry natural join tb_course natural join tb_gp where urole='1' and year=".$year;
$sql = "select * from tb_user natural join tb_gp where urole='1' and year=".$year;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;


/*
//希望提出済みコース未決定の学生情報を検索
//$sql2 = "select * from tb_entry natural join tb_user natural join tb_course where year=".$year." and uid not in(select uid from tb_decide)";//検索条件を適用したSQL文を作成
//$sql2 = "select * from tb_entry natural join tb_user natural join tb_course where year=".$year." and uid=".$row['uid'];
$rs2 = mysql_query($sql2, $conn);
if (!$rs2) die ('エラー: ' . mysql_error());
$row2 = mysql_fetch_array($rs2) ;
*/
//コース決定済みの学生情報を検索
$sql3 = "select * from tb_decide natural join tb_user natural join tb_course where urole='1' and year=".$year;
$rs3 = mysql_query($sql3, $conn);
if (!$rs3) die ('エラー: ' . mysql_error());
$row3 = mysql_fetch_array($rs3) ;

$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;

if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
	$judge = "◯";
}

echo '<table border=0 class="table table-hover">';
echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加
while ($row) {
	if ($row3) {
		$cid = $row3['cid']; // 現在登録しているコースのID
		$act = 'update';    // すでに登録したため「再登録」とする
	}else{
		$cid = $row3['cid'];
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
	}/*
	if($row['uid']==$row2['uid']){
		echo'<td>
		<form action="cs_decide_do.php?uid='.$row['uid'].'" class="form-horizontal" method="post">
		<input type="hidden" name="act" value="'.  $act .'">
		<input type="hidden" name="uname" value="'.$row['uname'].'">
		<button class="btn btn-default" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
		<button class="btn btn-default" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
		</form></td>';
		$row2 = mysql_fetch_array($rs2) ;
	}else{
		if($row3['cid']==1){
			echo'<td>
			<form action="cs_decide_do.php?uid='.$row['uid'].'" class="form-horizontal" method="post">
			<input type="hidden" name="act" value="'.  $act .'">
			<input type="hidden" name="uname" value="'.$row['uname'].'">
			<button class="btn btn-danger" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
			<button class="btn btn-default" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
			</form></td>';
			$row3 = mysql_fetch_array($rs3) ;
		}else if($row3['cid']==2){
			echo'<td>
			<form action="cs_decide_do.php?uid='.$row['uid'].'" class="form-horizontal" method="post">
			<input type="hidden" name="act" value="'.  $act .'">
			<input type="hidden" name="uname" value="'.$row['uname'].'">
			<button class="btn btn-default" type="submit" name="cid" value="1" '.$disabled.'>応用</button>
			<button class="btn btn-primary" type="submit" name="cid" value="2" '.$disabled.'>総合</button>
			</form></td>';
			$row3 = mysql_fetch_array($rs3) ;
		}
	}*/
	echo '</tr>';
	$row = mysql_fetch_array($rs) ;

}
echo '</table>';

echo'';

include('page_footer.php');  //画面出力終了
?>
