<?php
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');
$year = date('Y');

echo "<h1>希望状況</h1>";
echo "<p ><strong style='color:red;'>".$now."</strong>
<strong> 現在</strong></p>";


$sql = "SELECT cname, COUNT( * ) AS 人数
FROM tb_entry
NATURAL JOIN tb_course
WHERE year=".$year."
GROUP BY tb_course.cid
UNION
SELECT cname, 0
FROM tb_course
WHERE year=".$year." and cid NOT
IN (
SELECT cid
FROM tb_entry
)";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

//$course = array(1=>'応用コース',2=>'総合コース');


echo '<table border=0 class="table table-hover">';
echo '<tr class="info"><th>コース</th><th>人数</th></tr>';
while ($row) {
 echo '<tr>';
 echo '<td>' . $row['cname'] . '</td>';
 echo '<td>' . $row['人数']. '</td>';
 echo '</tr>';
 $row = mysql_fetch_array($rs) ;
}
//未提出者数
$sql = "select count(*) from tb_user where urole='1' and year=".$year." and uid not in(select uid from tb_entry)";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs);
$total = $row['count(*)'];

echo '<tr><td>未提出</td><td>'.$total.'</td></tr>';
echo '</table>';

include('page_footer.php');  //画面出力終了
?>
