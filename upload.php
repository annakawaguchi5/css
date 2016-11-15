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
		$sql = "SELECT * FROM tb_limit WHERE year='$year'";
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
	}


		/**
		 * コース名を決定
		 */
		if(isset($_POST['course'])){
			$cname1=$_POST['cname1'];
			$gp1=$_POST['gp1'];
			$gpa1=$_POST['gpa1'];
			$detail1=$_POST['detail1'];
			$cname2=$_POST['cname2'];
			$gp2=$_POST['gp2'];
			$gpa2=$_POST['gpa2'];
			$detail2=$_POST['detail2'];

		if($gp1==0||$gp1=="" && $gpa1==0 ||$gpa1==""){
				$cid1=1;
			}else{
				$cid1=2;
			}

		if($gp2==0||$gp2=="" && $gpa2==0 ||$gpa2==""){
				$cid2=1;
			}else{
				$cid2=2;
			}

		if($act=="insert"){
				$sql ="INSERT INTO tb_course VALUES ($year, $cid1, '$cname1', '$detail1', $gp1, $gpa1)" ;
				$res = mysql_query( $sql, $conn );
				$sql ="INSERT INTO tb_course VALUES ('$year', '$cid2', '$cname2', '$detail2', $gp2, $gpa2)" ;
				$res = mysql_query( $sql, $conn );
				if (!$res) die ('エラー: ' . mysql_error());
			}else{
				$sql ="UPDATE tb_course SET year=$year, cid=$cid1, cname='$cname1', detail='$detail1', gp=$gp1, gpa=$gpa1 WHERE year=$year AND cid=$cid1";
				$res = mysql_query( $sql, $conn );
				$sql ="UPDATE tb_course SET year=$year, cid=$cid2, cname='$cname2', detail='$detail2', gp=$gp2, gpa=$gpa2 WHERE year=$year AND cid=$cid2";
				$res = mysql_query( $sql, $conn );
				if (!$res) die ('エラー: ' . mysql_error());
			}
		}
	/*
		if(isset($_POST['list6_0_0'])){
			//echo $act;
			$course=$_POST['list6_0_0'];
			$gp=$_POST['list6_1_0'];
			$gpa=$_POST['list6_2_0'];
			$detail=$_POST['list6_3_0'];
			if($gp==0||$gp=="" && $gpa==0 ||$gpa==""){
				$cid=1;
			}else{
				$cid=2;
			}

			if($act=="insert"){
				$sql ="INSERT INTO tb_course VALUES ('$year', '$cid', '$course', '$detail', '$gp', '$gpa')" ;
				$res = mysql_query( $sql, $conn );
				if (!$res) die ('エラー: ' . mysql_error());
			}else{
				$sql ="UPDATE tb_course SET year='$year', cid='$cid', cname='$course', detail='$detail', gp='$gp', gpa='$gpa' WHERE year='$year' AND cid='$cid'" ;
				$res = mysql_query( $sql, $conn );
				if (!$res) die ('エラー: ' . mysql_error());
			}
		}

		if(isset($_POST['list6_0_1'])){
			$course1=$_POST['list6_0_1'];
			$gp1=$_POST['list6_1_1'];
			$gpa1=$_POST['list6_2_1'];
			$detail1=$_POST['list6_3_1'];
			if($gp1==0||$gp1=="" && $gpa1==0 ||$gpa1==""){
				$cid1=1;
			}else{
				$cid1=2;
			}

			if($act=="insert"){
				$sql ="INSERT INTO tb_course VALUES ('$year', '$cid1', '$course1', '$detail1', '$gp1', '$gpa1')" ;
				$res = mysql_query( $sql, $conn );
				if (!$res) die ('エラー: ' . mysql_error());
			}else{
				$sql ="UPDATE tb_course SET year='$year', cid='$cid1', cname='$course1', detail='$detail1', gp='$gp1', gpa='$gpa1' WHERE year='$year' AND cid='$cid1'";
				$res = mysql_query( $sql, $conn );
				if (!$res) die ('エラー: ' . mysql_error());
			}
		}
		*/

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


include('page_footer.php');
?>