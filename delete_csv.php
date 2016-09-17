<?php
include('page_header.php');
include_once('db_inc.php');
?>
<script type="text/javascript">
function Delete(){
    myRet = confirm("本当に削除しますか？");
    if ( myRet == true ){
        alert("削除しました");
    }else{
        alert("キャンセルしました");
    }
}
</script>
<form>
データ削除ボタン　
<input type="button" value="データを削除" onclick="Delete()">
</form>


<!--
<button class="btn btn-success col-sm-offset-2" type="submit" value="データ削除ボタン">データ削除ボタン</button>
-->
<?php
/*
$sql="DELETE FROM tb_user WHERE year='$year'";
$rs = mysql_query($sql, $conn);
echo $sql."<br>";

$sql="DELETE FROM tb_gp year='$year'";
$rs = mysql_query($sql, $conn);
echo $sql."<br>";
if (!$rs) {
	die('エラー: ' . mysql_error());
}

include('page_footer.php');
/*
if (isset($_GET['uid'])){
  $uid = $_GET['uid'];
  echo '<h2>'. $uid . 'を本当に削除しますか?</h2>';
  echo '<a href="user_delete_do.php?uid='. $uid . '">削除</a> | ';
  echo '<a href="user_list.php">戻る</a>';
}else{
  echo '<h2>削除するユーザIDが与えられていません</h2>';
  echo '<a href="user_list.php">戻る</a>';
}
include('page_footer.php');
*/
/*
 * if (isset($_GET['uid'])){
  $uid = $_GET['uid'];
  $sql = "DELETE FROM tb_user WHERE uid='{$uid}'";
  include ('db_inc.php');
  $rs = mysql_query($sql, $conn);
  echo '<h2>' . $uid . 'を削除しました</h2>';
  echo '<a href="user_list.php">戻る</a>';
}else{
  echo '<h2>削除するユーザIDが与えられていません</h2>';
  echo '<a href="user_list.php">戻る</a>';
}
include('page_footer.php');
 */

?>
