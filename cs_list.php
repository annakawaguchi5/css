<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');

echo "<h1>コース希望一覧</h1>";
//コース情報を取得
$sql = "select * from tb_course where ".$year;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

echo '<form action="cs_list.php" method="post">';

while($row){
	echo '<label class="radio-inline container-fluid">';
	echo '<input type="radio" name="cid" value="' . $row['cid'] . '">' . $row['cname'];
	echo '</label>';
	$row = mysql_fetch_array($rs) ;
}
echo '<input type="submit" value="検索"><input type="reset" value="取消">';
echo '</form>';

//1. 選択されたコース種別（押されたラジオボタン）を受け取る（$_POSTから）
if(isset($_POST['cid'])){
	$cid = $_POST['cid'];
	//2. $cidを使ってSQL文のWHERE句を作成
	$where = "WHERE cid = {$cid}";
}else{
	$where = 'WHERE 1';
}
//人数集計
$sql = "select count(*) from tb_entry natural join tb_user natural join tb_course ".$where;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs);
$total = $row['count(*)'];

//希望を検索
$sql = "select * from tb_entry natural join tb_user natural join tb_course ".$where;//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;


echo '<h2>計 '.$total.' 名</h2>';
echo '<table border=0 class="table table-hover">';
echo '<tr class="info"><th>ユーザID</th><th>氏名</th><th>希望コース</th></tr>';
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td>' . $row['cname'] . '</td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs) ;
}

echo '</table>';
include('page_footer.php');  //画面出力終了
?>
