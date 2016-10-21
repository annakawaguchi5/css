<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_POST['delete'])){
	$uid = $_POST['delete'];
	foreach($uid as $user){
		$sql = "DELETE tb_user, tb_gp, tb_entry, tb_decide
FROM tb_user
LEFT OUTER JOIN tb_gp ON tb_user.uid=tb_gp.uid
LEFT OUTER JOIN tb_entry ON tb_user.uid=tb_entry.uid
LEFT OUTER JOIN tb_decide ON tb_user.uid=tb_decide.uid
WHERE tb_user.uid='$user'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$deleteid = "";
		$deleteid=$deleteid.$user.'<br>';
	}
	echo '<h2>' . $deleteid . 'を削除しました</h2>';
	echo '<a href="year.php">戻る</a>';
}else{
	echo '<h2>削除するユーザIDが与えられていません</h2>';
	echo '<a href="year.php"><button class="btn btn-default">戻る</button></a>';
}
include('page_footer.php');
?>