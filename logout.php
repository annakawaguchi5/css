<?php
 session_start();
 unset($_SESSION);
 session_destroy();
 include('page_header.php');    //ページヘッドを出力
 echo '<h3 class="col-xs-offset-1">ログアウトしました！</h3>';
 echo '<a href="index.php"><button class="col-xs-offset-1 btn-primary btn-lg">トップページ</button></a>';
 include('page_footer.php');    //ページフッタを出力
?>

