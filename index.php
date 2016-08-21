<?php
include ('page_header.php');
require_once('db_inc.php');  //データベース接続

if ( isset($_SESSION['urole'])) {
	//ログインしているなら
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
	echo '<h2 class="container col-xs-offset-1">こんにちは! '.$uname.'さん</h2>';

}else{

	echo '<h2 class="col-xs-offset-1 col-xs-6"><a href="login.php">ログインしてください。</a></h2>';
}


?>
<div class="container">
	<div class="row">
		<div class="col-offset-4 col-xs-12 col-md-4" style="float: center; width: 370px; height: 250px;">
			<div id="carousel-example-generic" class="carousel slide"
				data-ride="carousel" data-interval="2500">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0"
						class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="http://www.is.kyusan-u.ac.jp/gaikan.jpg"
							style="width: 370px; height: 250px;" alt="picture1">
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img
							src="http://www2.is.kyusan-u.ac.jp/files/uploads/modelcourses__large.png"
							style="width: 370px; height: 250px;" alt="picture2">
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img
							src="http://whale.is.kyusan-u.ac.jp/files/uploads/jabee-license.jpg"
							style="width: 370px; height: 250px;"alt="picture3">
						<div class="carousel-caption">
						</div>
					</div>
				</div>


				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic"
					role="button" data-slide="prev"> <span
					class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span> </a> <a
					class="right carousel-control" href="#carousel-example-generic"
					role="button" data-slide="next"> <span
					class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span> </a>
			</div>
		</div>

<?php

$class=array(1=>'danger', 2=>'info');

$sql = "SELECT cid, cname, detail FROM tb_course ORDER BY cid";
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs) ;
while ($row){
	echo '<div>';
	$cid = $row['cid'];
	$myclass=$class[$cid];
	echo '<h3 class="col-xs-offset-2 col-xs-5 bg-'.$myclass.'" style="text-align: middle; width:500px; height:200px; border-radius: 30px;"><strong>'.$row['cname'].'</strong><br>'. $row['detail'].'</h3>';
	echo '</div>';
	$row = mysql_fetch_array($rs) ;
}

/*
$sql = "SELECT cname, detail FROM tb_course WHERE cid='2'";
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs) ;
if($row){
	echo '<div>';
	echo '<h3 class="col-xs-offset-2 col-xs-5 bg-info" style="text-align: middle; width:500px; height:200px; border-radius: 30px;"><strong>'.$row['cname'].'</strong><br>'. $row['detail'].'</h3>';
	echo '</div></div></div>';
}
*/
include ('page_footer.php');
?>