<?php
include('page_header.php');
include_once('db_inc.php');

if (is_uploaded_file($_FILES["csvfile"]["tmp_name"])) {
	$file_tmp_name = $_FILES["csvfile"]["tmp_name"];
	$file_name = $_FILES["csvfile"]["name"];
	//拡張子を判定
	if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
		$err_msg = 'CSVファイルのみ対応しています。';
		echo $err_msg;
	} else {
		//ファイルをdataディレクトリに移動
		if (move_uploaded_file($file_tmp_name, "\css\$file_name")) {
			//後で削除できるように権限を644に
			chmod("\css\$file_name", 0644);
			$msg = $file_name . "をアップロードしました。";
			echo $msg;
			$importfile = "\css\$file_name";
			$fp   = fopen($importfile, "r");

			######################################################################
			//配列に変換する
			/*
			 while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
			 $asins[] = $data;
			 //var_dump($data);
			 }
			 */

			########################################################################

			// ファイル取得

			$file = new SplFileObject($importfile);

			$file->setFlags(SplFileObject::READ_CSV);

			// 全行のINSERTデータ格納用
			$ins_values = "";
			// ファイル内のデータループ

			foreach ( $file as $key => $line ) {
				if($line[0]==null){
					$line[0] = "";
					//		echo 'null';
				}
				// 配列の値がすべて空か判定
				//        var_dump($line);
				$judge = count( array_count_values( $line ) );

				if( $judge == "" || $line[0] == "" ){

					// 配列の値がすべて空の時の処理
					continue;
				}

				// 1行毎のINSERTデータ格納用
				$values = "";

				foreach ( $line as $line_key => $str ) {

					if( $line_key > 0 ){

						$values .= ", ";
					}

					// INSERT用のデータ作成
					$values .= "'".mb_convert_encoding( $str, "utf-8", "sjis" )."'";
				}

				if( !empty( $ins_values ) ){

					$ins_values .= ", ";
				}

				$ins_values .= "(". $values;

				$sql = "INSERT INTO sampleuser( uid, uname, halfgp, halfgpa,allgp,allgpa,upass,urole ) VALUES (".$values.",0,0,'abcd',1)";
				//    echo $sql."<br>";
				$rs = mysql_query($sql, $conn);
				if (!$rs) {
					die('エラー: ' . mysql_error());
				}
				//$row= mysql_fetch_array($rs);
			}

			#############################################################################
			fclose($fp);
			//ファイルの削除
			unlink("\css\$file_name");
		} else {
			$err_msg = "ファイルをアップロードできません。";
			echo $err_msg;
		}
	}
} else {
	$err_msg = "ファイルが選択されていません。";
	echo $err_msg;
}

?>

