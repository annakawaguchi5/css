<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_GET['id'])){
  $uid = $_GET['id'];
  foreach($uid as $u){
  $sql = "DELETE FROM tb_user WHERE uid='{$u}'";
  $id = "";
  $id=$id.$u.'<br>';
  $rs = mysql_query($sql, $conn);
  }
  echo '<h2>' . $id . 'を削除しました</h2>';
  echo '<a href="user_list.php">戻る</a>';
}else{
  echo '<h2>削除するユーザIDが与えられていません</h2>';
  echo '<a href="user_list.php"><button class="btn btn-default">戻る</button></a>';
}
include('page_footer.php');
?>