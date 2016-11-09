<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( isset($_SESSION['year']) && $_SESSION['year']!=0) {	//uidを取得
	$year = $_SESSION['year'];
}else{
	//最新年を検索
	$sql = "SELECT MAX(year) FROM tb_course";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	$year = $row['MAX(year)'];
}

$sql = "SELECT * FROM tb_course where cid=2 AND year='$year'";
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs) ;
$cname=$row['cname'];
$gp=$row['gp'];
$gpa=$row['gpa'];

?>
<!-- phpでDBから要件の値を取得する -->

<div class="col-md-6">
	<strong><h2>
	<?php echo $year.'年度 '.$cname;?>
			要件
		</h2> </strong>
	<h3>
	<?php echo $cname ?>
		に登録するには、１年次終了までに、次の各号に掲げる要件を満たさなければならない。<br>
		<ol>
			<li>1年次に配当されている授業科目を<?php echo $gp ?>単位以上修得していること。</li>
			<li>GPAが<?php echo $gpa; ?>以上であること。</li>
		</ol>
	</h3>
	詳細はこちら→ <a
		href="http://www2.is.kyusan-u.ac.jp/student/21-20newstudent/sogocourse-youken/2014">コース登録要件</a>
</div>
<div class="col-md-6">
	<!--<img src="./image_view.php?id=1" />-->
	<img
		src="http://www2.is.kyusan-u.ac.jp/files/uploads/modelcourses__large.png" class="img-responsive" />
</div>

	<?php

	$class=array(1=>'danger', 2=>'info');

	$sql = "SELECT cid, cname, detail FROM tb_course WHERE year=$year ORDER BY cid";
	$rs = mysql_query($sql, $conn);
	$row = mysql_fetch_array($rs) ;

		while ($row){

		$cid = $row['cid'];
		$myclass=$class[$cid];
		echo '<div class="col-sm-6 bg-'.$class.'">';
		echo '<h3 class="bg-'.$myclass.'"
	<strong>'.$row['cname'].'</strong><br>'. $row['detail'];
		$row = mysql_fetch_array($rs) ;
		echo '</div>';

	}


	include('page_footer.php');
	?>