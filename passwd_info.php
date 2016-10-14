<?php
include('page_header.php');
?>

<h2>パスワード変更フォーム</h2>
<FORM method="POST" action="passwd_info_do.php">
<p>パスワードを忘れてしまった場合
ここから記入してください。</p>
<p>学籍番号、名前は必須です</p>

■学籍番号<INPUT type="text" name="gakuseki">
■名前<INPUT type="text" name="name">







<input type="submit"  value="　送信　" >
</form>


</Form>






<?php
include('page_footer.php');