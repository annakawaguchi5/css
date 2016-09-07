<?php
require_once('db_inc.php');  //データベース接続
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

<button class="btn btn-danger btn-lg" id="create-year">新規作成</button>
<?php
include('new_year.php');
?>

<!-- 一覧 -->
<?php
/*
//テーブル名不明
$sql = "select * from ";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
*/
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

