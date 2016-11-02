<h1>お知らせ</h1>

<script type="text/javascript">
//すぐにダイアログが開かないようにautoOpen:falseを指定
  $( "#detail" ).dialog({ autoOpen: false });
  //ボタンがクリックされたらダイアログを開く
  $( "#check" ).click(function() {
      $( "#detail" ).dialog( "open" );
  });
  </script>

<div id="detail" title="コメントの投稿ありがとうございます" style="display: none;">
	<p>
		コメントを受け付けました。<br />コメントは管理人の承認後、表示されます。
	</p>
</div>
<!--
<div id="check" name="check">
<button>あいうえお</button>
</div> -->
<?php
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y-m-d');

if(isset($_SESSION['urole'])){
	$urole=$_SESSION['urole'];
	$year=$_SESSION['year'];
	if($urole==1){
		$where="AND iyear=".$year;
	}else{
		$where="";
	}

	if(isset($_GET['page'])){
		$page_num=$_GET['page'];
	}else{
		$page_num=0;
	}

	//検索条件に該当する全データの件数取得
	$sql = "SELECT COUNT(*) FROM tb_info WHERE irole LIKE '%".$urole."%' ".$where." GROUP BY time" ;
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	$cnt = $row[0] ;

	//ページ表示
	if($cnt > 10){
		$c=ceil($cnt/10);
	}else{
		$c=1;
	}
	echo '<p style="text-align:right">'.$c."ページの中の".($page_num+1)."ページ目を表示</p>" ;

	$sql = "SELECT * FROM tb_info WHERE irole LIKE '%".$urole."%' ".$where." GROUP BY time ORDER BY time DESC ";
	$sql .= "LIMIT " . $page_num*10 . ", 10" ;
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs);

	if($row!=null){
		while($row){
			echo '<div id="detail" title="more-info">';
			echo $row['time']." ".$row['title'].'<br>';
			/*echo $date = date('Y-m-d' ,$row['time']);
				if(strtotime($date)==strtotime($now)){
				echo '<img src="./img/new026/new026_01.gif">';
				}*/
			echo '</div>';
			$row = mysql_fetch_array($rs);
		}
	}else{
		echo '新着情報はありません。';
	}
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
echo '<li '.$front.'><a href="index.php?page='.$furl.'" aria-label="前のページへ"><span aria-hidden="true">≪</span></a></li>';
if($page_num !=0){
	//echo '<li><a href="'.($page_num-1).'" aria-label="前のページへ"><span aria-hidden="true">≪</span></a></li>';
	echo '<li><a href="index.php?page='.($page_num-1).'">'.$page_num.'</a></li>';
}
//echo '<li><a href="" aria-label="前のページへ"><span aria-hidden="true">≪</span></a></li>';
//今のページ
echo '<li class="active"><a href="index.php?page='.$page_num.'">'.($page_num+1).'</a></li>';
//次のページ
for($i=2; $i<5; $i++){
	if(($page_num+$i)<=ceil($cnt/10)){
		echo '<li><a href="index.php?page='.($page_num+($i-1)).'">'.($page_num+$i).'</a></li>';
	}
}
echo '<li '.$behind.'>';
echo '<a href="index.php?page='.$burl.'" aria-label="次のページへ">
				<span aria-hidden="true">≫</span>';
?>
	</a>
	</li>
</ul>
</nav>

<?php
//結果セットの開放
mysql_free_result ($rs) ;

}else{
	die('この機能は使用できません!');
}
?>