<?php echo '<form action="user_add_do.php?year='.$year.'" class="form-horizontal" method="post">';?>
	<div class="form-group">
		<label for="uid" class="control-label col-sm-3">ユーザID:</label>
		<div class="col-sm-9">
			<input type="text" name="uid" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="uname" class="control-label col-sm-3">ユーザ名:</label>
		<div class="col-sm-9">
			<input type="text" name="uname" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="upass" class="control-label col-sm-3">パスワード:</label>
		<div class="col-sm-9">
			<input type="password" name="upass" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="urole" class="control-label col-sm-3">ユーザ種別:</label>
		<div class="col-sm-9">
			<select name="urole" class="form-control">
				<option value="1">学生

				<option value="2">教員(権限なし)

				<option value="3">教員(権限あり)

				<option value="9">管理者

			</select>
		</div>
	</div>
<!--
	<div class="form-group">
		<label for="halfgp" class="control-label col-sm-3">前期修得単位数:</label>
		<div class="col-sm-9">
			<input type="halfgp" name="halfgp" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="halfgpa" class="control-label col-sm-3">前期GPA:</label>
		<div class="col-sm-9">
			<input type="halfgpa" name="halfgpa" class="form-control">
		</div>
	</div>
		<div class="form-group">
		<label for="allgp" class="control-label col-sm-3">年間修得単位数:</label>
		<div class="col-sm-9">
			<input type="allgp" name="allgp" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="allgpa" class="control-label col-sm-3">年間GPA:</label>
		<div class="col-sm-9">
			<input type="allgpa" name="allgpa" class="form-control">
		</div>
	</div>
-->
	<button class="col-xs-offset-2 btn-lg" type="submit">登録</button>

</form>

