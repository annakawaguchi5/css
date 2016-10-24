<?php
include('page_header.php');
?>

<h2>パスワード変更フォーム</h2>
<FORM method="POST" action="passwd_info_do.php">
	<p>パスワードを忘れてしまった場合 ここから記入してください。</p>
	<p>すべて必須です</p>

	■権限 <select id="urole" class="form-control">
		<option>学生
		<option>教員(コース決定権なし)
		<option>教員(コース決定権あり)
	</select>
■ユーザID<INPUT type="text" name="gakuseki"> ■名前<INPUT type="text"
				name="name">







<input type="submit" value="　送信　">




		</form>


</Form>






<?php
include('page_footer.php');