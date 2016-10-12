<?php

include_once('db_inc.php');



  // 表示するイメージのIDをパラメータから取得
  $id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
  $sql = sprintf( 'SELECT * FROM tb_image WHERE id = %d', $id );

  // データの取得
  $result = mysql_query( $sql );
  $row = mysql_fetch_array( $result, $conn );

  // 画像を出力
  header( 'Content-Type: image/jpeg' );
  header( 'Content-Type: image/png' );
  print $row['image'];

?>