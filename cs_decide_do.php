<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=3 ) {
	// 教員としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
}else{

	//総合コース用/////////////////////////////////////
	if(isset($_POST['chk_sougo'])){
		echo "sougou";
		$chk_sougo=$_POST['chk_sougo'];
		foreach( $chk_sougo as $c ) {
			echo $uid= $c;

			echo $act  = $_POST['act'] ;
			echo $cid  = $_POST['cid'] ;

			echo $sql = "SELECT uname FROM tb_user WHERE uid='$uid'";
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
		echo "ouyou";
		$chk_sougo=$_POST['chk_ouyo'];
		foreach( $chk_sougo as $c ) {
			echo $uid= $c;

			echo $act  = $_POST['act'] ;
			echo $cid  = $_POST['cid'] ;

			$sql = "SELECT uname FROM tb_user WHERE uid='$uid'";
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			while($row){

				echo $uname=$row['uname'];


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
		echo "miteishutu";
		$chk_sougo=$_POST['chk_mitei'];
		foreach( $chk_sougo as $c ) {
			echo $uid= $c;

			echo $act  = $_POST['act'] ;
			echo $cid  = $_POST['cid'] ;

			$sql = "SELECT uname FROM tb_user WHERE uid='$uid'";
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
			$row = mysql_fetch_array($rs) ;

			while($row){

				echo $uname=$row['uname'];


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

	//一人ずつ////////////////////////////////////////////////////
	if (isset($_POST['cid'])){
		echo "hitoriboti";
		if (isset($_POST['uid'])){
			echo $cid=$_POST['cid'];
			echo $uid=$_POST['uid'];
			echo $uname = $_POST['uname'];
			echo $act  = $_POST['act'] ;//送信されたactを受け取り、$actに代入

			if ($act == 'insert'){//新規登録の場合
				$sql = "INSERT INTO tb_decide VALUES('$uid','$uname','$cid')";
				echo "<h2>登録しました</h2>";
			}else{//再登録の場合
				$sql = "UPDATE tb_decide SET uid='$uid', uname='$uname', cid='$cid' WHERE uid='$uid'";
				echo "<h2>更新しました</h2>";
			}
			$rs = mysql_query($sql, $conn); //SQL文を実行
			if (!$rs){
				echo "<h2>登録が失敗しました</h2>";
				echo mysql_error();
			}else{
				//header('cs_decide.php');
			}
		}else{ //エラーを表示
			echo '<h2>エラー：希望コースまたは決定するユーザIDが選択されていません</h2>';
			echo '<p><a href="cs_decide.php">戻る</a>';
		}

	}else{ //エラーを表示
		echo '<h2>エラー：希望コースまたは決定するユーザIDが選択されていません</h2>';
		echo '<p><a href="cs_decide.php">戻る</a>';
	}

}



include('page_footer.php');
?>