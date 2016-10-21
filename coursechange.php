<?php
//include('page_header.php');
?>

<script>
$(function () {
	$('#list6').addInputArea({
		  maximum : 2
		});
});
</script>
<script
	src="//cdn.jsdelivr.net/jquery.add-input-area/4.8.0/jquery.add-input-area.min.js"></script>

<div id="list6">
	<div class="list6_var">
		コース名<input type="text" name="list6_0_0">単位数<input type="text"
			name="list6_1_0"> GPA<input type="text" name="list6_2_0"><br>
		コース説明<br><textarea name="list6_3_0" cols="100" rows="2"></textarea>
		<button type="button" class="list6_del" style="display: inline-block;">削除</button>
		<input type="button" value="追加" class="list6_add">

	</div>
</div>



<!-- </FORM>-->











<!--
<div>
<button onclick="add();">入力フォームを追加する</button>

</div>
<FORM method="POST" action="coursechange_do.php">
<div id="piyo">
</div>
<TABLE>
	<TR>
		<TD bgcolor="">■コース名
		<INPUT type="text" size="0" name="course"></TD>
	</TR>
	 <TD bgcolor="" height="">■詳細</TD>
   <TR>

      <TD width="1" height="1">
         <TEXTAREA name="detail" cols="60" rows="10"></TEXTAREA>
      </TD>
  </TR>
  <TR>

   <TD bgcolor="" height="">■要件</TD>
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
-->
<?php
//include('page_footer.php');