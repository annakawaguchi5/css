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
<TABLE>


   <TD bgcolor="" height="">■メッセージ</TD>
   <TR>
      <TD width="1" height="1">
         <TEXTAREA name="body" cols="60" rows="10"></TEXTAREA>
      </TD>
  </TR>
  <TR>
<TD colspan="30" align="right" width="30">


<input type="submit"  value="　メール送信　">
</form>

</TD>
          </TR>

</TABLE>
</Form>






<?php
include('page_footer.php');