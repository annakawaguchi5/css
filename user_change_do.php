<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_POST['change'])){
  $uid = $_POST['change'];
  foreach($uid as $u){
  $sql = "UPDATE";
  $rs = mysql_query($sql, $conn);
  $id = "";
  $id=$id.$u.'<br>';

  }
  echo '<h2>' . $id . 'の情報を変更しました。</h2>';
  echo '<a href="year.php">戻る</a>';
}else{
  echo '<h2>変更するユーザIDが与えられていません</h2>';
  echo '<a href="year.php"><button class="btn btn-default">戻る</button></a>';
}
include('page_footer.php');
?>