<?php
include('page_header.php');

?>
<h2>お問い合せフォーム</h2>
<FORM method="POST" action="goikenbako_do.php">
<p>エラー・バグ報告・感想・要望等あれば、
ここから記入してください。</p>
<p>要望などは今後の参考にさせていただきます。</p>


<TABLE>
   <TD bgcolor="" height="">■メッセージ</TD>
   <TR>

      <TD width="1" height="1">
      <?php
      if(isset($_SESSION['urole'])){
      	$year=$_SESSION['year'];
      	$urole=$_SESSION['urole'];
      	echo '<input type="hidden" name="urole" value="'.$urole.'">';
      	echo '<input type="hidden" name="year" value="'.$year.'">';
      }else {


      }
      ?>
         <TEXTAREA name="body" cols="60" rows="10"></TEXTAREA>
      </TD>
  </TR>
  <TR>
<TD colspan="30" align="right" width="30">


<input type="submit">
</form>

</TD>
          </TR>

</TABLE>
</Form>
<?php
include('page_footer.php');