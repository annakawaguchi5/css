<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>
<div class="container">
<?php
if(isset($_GET['page'])){
	$page_num=$_GET['page'];
}else{
	$page_num=0;
}

//LIMITを使ったSELECT文を作成
$sql = "SELECT * FROM goiken_info " ;
$sql .= "ORDER BY timestamp DESC " ;
$sql .= "LIMIT " . $page_num*10 . ", 10" ;
//echo $sql;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

$r=array(
	0=>'未指定',
	1=>'学生',
	2=>'教員(権限なし)',
	3=>'教員(権限あり)',
	9=>'管理者'
);
//検索結果表示
echo '<table class="table table-striped" >
		 <tr class="info"><th>時間</th><th>内容</th><th>年度</th><th>権限</th></tr>';

while($row){
	echo '<tr><td>'.$row['timestamp'].'</td>
	<td>'.$row['note'].'</td>
	<td>'.$row['year'].'</td>
	<td>'.$r[$row['urole']].'</td></tr>';
	$row = mysql_fetch_array($rs);
}
echo '</table>';

//検索条件に該当する全データの件数取得
$sql = "SELECT COUNT(*) FROM goiken_info " ;
//$sql .= "where year='$year' " ;

$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
//$row = mysql_fetch_array($rs) ;

$row = mysql_fetch_array($rs) ;
$cnt = $row[0] ;

//ページ表示
if($cnt > 10){
echo ceil($cnt/10)."ページの中の".($page_num+1)."ページ目を表示<br>" ;
}

//前の10件
if($page_num !=0){
	echo '<a href="goikenbox.php?page='.($page_num-1).'">前の10件</a>';
}

//次の10件
if(($page_num+1)*10<$cnt){
	echo '<a href="goikenbox.php?page='.($page_num+1).'">次の10件 </a>';
}

//結果セットの開放
mysql_free_result ($rs) ;
?>
</div>

<?php
include('page_footer.php');
?>