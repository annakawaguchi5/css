<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<?php
if(isset($_GET['page'])){
	$page_num=$_GET['page'];
}else{
	$page_num=0;
}

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
	$c=ceil($cnt/10);
}else{
	$c=1;
}
echo '<p style="text-align:right">'.$c."ページの中の".($page_num+1)."ページ目を表示</p>" ;

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
	<td>'.$row['year'].'</td>';
	if($row[urole]==''){
		$row['urole']=1;
	}
	echo '<td>'.$r[$row['urole']].'</td></tr>';
	$row = mysql_fetch_array($rs);
}
echo '</table>';

/*
//前の10件
if($page_num !=0){
	echo '<a href="goikenbox.php?page='.($page_num-1).'">前の10件</a>';
}

//次の10件
if(($page_num+1)*10<$cnt){
	echo '<a href="goikenbox.php?page='.($page_num+1).'">次の10件 </a>';
}*/
?>

	<nav>
	<ul class="pagination">

		<?php
		if($page_num==0){
			$front='class="disabled"';
			$furl=$page_num;
		}else{
			$front='';
			$furl=$page_num-1;
		}

		if(($page_num+2)>$c){
			$behind='class="disabled"';
			$burl=$page_num;
		}else{
			$behind='';
			$burl=$page_num+1;
		}

		//前のページ
		echo '<li '.$front.'><a href="goikenbox.php?page='.$furl.'" aria-label="前のページへ"><span aria-hidden="true">«</span></a></li>';
		if($page_num !=0){
			//echo '<li><a href="'.($page_num-1).'" aria-label="前のページへ"><span aria-hidden="true">«</span></a></li>';
			echo '<li><a href="goikenbox.php?page='.($page_num-1).'">'.$page_num.'</a></li>';
		}
		//echo '<li><a href="" aria-label="前のページへ"><span aria-hidden="true">«</span></a></li>';
		//今のページ
		echo '<li class="active"><a href="goikenbox.php?page='.$page_num.'">'.($page_num+1).'</a></li>';
		//次のページ
		for($i=2; $i<5; $i++){
			if(($page_num+$i)<=ceil($cnt/10)){
				echo '<li><a href="goikenbox.php?page='.($page_num+($i-1)).'">'.($page_num+$i).'</a></li>';
			}
		}
		echo '<li '.$behind.'>';
		echo '<a href="goikenbox.php?page='.$burl.'" aria-label="次のページへ">
				<span aria-hidden="true">»</span>';
		?>
		</a>
		</li>
	</ul>
	</nav>
	<?php
	//結果セットの開放
	mysql_free_result ($rs) ;
	?>
	<?php
	include('page_footer.php');
	?>