<?php
include('page_header.php');
include_once('db_inc.php');

    // ファイル取得

    $file = new SplFileObject('test.csv');

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




?>

