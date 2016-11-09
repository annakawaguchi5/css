<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
	$year = $_SESSION['year'];

	// 今日の日付を取得
	$now = new DateTime();
	$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
	$disp = $now->format('Y/m/d H:i:s');
	$now = $now->format('Y-m-d H:i:s');

	// ログイン中のユーザ($uid)の決定状況を検索する
	$sql = "SELECT * FROM tb_decide WHERE uid = '$uid';";
	//テーブル作成後、変更あるえる
	$rs = mysql_query($sql, $conn);
	$row = mysql_fetch_array($rs) ;

	if (!$rs){
		echo 'データがありません。';
		echo ('エラー: ' . mysql_error());
	}else{
		//コース名、締め切りを検索
		$sql="SELECT * FROM tb_course NATURAL JOIN tb_limit WHERE year=$year";
		$rs = mysql_query($sql, $conn);
		if(!$rs)echo('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;

		$stime=$row['stime'];
		$ltime=$row['ltime'];
		$dispstime=date("Y/m/d H:i:s",strtotime($stime));
		$displtime=date("Y/m/d H:i:s",strtotime($ltime));

		echo '<div class="bg-warning">';
		echo '<h1>現在状況</h1>';
		echo '<p ><strong style="color:red;">'.$disp.'</strong><strong> 現在</strong></p>';
		echo '<h1 class="text-center">';
		if(strtotime($stime)<strtotime($now) && strtotime($now)<strtotime($ltime)){ //提出時間内
			echo '只今、調査実施中です。<br>締め切りは<strong style="color:red;">'.$displtime.'</strong>です。';
		}else if(strtotime($now)<strtotime($stime)){	//実施前
			echo '只今、調査実施前です。<br>本システムは<strong style="color:red;">'.$dispstime.'</strong>開始を予定しております。<br>もうしばらくお持ち下さい。';
		}else if(strtotime($ltime)<strtotime($now)){	//終了後
			if($row){
				echo '調査は終了しました。<br><small>おめでとうございます!<br>あなたは</small>'.$row['cname'].'<small>に決定しました。</small>';
			}else{
				echo '調査は終了しました。<br><small>あなたは</small>コース未決定<small>です。<br>もうしばらくお待ち下さい。</small>';
			}
		}
		echo '</h1></div>';
	}
}else { // その以外は
	echo 'エラー：この機能を利用する権限がありません';
}
include('page_footer.php');//画面出力終了
?>