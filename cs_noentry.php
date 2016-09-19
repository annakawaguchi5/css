<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');

echo "<h1>未提出者一覧</h1>";
//未提出者数
$sql = "select count(*) from tb_user where urole='1' and year=".$year." and uid not in(select uid from tb_entry)";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs);
$total = $row['count(*)'];

$sql = "select * from tb_user where urole='1' and year=".$year." and uid not in(select uid from tb_entry) order by uid";//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;



echo '<h2>計 '.$total.' 名</h2>';
echo '<table border=0 class="table table-hover">';
echo '<tr class="info"><th>ユーザID</th><th>氏名</th></tr>';
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs);
}
echo '</table>';


include('page_footer.php');  //画面出力終了
?>
