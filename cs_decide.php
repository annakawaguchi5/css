<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y/m/d H時i分s秒');


		//最新年を検索 MAX(year)
		$sql = "SELECT MAX(year) FROM tb_limit";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		$year = $row['MAX(year)'];

//要件用gp,gpa取得//////////////////////////////
$sql = "SELECT gp,gpa
FROM tb_course
WHERE YEAR ='$year'
AND cid=2";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

$gp = $row['gp'];
$gpa = $row['gpa'];
//////////////////////////////////////////////


echo "<h1>コース決定一覧</h1>";
echo "<p align='right'><strong style='color:red;'>".$now."</strong>
<strong> 現在</strong></p>";
?>
<style>
.button_wall {
	text-align: right;
}
input[type=checkbox] {
  transform: scale(1.5);
}
</style>

<script type="text/javascript">

    // 引数 bool flg
    //   →チェックをonにするならtrue、offにするならfalse
	function checkbox_changer_sougo( flg ) {

        var obj = document.frmPeropero_sougo.elements['chk_sougo[]'];
        var len = obj.length;

        if( !len ) {
            // checkboxが一つしかないときはこちらの処理
            if( !obj.disabled ) {
                // 有効なcheckboxだけチェックする
                obj.checked = flg;
            }
        }
        else {
            // checkboxが複数あるときはこちらの処理
            for( i=0; i < len; i++ ) {
                if( !obj[i].disabled ) {
                    // 有効なcheckboxだけチェックする
                    obj[i].checked = flg;
                }
            }
        }

    }

    function checkbox_changer_ouyo( flg ) {

        var obj = document.frmPeropero_ouyo.elements['chk_ouyo[]'];
        var len = obj.length;

        if( !len ) {
            // checkboxが一つしかないときはこちらの処理
            if( !obj.disabled ) {
                // 有効なcheckboxだけチェックする
                obj.checked = flg;
            }
        }
        else {
            // checkboxが複数あるときはこちらの処理
            for( i=0; i < len; i++ ) {
                if( !obj[i].disabled ) {
                    // 有効なcheckboxだけチェックする
                    obj[i].checked = flg;
                }
            }
        }

    }

    function checkbox_changer_mitei( flg ) {

        var obj = document.frmPeropero_mitei.elements['chk_mitei[]'];
        var len = obj.length;

        if( !len ) {
            // checkboxが一つしかないときはこちらの処理
            if( !obj.disabled ) {
                // 有効なcheckboxだけチェックする
                obj.checked = flg;
            }
        }
        else {
            // checkboxが複数あるときはこちらの処理
            for( i=0; i < len; i++ ) {
                if( !obj[i].disabled ) {
                    // 有効なcheckboxだけチェックする
                    obj[i].checked = flg;
                }
            }
        }

    }

</script>



<?php





//総合コース/////////////////////////////////////////////////////////////////
//コース名のみ
$sql = "SELECT cname
FROM tb_course
WHERE YEAR ='$year'
AND cid=2";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
echo "<h2>".$row['cname']."</h2>";
///////////////////////////////////////

//学生の値
$sql = "SELECT uid, cid,uname, cname, note, allgp, allgpa
FROM tb_user
NATURAL JOIN tb_gp
NATURAL JOIN tb_entry
NATURAL JOIN tb_course
WHERE YEAR ='$year'
AND cid=2";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

?>




<form action="cs_decide_do.php" name="frmPeropero_sougo"
	class="form-horizontal" method="POST">
	<?php
	echo '<table border=0 class="table table-striped table-hover table-bordered">';
	echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース結果</th></tr>';//cssで決定ボタンを追加

	//決定済み確認用////////////////////
	/*
	 $sql_decide = "SELECT uid
	 FROM tb_decide
	 NATURAL JOIN tb_user
	 WHERE YEAR ='$year'
	 ";
	 $rs_decide = mysql_query($sql_decide, $conn);
	 if (!$rs_decide) die ('エラー: ' . mysql_error());
	 $row_decide = mysql_fetch_array($rs_decide) ;
	 */
	//////////////////////////////////////

	while($row){




		//学生情報を検索

		$cid=$row['cid'];
		$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
		if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
			$judge = "◯";
		}else{
			$judge = "✕";
		}
		//希望提出済みコース未決定の学生情報を検索
		$class1 = "default";
		$class2 = "default";


		//決定されてるかどうか判別
	$sql_decide = "SELECT uid,cid
FROM tb_decide
NATURAL JOIN tb_user
WHERE YEAR ='$year'
";
		$rs_decide = mysql_query($sql_decide, $conn);
		if (!$rs_decide) die ('エラー: ' . mysql_error());
		$row_decide = mysql_fetch_array($rs_decide) ;



		while($row_decide){
			$user=$row_decide['uid'];
			$user_decide=$row_decide['cid'];
			if($row['uid']==$user){
				$act = 'update';    // すでに登録したため「再登録」とする
				if($user_decide == 1){
					$class1 = "danger";
					$class2 = "default";
				}else if($user_decide == 2){
					$class1 = "default";
					$class2 = "primary";
				}

			}

			$row_decide = mysql_fetch_array($rs_decide) ;
		}

		$act;
		$uid=$row['uid'];
		$uname=$row['uname'];
		echo '<tr>'?>


	<input type="hidden" name="act[]" value="<?php echo $act;?>">
	<td><input type="checkbox" name="chk_sougo[]"
		value="<?php echo $uid; ?>"></td>




		<?php


		echo '<td>' . $row['uid'] . '</td>';
		echo '<td>' . $row['uname']. '</td>';
		echo '<td>' . $row['cname'] . '</td>';
		echo '<td>' . $row['note'] . '</td>';
		echo '<td>' . $row['allgp'] . '</td>';
		echo '<td>' . $row['allgpa'] . '</td>';
		echo '<td style="color:red">' . $judge . '</td>';

		//$disabled = "disabled";

		echo'<td>




		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" $disabled>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" $disabled>総合</button>
		</td>';
		echo '</tr>';


		$row = mysql_fetch_array($rs) ;
	}echo '</table>';

	 if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
   //教員（権限なし）としてログインしているなら
   $disabled = "disabled";
  }else{
   $disabled = "";
  }

  echo '<button class="btn btn-danger" type="submit" name="cid" value="1"
	 '.$disabled.'>応用</button>';
	 echo '<button class="btn btn-primary" type="submit" name="cid" value="2"
	 '.$disabled.'>総合</button>';?>
	<a href="javascript:void(0)"
		onClick="checkbox_changer_sougo(true); return false;">全てチェック</a>| <a
		href="javascript:void(0)"
		onClick="checkbox_changer_sougo(false); return false;">全てのチェックを外す</a><br />

</form>

	<?php
	///////////////////////////////////////////////////////////////////////////

	//応用コース

	//コース名のみ

	$sql = "SELECT cname
FROM tb_course
WHERE YEAR ='$year'
AND cid=1";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	echo "<h2>".$row['cname']."</h2>";
	///////////////////////////////////////

	//学生の値
	$sql = "SELECT uid, cid,uname, cname, note, allgp, allgpa
FROM tb_user
NATURAL JOIN tb_gp
NATURAL JOIN tb_entry
NATURAL JOIN tb_course
WHERE YEAR ='$year'
AND cid=1";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;



	?>

<form action="cs_decide_do.php" name="frmPeropero_ouyo"
	class="form-horizontal" method="POST">




	<?php
	echo '<table border=0 class="table table-striped table-hover table-bordered">';
	echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加



	//////////////////////////////////////

	while($row){

		//学生情報を検索

		$cid=$row['cid'];

		$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
		if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
			$judge = "◯";
		}else{
			$judge = "✕";
		}

		//希望提出済みコース未決定の学生情報を検索



		$class1 = "default";
		$class2 = "default";


		$sql_decide = "SELECT uid,cid
FROM tb_decide
NATURAL JOIN tb_user
WHERE YEAR ='$year'
";
		$rs_decide = mysql_query($sql_decide, $conn);
		if (!$rs_decide) die ('エラー: ' . mysql_error());
		$row_decide = mysql_fetch_array($rs_decide) ;



		while($row_decide){
			$user=$row_decide['uid'];
			$user_decide=$row_decide['cid'];
			if($row['uid']==$user){
				$act = 'update';    // すでに登録したため「再登録」とする
				if($user_decide == 1){
					$class1 = "danger";
					$class2 = "default";
				}else if($user_decide == 2){
					$class1 = "default";
					$class2 = "primary";
				}

			}

			$row_decide = mysql_fetch_array($rs_decide) ;
		}


		$act;
		$uid=$row['uid'];
		$uname=$row['uname'];
		echo '<tr>'?>
	<input type="hidden" name="act[]" value="<?php echo $act;?>">
	<td><input type="checkbox" name="chk_ouyo[]"
		value="<?php echo $uid; ?>"></td>
</form>
		<?php
		echo '<td>' . $row['uid'] . '</td>';
		echo '<td>' . $row['uname']. '</td>';
		echo '<td>' . $row['cname'] . '</td>';
		echo '<td>' . $row['note'] . '</td>';
		echo '<td>' . $row['allgp'] . '</td>';
		echo '<td>' . $row['allgpa'] . '</td>';
		echo '<td style="color:red">' . $judge . '</td>';

		echo'<td>
		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" $disabled>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" $disabled>総合</button>
		</td>';
		echo '</tr>';


		$row = mysql_fetch_array($rs) ;
	}echo '</table>';
	 if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
   //教員（権限なし）としてログインしているなら
   $disabled = "disabled";
  }else{
   $disabled = "";
  }

  echo '<button class="btn btn-danger" type="submit" name="cid" value="1"
	 '.$disabled.'>応用</button>';
	 echo '<button class="btn btn-primary" type="submit" name="cid" value="2"
	 '.$disabled.'>総合</button>';?>
<a href="javascript:void(0)"
	onClick="checkbox_changer_ouyo(true); return false;">全てチェック</a>
|
<a href="javascript:void(0)"
	onClick="checkbox_changer_ouyo(false); return false;">全てのチェックを外す</a>
<br />

</form>
<?php


//未提出/////////////////////////////////////////////////////////////////////////////
echo '<h2>未提出者</h2>';
$sql = "SELECT uid, uname, allgp, allgpa
FROM tb_user
NATURAL JOIN tb_gp
WHERE year='$year'
AND uid NOT
IN (
SELECT uid
FROM tb_entry
)";

$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

?>

<form action="cs_decide_do.php" name="frmPeropero_mitei"
	class="form-horizontal" method="POST">



	<?php
	echo '<table border=0 class="table table-striped table-hover table-bordered">';
	echo '<tr class="info"><th></th><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己アピール</th><th>修得単位数</th><th>GPA</th><th>総合要件</th><th>コース決定</th></tr>';//cssで決定ボタンを追加


	//決定済み確認用////////////////////

	//////////////////////////////////////



	while ($row) {

		$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
		if($row['allgp']>=$gp && $row['allgpa']>=$gpa){
			$judge = "◯";
		}else{
			$judge = "✕";
		}
		//希望提出済みコース未決定の学生情報を検索

		$class1 = "default";
		$class2 = "default";







		//決定済み確認用////////////////////
		$sql_decide = "SELECT uid,cid
FROM tb_decide
NATURAL JOIN tb_user
WHERE YEAR ='$year'
";
		$rs_decide = mysql_query($sql_decide, $conn);
		if (!$rs_decide) die ('エラー: ' . mysql_error());
		$row_decide = mysql_fetch_array($rs_decide) ;



		while($row_decide){
			$user=$row_decide['uid'];
			$user_decide=$row_decide['cid'];
			if($row['uid']==$user){
				$act = 'update';    // すでに登録したため「再登録」とする
				if($user_decide == 1){
					$class1 = "danger";
					$class2 = "default";
				}else if($user_decide == 2){
					$class1 = "default";
					$class2 = "primary";
				}

			}

			$row_decide = mysql_fetch_array($rs_decide) ;
		}



		$act;
		$uid=$row['uid'];
		$uname=$row['uname'];
		echo '<tr>'?>

	<input type="hidden" name="act[]" value="<?php echo $act;?>">
	<td><input type="checkbox" name="chk_mitei[]"
		value="<?php echo $uid; ?>"></td>
</form>
		<?php
		echo '<td>' . $row['uid'] . '</td>';
		echo '<td>' . $row['uname']. '</td>';
		echo '<td>' . "" . '</td>';
		echo '<td>' . "" . '</td>';
		echo '<td>' . $row['allgp'] . '</td>';
		echo '<td>' . $row['allgpa'] . '</td>';
		echo '<td style="color:red">' . $judge . '</td>';

		echo'<td>
		<button class="btn btn-'.$class1.'" type="submit" name="cid" value="1" $disabled>応用</button>
		<button class="btn btn-'.$class2.'" type="submit" name="cid" value="2" $disabled>総合</button>
		</td>';
		echo '</tr>';
		$row = mysql_fetch_array($rs) ;
	}
	echo '</table>';

	 if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
   //教員（権限なし）としてログインしているなら
   $disabled = "disabled";
  }else{
   $disabled = "";
  }

  echo '<button class="btn btn-danger" type="submit" name="cid" value="1"
	 '.$disabled.'>応用</button>';
	 echo '<button class="btn btn-primary" type="submit" name="cid" value="2"
	 '.$disabled.'>総合</button>';?>
<a href="javascript:void(0)"
	onClick="checkbox_changer_mitei(true); return false;">全てチェック</a>
|
<a href="javascript:void(0)"
	onClick="checkbox_changer_mitei(false); return false;">全てのチェックを外す</a>
<br />

</form>
<?php


include('page_footer.php');  //画面出力終了
?>