<?php
include('page_header.php');

if (isset($_POST['uid'])){
	$id = $_POST['uid'];
	echo'<span style="font-weight:bold text-color:red">警告：</span>';
	echo '<form action="user_delete_do.php" method="post">';
	$uid = "";
	foreach($id as $u){
		echo '<input type="checkbox" name="delete[]" value="'.$u.'" checked="checked">'.$u.'<br>';
	}

	echo '<p>を本当に削除しますか?</p>';
	echo '<button class="btn btn-danger">削除</button></a>';
	echo '<a href="year.php"><button class="btn btn-default">戻る</button></a>';
}else{
	echo '<h2>削除するユーザIDが与えられていません</h2>';
	echo '<a href="user_list.php">戻る</a>';
}
include('page_footer.php');
?>