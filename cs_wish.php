<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続
?>

<style>
table{text-align:center;}
th{background-color:skyblue;}
</style>

<?php
if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
	$year = $_SESSION['year']; //認証済みの年度
}

//開始・締め切り時刻をチェック
$sql = "select * from tb_limit where year='$year'";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$stime = $row['stime']; //開始時刻
$ltime = $row['ltime']; //締め切り時刻

// 今日の日付を取得
$now = new DateTime();
$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
$now = $now->format('Y-m-d H:i:s');

if(strtotime($stime)<strtotime($now) && strtotime($now)<strtotime($ltime)){ //提出時間内
	echo '<h2>コース希望登録</h2>';

/**
* 要件
*/
$sql = "SELECT * FROM tb_course WHERE year=".$year;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

echo '<div>';
echo '<h3>登録要件</h3>';
echo '<table class="table-hover table-bordered">';
echo '<tr><th>コース名</th><th>修得単位数</th><th>GPA</th></tr>';
while($row){
if($row['gp']==""){
$row['gp']="なし";
}
if($row['gpa']==""){
$row['gpa']="なし";
}

echo '<tr><td>'.$row['cname'].'</td>';
echo '<td>'.$row['gp'].'</td>';
echo '<td>'.$row['gpa'].'</td></tr>';
$row = mysql_fetch_array($rs) ;
}
echo '</table></div>';

/**
* 成績情報
*/
$sql = "SELECT * FROM tb_gp WHERE uid='$uid'";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

echo '<div>';
echo '<h3>成績情報</h3>';
if($row){
echo '<h5>あなたの成績は</h5>';
echo '<table class="table-hover table-bordered">';
echo '<tr><th></th><th>修得単位数</th><th>GPA</th></tr>';
echo '<tr><th>前期</th><td>'.$row['halfgp'].'</td><td>'.$row['halfgpa'].'</td></tr>';
echo '<tr><th>後期</th><td>'.$row['allgp'].'</td><td>'.$row['allgpa'].'</td></tr>';
echo '</table>';
}else{
echo '成績情報がありません。';
}
echo '</div>';
?>

<?php
/**
* フォーム
*/

	//変数の初期化
	$cid = 1;         //希望のコースID;
	$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;

	//コース決定済みでないかチェック
	$sql = "select * from tb_entry where uid='$uid' not in(select uid from tb_decide)";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;

	if($row==null){
		// ログイン中のユーザ($uid)の希望状況を検索する
		$sql = "select * from tb_entry where uid = '$uid';";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;

		if ($row) {
			$cid = $row['cid']; // 現在登録しているコースのID
			$act = 'update';    // すでに登録したため「再登録」とする
		}
		echo '<form class="form-horizontal container" action="cs_wish_save.php" method="post">';
		echo '<input type="hidden" name="act" value="'.  $act .'">'; //非表示送信

		//コース情報を取得
		$sql = "select * from tb_course where year=".$year;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;

		while($row){
			if ($row['cid'] == $cid){  //登録状況を反映したラジオボタンを作成
				echo '<input type="radio" name="cid" value="'.$row['cid'].'" checked>'.$row['cname'].'<br>';
			}else if($row['cid'] != $cid){
				echo '<input type="radio" name="cid" value="'.$row['cid'].'">'.$row['cname'].'<br>';
			}
			$row = mysql_fetch_array($rs) ;
		}

		echo '<div class="form-group">';
		echo '<label for="note" class="text-danger">興味のある研究分野や自己アピール</label>';
		echo '<textarea class="form-control" name ="note"></textarea>';
		echo '</div></h3>';

		echo '<button type="submit" class="btn btn-default col-sm-offset-1">送信</button>';
		echo '</form>';
	}else{
		echo 'コースが決定しているため、この機能は利用できません。</h3>';
	}
}else { // 提出時間外
	echo '<h1 style="color:red;">提出期間外のため希望提出できません!</h1>';
}
include('page_footer.php');//画面出力終了
?>
