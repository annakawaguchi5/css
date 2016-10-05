<?php
include('page_header.php');
include_once('db_inc.php');

/**
 * 成功時のメッセージ表示
 * csvミスのとき上のSQLが動く←再度入れられない
 */

if(isset($_POST['act'])){
	$year = $_POST['year'];
	$stime = $_POST['stime'];
	$ltime = $_POST['ltime'];
	$act = $_POST['act'];

	if($act=="insert"){	//新規作成
		//年度がないか確認
		$sql = "SELECT * FROM tb_limit WHERE year=".$year;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs);

		if(!$row){	//同じ年度が存在しないとき
			//tb_limitにデータを追加
			$sql = "INSERT INTO tb_limit VALUES ('$year', '$stime','$ltime',now())";
			$rs = mysql_query($sql, $conn);
			if (!$rs) die ('エラー: ' . mysql_error());
		}else{
			echo '指定された年度は存在します。<br>';
			echo '再度、新規作成する際は<a href="new_year.php">こちら</a>へ<br>';
			echo '年度一覧へは<a href="year.php">こちら</a>へ';
		}


		/**
		 * コース名を決定
		 */
		$course=$_POST['コース名'];
		$gp=$_POST['単位数'];
		$gpa=$_POST['GPA'];
		$detail=$_POST['コース説明'];
		$cid=$_POST['cid'];
		if($act=="insert"){
			$sql ="INSERT INTO tb_course VALUES ('$year', '$cid', '$course', '$detail', '$gp', '$gpa')" ;
			$res = mysql_query( $sql, $conn );
		}else{
			$sql ="UPDATE tb_course SET year='$year', cid='$cid', cname='$course', detail='$detail', gp='$gp', gpa='$gpa' WHERE year='$year' AND cid='$cid'" ;
			$res = mysql_query( $sql, $conn );
		}

		if(isset($_POST['コース名1'])){
			$course1=$_POST['コース名1'];
			$gp1=$_POST['単位数1'];
			$gpa1=$_POST['GPA1'];
			$detail1=$_POST['コース説明1'];
			$cid1=$_POST['cid1'];

			if($act=="insert"){
				$sql ="INSERT INTO tb_course VALUES ('$year', '$cid1', '$course1', '$detail1', '$gp1', '$gpa1')" ;
				$res = mysql_query( $sql, $conn );
			}else{
				$sql ="UPDATE tb_course SET year='$year', cid='$cid1', cname='$course1', detail='$detail1', gp='$gp1', gpa='$gpa1' WHERE year='$year' AND cid='$cid1'";
				$res = mysql_query( $sql, $conn );
			}
		}

		if (!$res) {
			echo "決定に失敗しました。";
			die('エラー: ' . mysql_error());
		}else{
			echo "決定しました。";
			?>
<div class="center-block">
	「ユーザ登録」を行いますか？
	<?php echo '<a href="importCsv.php?year='.$year.'">';?>
	<button class="btn btn-danger">はい</button>
	</a> <a href="year.php"><button class="btn btn-primary">いいえ</button> </a>
</div>
	<?php
	//開設メッセージの通知登録
	$title=$year."年度のコース希望調査システムを開設しました。";
	$message=$title."<br>ご自身のデータが正しいことをご確認下さい。<br>もし不具合やご不明な点等ありましたら、画面右上にあります「お問合せ」よりメッセージをお送りください。";
	$sql = "INSERT INTO tb_info VALUES ('$title', '$message', 1239, '$year', now())";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
		}
	}else{	//変更
		//tb_limitのデータを変更
		$sql = "UPDATE tb_limit SET year='$year', stime='$stime', ltime='$ltime', etime=now() WHERE year='$year'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());

		//変更メッセージの通知登録
		$title=$year."年度の基本データを変更しました。";
		$message=$title."<br>ご確認下さい。<br>もし不具合やご不明な点等ありましたら、画面右上にあります「お問合せ」よりメッセージをお送りください。";
		$sql = "INSERT INTO tb_info VALUES ('$title', '$message', 1239, '$year', now())";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
	}
	?>



	<?php
}

include('page_footer.php');
?>