<?php
include('page_header.php');



?>
<style>
.button_wall {
	text-align: center;
}
</style>
<script>



$(function () {
	$('#list6').addInputArea({
		  maximum : 2
		});
});


</script>
<script
	src="//cdn.jsdelivr.net/jquery.add-input-area/4.8.0/jquery.add-input-area.min.js"></script>
<div class="container">
	<h2>コース名入力フォーム</h2>
	<p>コースの作成、変更をする場合 ここから記入してください。</p>
	<FORM method="POST" action="coursechange_do.php">
	<?php
	//new_year.phpからのデータを取得
	$year=$_POST['year'];
	$stime=$_POST['stime'];
	$ltime=$_POST['ltime'];

	echo '<input type="hidden" name="year" value="'.$year.'">';
	echo '<input type="hidden" name="stime" value="'.$stime.'">';
	echo '<input type="hidden" name="ltime" value="'.$ltime.'">';
	?>
		<div id="list6">
			<div class="list6_var">
				<table class="table table-bordered">
					<thead>
						<tr class="success">
							<th>項目</th>
							<th>内容</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>コース名</td>
							<td><input type="text" name="list6_0_0"></td>
						</tr>
						<tr>
							<td>単位数</td>
							<td><input type="text" name="list6_1_0"></td>
						</tr>
						<tr>
							<td>GPA</td>
							<td><input type="text" name="list6_2_0"></td>
						</tr>
						<tr>
							<td>コース説明</td>
							<td><textarea name="list6_3_0" cols="60" rows="10"></textarea></td>
						</tr>
						<tr>
							<td>要件</td>
							<td><input type="radio" name="list6_4_0" value="要件あり">要件あり <input
								type="radio" name="list6_4_0" value="要件なし">要件なし</td>
						</tr>

					</tbody>
				</table>
				<button type="button" class="list6_del"
					style="display: inline-block;">削除</button>
				<input type="button" value="追加" class="list6_add">

			</div>



		</div>

		<br> <br>

		<div class="button_wall">
			<input type="submit" value="内容確認">
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
	include('page_footer.php');