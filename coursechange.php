<?php
include('page_header.php');

$i=0;

?>

<script>
function add()
{

    var div_element = document.createElement("div");
    div_element.innerHTML = '<FORM method="POST" action="goikenbako_do.php"><TABLE><TR><TD bgcolor="">■コース名<INPUT type="text" size="0" name="name"></TD></TR><TD bgcolor="" height="">■詳細</TD><TR><TD width="1" height="1"><TEXTAREA name="body" cols="60" rows="10"></TEXTAREA></TD></TR><TR><TD bgcolor="" height="">■要件</TD><TR><TD width="1" height="1"><TEXTAREA name="body" cols="60" rows="10"></TEXTAREA></TD></TR><TR><TD colspan="30" align="right" width="30"></form></TD></TR></TABLE></form>';
	var parent_object = document.getElementById("piyo");
    parent_object.appendChild(div_element);
}

$(function () {
	$('#list5').addInputArea({
		  maximum : 2
		});
});


</script>
<script src="//cdn.jsdelivr.net/jquery.add-input-area/4.8.0/jquery.add-input-area.min.js"></script>
<ol id="list5">
  <li class="list5_var">
    <input type="text" size="40" name="list1_0" id="list5_0">
    <button class="list1_del">Delete</button>
  </li>
</ol>
<input type="button" value="Add" class="list5_add">
<h2>コース名変更フォーム</h2>
<p>エラー・バグ報告・感想・要望などがあれば、
ここから記入してください。
要望などは今後の参考にさせていただきます。</p>
<p>送信内容の一部または全部を引用してサイト上に
掲載する可能性があります。
<p>都合が悪ければその旨を記載しておいてください。</p>


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

<?php
include('page_footer.php');