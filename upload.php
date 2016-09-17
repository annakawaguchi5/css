<?php
include('page_header.php');
include_once('db_inc.php');

$num=0;
if (is_uploaded_file($_FILES["csvfile"]["tmp_name"])) {
	$file_tmp_name = $_FILES["csvfile"]["tmp_name"];
	$file_name = $_FILES["csvfile"]["name"];
	//$up= "/css/";
	//$upa=$up . basename($_FILES["csvfile"]["name"]);
	//拡張子を判定
	if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
		$err_msg = 'CSVファイルのみ対応しています。';
		echo $err_msg;
	} else {
		//ファイルをdataディレクトリに移動               "\css\$file_name"
		if (move_uploaded_file($file_tmp_name, "\css\$file_name")) {
			//後で削除できるように権限を644に
			chmod( "\css\$file_name", 0644);
			$msg = $file_name . "をアップロードしました。";
			echo $msg;
			$importfile =  "\css\$file_name";
			//$fp   = fopen($importfile, "r");

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


				$judge = count( array_count_values( $line ) );

				if( $judge == "" || $line[0] == "" ){

					// 配列の値がすべて空の時の処理

					continue;
				}
				// 1行毎のINSERTデータ格納用
				//$values = "";

				$element = Array(

				0 => '$uid',
				1 => '$uname',
				2 => '$gp',
				3 => '$gpa'
				/*
					$uid => 0,
					$uname => 1,
					$gp => 2,
					$gpa => 3*/
				);

				//foreach ( $line as $line_key => $str ) {
				//$values .= ", ";
				//$num+=1;
				//continue;

				if($num == 0){
					$num++;
					continue;
				}

				foreach($element as $num => $ele ){
					//echo
					$element[$num] = $line[$num];//."\n";
					$element[$num] = mb_convert_encoding( $element[$num], "UTF-8", "SJIS" );

					//$element[$num] = "'".mb_convert_encoding( $ele, "utf-8", "sjis" )."'";
					//echo $line[1];
					//echo $line[1];
					//echo $line[$num];
				};

				$uid=$element[0];
				$uname=$element[1];
				$gp=$element[2];
				$gpa=$element[3];
				//$uname = mb_convert_encoding( $uname, "utf-8", "sjis" );
				//echo $uid;
				//echo $uname;
				//echo $gp;
				//echo $gpa;

				//};
				/*
				 foreach ( $line as $line_key => $str ) {
				 if( $line_key > 0 ){
				 $values .= ", ";
				 }
				 // INSERT用のデータ作成
				 $values .= "'".mb_convert_encoding( $str, "utf-8", "sjis" )."'";
				 }*/
				//var_dump($values);
				// sampleuser, sampleidテーブルの状況を検索する
				//例)0年度　あとはyearをどこからかとってくる

				$state=1;//前期0,年間1
				$year = 2020;
				$sql ="SELECT * FROM tb_user natural join tb_gp WHERE uid='$uid'; ";
				$rs = mysql_query($sql, $conn);
				$row= mysql_fetch_array($rs);



				//前期　作成AND更新
				if($state==0){
					if(!$row){//新規作成
						$sql = "INSERT INTO tb_gp( year,uid, halfgp, halfgpa,allgp,allgpa) VALUES ('$year','$uid','$gp','$gpa',0,0)";
						$rs = mysql_query($sql, $conn);
						echo $sql."<br>";
						$sql="INSERT INTO tb_user( year, uid, uname, upass, urole) VALUES ('$year','$uid','$uname','abcd',1)";
						$rs = mysql_query($sql, $conn);
						echo $sql."<br>";

						echo "前期のデータが登録されました";

					}else if($row){//更新
						$sql="UPDATE tb_gp SET year='$year' , halfgp='$gp', halfgpa='$gpa' WHERE uid='$uid'";
						$rs = mysql_query($sql, $conn);
						echo $uid.$sql."<br>";
						$sql="UPDATE tb_user SET year='$year' ,uname='$uname' WHERE uid='$uid'";
						$rs = mysql_query($sql, $conn);
						echo $uid.$sql."<br>";

						echo "前期のデータが更新されました";

					}

				}else if($state==1){
					if($row){//更新else　error
						$sql="UPDATE tb_gp SET year='$year' , allgp='$gp', allgpa='$gpa' WHERE uid='$uid'";
						$rs = mysql_query($sql, $conn);
						echo $uid.$sql."<br>";
						$sql="UPDATE tb_user SET year='$year' ,uname='$uname' WHERE uid='$uid'";
						$rs = mysql_query($sql, $conn);
						echo $uid.$sql."<br>";

						echo "年間のデータが更新されました";

					}else{
						echo "ERROR  前期のデータが入っていません";
					}
				}
				/*
				 }
				 if(!$row){
					//新規作成用sql
					$sql = "INSERT INTO tb_gp( year,uid, halfgp, halfgpa,allgp,allgpa) VALUES ('$year','$uid','$gp','$gpa',0,0)";
					$rs = mysql_query($sql, $conn);
					echo $sql."<br>";
					$sql="INSERT INTO tb_user( year, uid, uname, upass, urole) VALUES ('$year','$uid','$uname','abcd',1)";
					$rs = mysql_query($sql, $conn);
					echo $sql."<br>";
					}else if($row){
					//更新用

					$sql="UPDATE tb_gp SET year='$year' , allgp='$gp', allgpa='$gpa' WHERE uid='$uid'";
					$rs = mysql_query($sql, $conn);
					echo $uid.$sql."<br>";
					$sql="UPDATE tb_user SET year='$year' ,uname='$uname' WHERE uid='$uid'";
					$rs = mysql_query($sql, $conn);
					echo $uid.$sql."<br>";

					}
					*/



				//$rs = mysql_query($sql, $conn);
				/*
				 $row= mysql_fetch_array($rs);
				 if($row){
				 $rs1 = mysql_query($sql2, $conn);
				 }else{
				 $rs2 = mysql_query($sql, $conn);
				 }
				 */
				if (!$rs) {
					die('エラー: ' . mysql_error());
				}

				//$row= mysql_fetch_array($rs);
			}
			$file=null;
			#############################################################################
			//fclose($fp);
			//ファイルの削除
			unlink("\css\$file_name");
		} else {
			$err_msg = "ファイルをアップロードできません。";
			echo $err_msg;
		}
	}
}else {
	$err_msg = "ファイルが選択されていません。";
	echo $err_msg;
}


include('page_footer.php');
?>