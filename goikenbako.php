<?php
include('page_header.php');

?>
<h2>ご意見箱</h2>
<FORM method="POST" action="goikenbako_do.php">
<p>エラー・バグ報告・感想・要望などがあれば、
ここから記入してください。
要望などは今後の参考にさせていただきます。</p>
<p>送信内容の一部または全部を引用してサイト上に
掲載する可能性があります。
<p>都合が悪ければその旨を記載しておいてください。</p>

<TABLE>
   <TD bgcolor="" height="">■メッセージ</TD>
   <TR>

      <TD width="1 height="1">
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