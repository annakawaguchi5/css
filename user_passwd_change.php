<?php
include('page_header.php');
include ('db_inc.php');
require_once ('db_inc.php');  // データベース接続
if (isset($_SESSION['uid'])){
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM tb_user WHERE uid='{$uid}'";
	$rs = mysql_query($sql, $conn);
	$row = mysql_fetch_array($rs) ;
	echo '<h2>'.$row['uname'].'さんのパスワードを変更します。</h2>';
}

echo
'<br>
<div class="container bg-info">
	<form class="form-horizontal" id="formEqualPass" data-smk-icon="glyphicon-remove-sign" method="post" action="user_passwd_change_do.php?uid='.$uid.'"'.'>
			<div class="form-group">
			<label for="nowpw" class="control-label col-sm-3" value="nowpw">現在のパスワード:   </label>
			<div class="col-sm-9">
				<label for="nowpw" class="control-label" value="nowpw">'.$row['upass'].'</label>

			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-sm-3" value="pass">新しいパスワード: </label>
			<div class="col-sm-9">
				<input type="password" name="pass1" class="form-control" id="pass1" required>
			</div>
		</div>
		<div class="form-group">
			<label for="pass2" class="control-label col-sm-3 has-error" value="pass2">新しいパスワード(確認)： </label>
			<div class="col-sm-9">
				<input type="password" name="pass2" class="form-control" id="pass2" required>
			</div>
		</div>


		<button type="submit" id="btn-validate" class="btn btn-default">
		作成
		</button>
	</form>
</div>';

echo '<script src="js/smoke.min.js"></script> <script src="js/es.min.js"></script>';

echo "<script>
$(document).ready(function() {
    /**
     * バリデーションボタン押下時処理
     * バリデーションを行う
     */
    $('#btn-validate').click(function() {


        } else {
            // バリデーションNGの処理
        }
    })
});
</script>";

echo '<a href="user_passwd_change.php"><button class="btn btn-primary">戻る</button></a>';
include('page_footer.php');
?>