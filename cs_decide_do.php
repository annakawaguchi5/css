<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=3 ) {
	// 教員としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
}else{

	//総合コース用/////////////////////////////////////
	if(isset($_POST['chk_sougo'])){
		$chk_sougo=$_POST['chk_sougo'];
		//$act_decide=$_POST['act'];
		$cid  = $_POST['cid'] ;
		$year = $_POST['year'];

		//cid,yearからコース情報を調べる
		$sql = "SELECT cname FROM tb_course WHERE cid='$cid' AND year=$year";
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		$cname=$row['cname'];

		foreach( $chk_sougo as $c  ) {
			$uid=$c;

			//uidからユーザ情報を調べる
			$sql = "SELECT uname FROM tb_user WHERE uid='$uid' AND year=$year";
			//echo $sql;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			$uname=$row['uname'];

			//決定済み確認用////////////////////
			/*決定済み1, 未決定0*/
			$sql = "SELECT EXISTS(SELECT uid,cid
FROM tb_decide
NATURAL JOIN tb_user
WHERE uid='$uid')";
			//echo $sql;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			//追加 or 更新
			if($row[0]==1){
				$act='update';
				$sql="UPDATE tb_decide SET uid='$uid', uname='$uname', cid=$cid WHERE uid='$uid'";
				//echo $sql;
			}else{
				$act='insert';
				$sql="INSERT INTO tb_decide VALUES ('$uid', '$uname', $cid)";
				//echo $sql;
			}
			//実行
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());



			if ($act == 'insert'){//新規登録の場合
				echo "<h2>".$uname."を".$cname."に登録しました</h2>";
			}else{//再登録の場合
				echo "<h2>".$uname."を".$cname."に更新しました</h2>";
			}

			if (!$rs){
				echo "<h2>登録が失敗しました</h2>";
				echo mysql_error();
			}
		}
		echo '<p><a href="cs_decide.php">戻る</a>';
	}else{ //エラーを表示
		//echo '<h2>エラー：希望コースまたは決定するユーザIDが選択されていません</h2>';
	}



	//応用コース用/////////////////////////////////////////
	if(isset($_POST['chk_ouyo'])){
		$chk_ouyo=$_POST['chk_ouyo'];
		//$act_decide=$_POST['act'];
		$cid  = $_POST['cid'] ;
		$year = $_POST['year'];

		//cid,yearからコース情報を調べる
		$sql = "SELECT cname FROM tb_course WHERE cid='$cid' AND year=$year";
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		$cname=$row['cname'];

		foreach( $chk_ouyo as $c  ) {
			$uid=$c;

			//uidからユーザ情報を調べる
			$sql = "SELECT uname FROM tb_user WHERE uid='$uid' AND year=$year";
			//echo $sql;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			$uname=$row['uname'];

			//決定済み確認用////////////////////
			/*決定済み1, 未決定0*/
			$sql = "SELECT EXISTS(SELECT uid,cid
FROM tb_decide
NATURAL JOIN tb_user
WHERE uid='$uid')";
			//echo $sql;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			//追加 or 更新
			if($row[0]==1){
				$act='update';
				$sql="UPDATE tb_decide SET uid='$uid', uname='$uname', cid=$cid WHERE uid='$uid'";
				//echo $sql;
			}else{
				$act='insert';
				$sql="INSERT INTO tb_decide VALUES ('$uid', '$uname', $cid)";
				//echo $sql;
			}
			//実行
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());



			if ($act == 'insert'){//新規登録の場合
				echo "<h2>".$uname."を".$cname."に登録しました</h2>";
			}else{//再登録の場合
				echo "<h2>".$uname."を".$cname."に更新しました</h2>";
			}

			if (!$rs){
				echo "<h2>登録が失敗しました</h2>";
				echo mysql_error();
			}
		}echo '<p><a href="cs_decide.php">戻る</a>';
	}else{ //エラーを表示
		//echo '<h2>エラー：希望コースまたは決定するユーザIDが選択されていません</h2>';
	}

	#########################################


	//未提出者用///////////////////////////////////////////////
	if(isset($_POST['chk_mitei'])){
		$chk_mitei=$_POST['chk_mitei'];
		//$act_decide=$_POST['act'];
		$cid  = $_POST['cid'] ;
		$year = $_POST['year'];

		//cid,yearからコース情報を調べる
		$sql = "SELECT cname FROM tb_course WHERE cid='$cid' AND year=$year";
		//echo $sql;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		$cname=$row['cname'];

		foreach( $chk_mitei as $c  ) {
			$uid=$c;

			//uidからユーザ情報を調べる
			$sql = "SELECT uname FROM tb_user WHERE uid='$uid' AND year=$year";
			//echo $sql;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			$uname=$row['uname'];

			//決定済み確認用////////////////////
			/*決定済み1, 未決定0*/
			$sql = "SELECT EXISTS(SELECT uid,cid
FROM tb_decide
NATURAL JOIN tb_user
WHERE uid='$uid')";
			//echo $sql;
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			//追加 or 更新
			if($row[0]==1){
				$act='update';
				$sql="UPDATE tb_decide SET uid='$uid', uname='$uname', cid=$cid WHERE uid='$uid'";
				//echo $sql;
			}else{
				$act='insert';
				$sql="INSERT INTO tb_decide VALUES ('$uid', '$uname', $cid)";
				//echo $sql;
			}
			//実行
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());



			if ($act == 'insert'){//新規登録の場合
				echo "<h2>".$uname."を".$cname."に登録しました</h2>";
			}else{//再登録の場合
				echo "<h2>".$uname."を".$cname."に更新しました</h2>";
			}

			if (!$rs){
				echo "<h2>登録が失敗しました</h2>";

				echo mysql_error();
			}
		}echo '<p><a href="cs_decide.php">戻る</a>';
	}else{ //エラーを表示
		//echo '<h2>エラー：希望コースまたは決定するユーザIDが選択されていません</h2>';
	}


}



include('page_footer.php');
?>