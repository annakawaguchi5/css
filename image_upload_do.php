<?php
include('page_header.php');
include_once('db_inc.php');
if(isset($_POST['image'])){
	echo $img_path= $_POST['image'];
    // 画像の取得
    $image = file_get_contents( "\css\$img_path" );
   header('Content-type: image/jpeg');
   // $image = mysql_real_escape_string( $image  );
    // SQL文の作成
    echo $sql =  "UPDATE tb_image SET  image='$image'";
// SQL文の実行
echo "登録しました";
    $result = mysql_query( $sql );
}else{
	echo "エラー：選択されていません";

}

/*
 * include('page_header.php');
include_once('db_inc.php');
if(isset($_POST['image'])){
	$img_path = $_POST['image'];
    // 画像の取得

    // SQL文の作成
    echo $sql = "UPDATE tb_image SET  image='$img_path' WHERE id=1";

// SQL文の実行
echo "登録しました";
    $result = mysql_query( $sql );
}else{
	echo "エラー：選択されていません";

}



 $sql = sprintf( 'INSERT INTO temp_upload (image ) VALUES ( "%s" )',
                    mysql_real_escape_string( $image ) );
 */

