<?php
//include('page_header.php');
//include ('db_inc.php');
?>
<link
	rel="stylesheet"
	href="./jquery-yycountdown-master/common/css/reset.css">
<link
	rel="stylesheet"
	href="./jquery-yycountdown-master/common/css/common.css">
<link
	rel="stylesheet"
	href="./jquery-yycountdown-master/css/jquery.yycountdown.css">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
if(isset($_SESSION['urole']) && $_SESSION['urole']==1){	//学生用year
	$year=$_SESSION['year'];
}else{	//教員、管理者用
	//最新年を検索 MAX(year)
	$sql = "SELECT MAX(year) FROM tb_limit";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	$year = $row['MAX(year)'];
}

//締め切り時間を検索
$sql = "SELECT * FROM tb_limit WHERE year=$year";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$ltime=$row['ltime'];
?>

<div id="contents">
	<div class="inner">
		<div id="countdownDate">
		<?php echo $year;?>
			年度締め切りまで
		</div>
		<div id="timer"></div>
	</div>
	<!-- inner -->
</div>

<!-- contents -->


		<?php //include('page_footer.php');?>