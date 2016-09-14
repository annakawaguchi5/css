<h1 id="siteTitle" align="left">
	<a href="index.php">コース分け希望調査システム</a>
</h1>

<!-- 現在時刻 -->
<div align="right" width="50%" height="50%">
<?php include('clock.php');?>
</div>

<!-- カウントダウン -->


<!-- ナビバー -->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
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
 'ログイン'  => 'login.php',
	);
	$menu = array(
	1 => array(  //学生メニュー
 '希望提出'  => 'cs_wish.php' ,
 '結果確認'  => 'cs_result.php' ,
 'コース説明'  => 'cs_explain.php',
 'メッセージ' => 'message.php'
 ),
 2 => array(  //教員メニュー
 //'希望一覧'  => 'cs_list.php' ,
 '未提出者'  => 'cs_noentry.php' ,
 '希望集計'  => 'cs_summary.php' ,
 'コース決定'	=> 'cs_decide.php',
 'メッセージ' => 'message.php'
 ),
 9 => array(  //管理者メニュー
 /*
  'アカウント登録'  => 'user_add.php' ,
  'アカウント一覧'  => 'user_list.php' ,
  'アカウント削除'  => 'user_delete.php' ,
  'パスワード変更'  => 'user_passwd.php',
  */
 //アカウント操作は一覧から
'メッセージ' => 'message.php'
 )
 );

 $menu4 = array(  //共通メニュー:ログイン中
 'ホーム'  => 'index.php',
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
</div>
</nav>
<br>
