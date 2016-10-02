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
<p>コメントを受け付けました。<br />コメントは管理人の承認後、表示されます。</p>
</div>

<div id="check" name="check">
<button>あいうえお</button>
</div>
<?php
if(isset($_SESSION['urole'])){
	$urole=$_SESSION['urole'];
	$year=$_SESSION['year'];
	if($urole==1){
		$where="AND iyear=".$year;
	}else{
		$where="";
	}


	$sql = "SELECT * FROM tb_info WHERE irole LIKE '%".$urole."%' ".$where." GROUP BY time ORDER BY time";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs);
	if($row!=null){
		while($row){
			echo '<div id="detail" title="more-info"><a>';
			echo $row['time']." ".$row['title'].'<br>';
			echo '</a></div>';
			$row = mysql_fetch_array($rs);
		}
	}else{
		echo '新着情報はありません。';
	}
}else{
	die('この機能は使用できません!');
}
?>