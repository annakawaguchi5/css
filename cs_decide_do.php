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
		$act_decide=$_POST['act'];

		foreach( $chk_sougo as $c=>$a  ) {
			$output[] = array($chk_sougo[$c], $act_decide[$c]);
		}
		foreach($output as $k=>$f){
			echo $uid=$f[0];
			echo $act=$f[1];






			//echo $act  = $_POST['act'] ;
			$cid  = $_POST['cid'] ;

			$sql = "SELECT uname FROM tb_user WHERE uid='$uid'";
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			while($row){
				$uname=$row['uname'];

				if ($act == 'insert'){//新規登録の場合
					$sql = "INSERT INTO tb_decide VALUES('$uid','$uname','$cid')";
					echo "<h2>総合コース：登録しました</h2>";
				}else{//再登録の場合
					$sql = "UPDATE tb_decide SET uid='$uid', uname='$uname', cid='$cid' WHERE uid='$uid'";
					echo "<h2>総合コース：更新しました</h2>";
				}
				$rs_sougo = mysql_query($sql, $conn); //SQL文を実行

				if (!$rs){
					echo "<h2>総合コース：登録が失敗しました</h2>";

					echo mysql_error();
				}




				$row = mysql_fetch_array($rs) ;
			}



		}

		echo '<p><a href="cs_decide.php">戻る</a>';

	}else

	//応用コース用/////////////////////////////////////////
	if(isset($_POST['chk_ouyo'])){
		$chk_sougo=$_POST['chk_ouyo'];
		$act_decide=$_POST['act'];

		foreach( $chk_sougo as $c=>$a  ) {
			$output[] = array($chk_sougo[$c], $act_decide[$c]);
		}
		foreach($output as $k=>$f){
			echo $uid=$f[0];
			echo $act=$f[1];






			//echo $act  = $_POST['act'] ;
			$cid  = $_POST['cid'] ;

			$sql = "SELECT uname FROM tb_user WHERE uid='$uid'";
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			while($row){
				$uname=$row['uname'];

				if ($act == 'insert'){//新規登録の場合
					$sql = "INSERT INTO tb_decide VALUES('$uid','$uname','$cid')";
					echo "<h2>総合コース：登録しました</h2>";
				}else{//再登録の場合
					$sql = "UPDATE tb_decide SET uid='$uid', uname='$uname', cid='$cid' WHERE uid='$uid'";
					echo "<h2>総合コース：更新しました</h2>";
				}
				$rs_sougo = mysql_query($sql, $conn); //SQL文を実行

				if (!$rs){
					echo "<h2>総合コース：登録が失敗しました</h2>";

					echo mysql_error();
				}




				$row = mysql_fetch_array($rs) ;
			}



		}

		echo '<p><a href="cs_decide.php">戻る</a>';


	}else
	#########################################

	//未提出者用///////////////////////////////////////////////
	if(isset($_POST['chk_mitei'])){
		$chk_sougo=$_POST['chk_mitei'];
		$act_decide=$_POST['act'];

		foreach( $chk_sougo as $c=>$a  ) {
			$output[] = array($chk_sougo[$c], $act_decide[$c]);
		}
		foreach($output as $k=>$f){
			echo $uid=$f[0];
			echo $act=$f[1];






			//echo $act  = $_POST['act'] ;
			$cid  = $_POST['cid'] ;

			$sql = "SELECT uname FROM tb_user WHERE uid='$uid'";
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			while($row){
				$uname=$row['uname'];

				if ($act == 'insert'){//新規登録の場合
					$sql = "INSERT INTO tb_decide VALUES('$uid','$uname','$cid')";
					echo "<h2>総合コース：登録しました</h2>";
				}else{//再登録の場合
					$sql = "UPDATE tb_decide SET uid='$uid', uname='$uname', cid='$cid' WHERE uid='$uid'";
					echo "<h2>総合コース：更新しました</h2>";
				}
				$rs_sougo = mysql_query($sql, $conn); //SQL文を実行

				if (!$rs){
					echo "<h2>総合コース：登録が失敗しました</h2>";

					echo mysql_error();
				}




				$row = mysql_fetch_array($rs) ;
			}



		}

		echo '<p><a href="cs_decide.php">戻る</a>';



	}else{ //エラーを表示
		echo '<h2>エラー：希望コースまたは決定するユーザIDが選択されていません</h2>';
		echo '<p><a href="cs_decide.php">戻る</a>';
	}

}



include('page_footer.php');
?>