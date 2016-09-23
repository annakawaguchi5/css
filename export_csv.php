<?php
//include('page_header.php');
include_once('db_inc.php');

//submitボタンが押され、hiddenで持たせた値がPOSTされたら処理が始まります。
//if(isset($_POST['csv01'])){
	// ファイル名
	$file_path = 'export.csv';

	// CSVに出力するタイトル行
	$export_csv_title = array( "学籍番号", "氏名", "選択コース", );

	// CSVに出力する内容
	$sql ="SELECT uid, uname, cname
FROM tb_user
NATURAL JOIN tb_decide
NATURAL JOIN tb_course
WHERE urole =  '1'
AND tb_user.uid = tb_decide.uid ";
	$res = mysql_query( $sql, $conn );

	// if( touch($file_path) ){

	// オブジェクト生成
	// $file = new SplFileObject( $file_path );
	$file=fopen("export.csv","w");

	// タイトル行のエンコードをSJIS-winに変換（一部環境依存文字に対応用）
	foreach( $export_csv_title as $key => $val ){

		$export_header[$key] = mb_convert_encoding($val, 'SJIS-win', 'UTF-8');

	}
	// エンコードしたタイトル行を配列ごとCSVデータ化
	fputcsv($file,$export_header);
	//fputcsv('php://output','w');
	while( $row = mysql_fetch_assoc( $res ) ){
		$export_arr = "";
		// 内容行のエンコードをSJIS-winに変換（一部環境依存文字に対応用）
		foreach( $row as $key => $val ){
			$export_arr[$key] = mb_convert_encoding($val, 'SJIS','UTF-8');
		}
		// エンコードした内容行を配列ごとCSVデータ化
		fputcsv($file,$export_arr);
		//fputcsv('php://output','a');
	}
	header("Pragma: public"); // required
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); // required for certain browsers
	header("Content-Type: application/force-download");
	header("Content-Disposition: attachment; filename=\"".basename($file_path)."\";" );
	header("Content-Transfer-Encoding: binary");
	readfile("$file_path");
	fclose($file);

	/*
	if (!$res) {
		die('エラー: ' . mysql_error());
	}else{
	fclose($file);
	echo "ダウンロードしました";

	//unlink("$file_path");
	}*/
//}else{
//	include "export_csv.html";
//}

//include('page_footer.php');
?>

