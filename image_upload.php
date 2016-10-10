<?php
include('page_header.php');
include_once('db_inc.php');

    // DBに取り込む画像のパス
 $img_path = 'http://ecx.images-amazon.com/images/I/61vSkV4-rwL.jpg';//例として、この時一番売れてる本の画像にしておきました。



    // 画像の取得
    $image = file_get_contents( $img_path );

    // SQL文の作成
      echo $sql = sprintf( 'INSERT INTO temp_upload (image ) VALUES ( '.$img_path.' )',
                    mysql_real_escape_string( $image ) );

// SQL文の実行
    $result = mysql_query( $sql );

?>