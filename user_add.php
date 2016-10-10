<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
echo "<h2>ユーザ登録画面</h2>";
?>
<div class="container-fluid bg-info">
	<form action="user_add_do.php" class="form-horizontal" method="post">
		<div class="form-group">
			<label for="uid" class="control-label col-sm-2">ユーザID:</label>
			<div class="col-sm-8">
				<input type="text" name="uid" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="uname" class="control-label col-sm-2">ユーザ名:</label>
			<div class="col-sm-8">
				<input type="text" name="uname" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-sm-2">パスワード:</label>
			<div class="col-sm-8">
				<input type="password" name="pass" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="urole" class="control-label col-sm-2">ユーザ種別:</label>
			<div class="col-sm-8">
				<select name="urole" class="form-control">
					<option value="1">学生
					<option value="2">教員
					<option value="9">管理者
				</select>
			</div>
		</div>
		<button class="col-xs-offset-2 btn-lg" type="submit">登録</button>

	</form>
</div>

<?php
include('page_footer.php');
?>
