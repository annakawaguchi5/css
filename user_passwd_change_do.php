<!-- 戻るのUI変更 戻る画面はホームか同じ場所か -->
<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if (isset($_GET['uid'])){
  $uid = $_GET['uid'];
  $pass = $_POST['pass'];	//パスワード
  $pass2 = $_POST['pass2'];

  if($pass==$pass2){
  $sql = "UPDATE tb_user SET upass='{$pass}' WHERE uid='{$uid}'";
  include ('db_inc.php');
  $rs = mysql_query($sql, $conn);

  echo '<h2>' . $uid. 'のパスワードを' . $pass . 'に変更しました。</h2>';

  }else{
  	echo 'パスワードが違います。<br>';
  }
}else{
  echo '<h2>削除するユーザIDが与えられていません</h2>';

}
echo '<a href="user_passwd_change.php"><button class="btn btn-primary">戻る</button></a>';
include('page_footer.php');
?>