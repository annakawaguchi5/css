<?php
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');
//require_once('db_inc.php');  //データベース接続
?>

<div class="container">
<!-- 更新情報 -->
<?php
$sql = "select * from tb_info";	//where関数で年度指定
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs);

echo $row['time']." ".$row['title'];
?>

<!-- 4グリッドを割り当て -->
<div col-xs-4>

<!-- 年度の新規作成 -->
<?php
include('new_year.php');
?>
<!-- 一覧 -->
<?php


//テーブル名不明
$sql = "select * from tb_course WHERE cid=1;";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
while($row){
echo $row['year']."\n";

$row = mysql_fetch_array($rs) ;
}

?>
年度一覧

<!-- 8グリッドを割り当て -->
<!-- 年度詳細 -->
<?php
/*
$sql = "select * from ";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
*/
?>

</div>
</div>

