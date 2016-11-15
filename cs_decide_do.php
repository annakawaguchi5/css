<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=3 ) {
	// 教員としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
}else{
	if(isset($_POST['uid'])){
		$year=$_POST['year'];
		$uid=$_POST['uid'];
		//$cid=$_POST['cid'];

		foreach($uid as $u){
			if(isset($_POST[$u])){
				$user[]=$_POST[$u];
			}else{
				$user[]="0";
			}
		}

		foreach($uid as $r=>$t){
			if($user[$r]!=0){
				//uidからユーザ情報を調べる
				$sql = "SELECT uname FROM tb_user NATURAL JOIN tb_gp WHERE uid='$t'";
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
WHERE uid='$t')";
				//echo $sql;
				$rs = mysql_query($sql, $conn);
				if (!$rs) die ('エラー: ' . mysql_error());
				$row = mysql_fetch_array($rs) ;


				//追加 or 更新
				if($row[0]==1){
					$act='update';
					$sql="UPDATE tb_decide SET uid='$t', uname='$uname', cid=$user[$r] WHERE uid='$t'";
					//echo $sql;
				}else{
					$act='insert';
					$sql="INSERT INTO tb_decide VALUES ('$t', '$uname', $user[$r])";
					//echo $sql;
				}
				//実行
				$rs = mysql_query($sql, $conn);
				if (!$rs) die ('エラー: ' . mysql_error());

			}
		}


		/*
		 while($row){
		 $user[]=$_POST[$row['uid']];

		 $row = mysql_fetch_array($rs) ;
		 }
		 */
		//var_dump($uid);
		//var_dump($user);

	}
}
include('page_footer.php');
?>