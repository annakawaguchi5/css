<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_POST['delete'])){
  $uid = $_POST['delete'];
  foreach($uid as $u){
  $sql = "DELETE FROM tb_user NATURAL JOIN tb_gp NATURAL JOIN tb_entry NATURAL JOIN tb_decide WHERE uid='{$u}'";
  $id = "";
  $id=$id.$u.'<br>';
  $rs = mysql_query($sql, $conn);
  }
  echo '<h2>' . $id . 'を削除しました</h2>';
  echo '<a href="year.php">戻る</a>';
}else{
  echo '<h2>削除するユーザIDが与えられていません</h2>';
  echo '<a href="year.php"><button class="btn btn-default">戻る</button></a>';
}
include('page_footer.php');
?>