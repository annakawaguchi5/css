<?php
include('page_header.php');
include ('db_inc.php');

if (isset($_GET['uid'])){
  $uid = $_GET['uid'];
  $sql1="SELECT * FROM tb_entry NATURAL JOIN tb_user NATURAL JOIN tb_course WHERE uid='{$uid}'";

  $rs = mysql_query($sql1, $conn);
  if (!$rs) die ('エラー: ' . mysql_error());
  $row = mysql_fetch_array($rs) ;

  if($row['cid']==1){
  $sql2="INSERT INTO tb_decide VALUE('".$row['uid']."', '".$row['uname']."', 2)";
  $rs2 = mysql_query($sql2, $conn);
  //echo '<h2>' . $row['uname'] . 'を【情報技術総合コース】に決定しました。 </h2>';
  header('cs_decide.php');
  if (!$rs) die ('エラー: ' . mysql_error());
  }else{
  	  $sql2="INSERT INTO tb_decide VALUE('".$row['uid']."', '".$row['uname']."', 1)";
  	$rs = mysql_query($sql2, $conn);
  	if (!$rs) die ('エラー: ' . mysql_error());
  	header('cs_decide.php');
  	  //echo '<h2>' . $row['uname'] . 'を【情報技術応用コース】に決定しました。 </h2>';
  }

  echo '<a href="user_list.php">戻る</a>';
}else{
  echo '<h2>コース決定するユーザIDが与えられていません</h2>';
  echo '<a href="cs_decide.php"><button class="btn btn-default">戻る</button></a>';
}
include('page_footer.php');
?>