<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

?>

<div class="container">
	<div class="col-md-6">
		<strong><h1>総合コース要件</h1></strong>
		<h2>
			情報科学総合コースに登録するには、１年次終了までに、次の各号に掲げる要件を満たさなければならない。<br>
			<ol>
				<li>1年次に配当されている授業科目を38単位以上修得していること。</li>
				<li>GPAが2.0以上であること。</li>
			</ol>
		</h2>
		詳細はこちら→
		<a href="http://www2.is.kyusan-u.ac.jp/student/21-20newstudent/sogocourse-youken/2014">総合コース登録要件</a>
	</div>
		<div class="col-md-6">
		<img src="http://www2.is.kyusan-u.ac.jp/files/uploads/modelcourses__large.png" alt="pic1">
		</div>
</div>
<?php
$class=array(1=>'danger', 2=>'info');

$sql = "SELECT cid, cname, detail FROM tb_course ORDER BY cid";
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs) ;
echo '<div class="container">';
while ($row){

	$cid = $row['cid'];
	$myclass=$class[$cid];
	echo '<div class="col-md-6">';
	echo '<h3 class="bg-'.$myclass.'"
	style="text-align: middle; width:500px; height:150px; border-radius: 30px;">
	<strong>'.$row['cname'].'</strong><br>'. $row['detail'].'</h3>';
	$row = mysql_fetch_array($rs) ;
	echo'</div>';
}	echo '</div>';

?>