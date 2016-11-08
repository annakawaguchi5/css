<?php include ('db_inc.php');?>
<div class="row">
<div align="left">
	<a href="index.php"><img src="./img/Course Selection System-logo.png"
		alt="title" align="left"> </a>
		</div>
	<!-- 現在時刻 -->
	<!--
		<div align="right" width="30%" height="30%">
		-->
		<?php //include('clock.php');?>
	<!-- </div> -->

	<!-- カウントダウン -->
	<div align="right">
	<?php include('countdown.php');
	//include('./jquery-yycountdown-master\sample.html');?>
	</div>
</div>

<!-- ナビバー -->
<nav class="navbar navbar-inverse">

<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed"
		data-toggle="collapse" data-target="#navbarEexample3">
		<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
		<span class="icon-bar"></span> <span class="icon-bar"></span>
	</button>
</div>
<div class="collapse navbar-collapse" id="navbarEexample3">

<?php
$menu0 = array(  //共通メニュー:未ログイン
		'お問合せ' => 'goikenbako.php',
 'ログイン'  => 'login.php',
);
$menu = array(
1 => array(  //学生メニュー
	'コース説明'  => 'cs_explain.php',
 '希望提出'  => 'cs_wish.php' ,
//'メッセージ' => 'message.php',
	'パスワード変更' => 'user_passwd_change.php'
	),
	2 => array(  //教員メニュー
	//'希望一覧'  => 'cs_list.php' ,
	//'未提出者'  => 'cs_noentry.php' ,
	//'希望集計'  => 'cs_summary.php' ,
 'コース決定'	=> 'cs_decide.php',
	//'メッセージ' => 'message.php'
	),
	3 => array(  //教員メニュー
	//'希望一覧'  => 'cs_list.php' ,
	//'未提出者'  => 'cs_noentry.php' ,
	//'希望集計'  => 'cs_summary.php' ,
 'コース決定'	=> 'cs_decide.php',
	//'メッセージ' => 'message.php'
	),
	9 => array(  //管理者メニュー
	/*
	 'アカウント登録'  => 'user_add.php' ,
	 'アカウント一覧'  => 'user_list.php' ,
	 'アカウント削除'  => 'user_delete.php' ,
	 'パスワード変更'  => 'user_passwd.php',
	 */
'年度一覧' => 'year.php',
'問合せボックス' => 'goikenbox.php',
'パスワード変更希望ボックス'=>'passwd_box.php'
	)
	);

	$menu4 = array(  //共通メニュー:ログイン中
	'お問合せ' => 'goikenbako.php',
 'ログアウト'  => 'logout.php'
 );

 // ここはセッションがすでに開始したと仮定する。
 if (isset($_SESSION['urole'])){//ログイン中の場合
 	$urole = $_SESSION['urole']; //ユーザ種別を調べる
 	//これから$uroleの値を調べ、値に応じて異なるメニューを出力
 	make_menu($menu[$urole], 'left');
 	make_menu($menu4, 'right');
 }else{//未ログインの場合
 	make_menu($menu0,'right');
 }

 function make_menu($m,$d){
 	echo '<ul class="nav navbar-nav navbar-'.$d.'">';
 	foreach($m as $label=>$url){
 		echo '<li><a href="'.$url.'">'.$label.'</a></li>';
 	}
 	echo '</ul>';
 }
 ?>

</div>
</nav>

<br>
