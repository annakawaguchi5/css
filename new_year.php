<button class="btn btn-danger btn-lg" id="new">新規作成</button>

<!-- #dialog-form  -->
<div id="dialog-form" title="新規作成">
	<form>
		<table id="form1" class="sample">
			<tr>
				<td class="header">年度</td>
				<td><input type="text" id="year" name="year" value="" size="2"
					maxlength="2">年</td>
			</tr>
			<tr>
				<td class="header">調査開始時刻</td>
				<td><input type="text" class="hoge" id="stime" name="stime" value=""
					size="20" maxlength="50" /></td>
			</tr>
			<tr>
				<td class="header">調査終了時刻</td>
				<td><input type="text" class="hoge" id="ltime" name="ltime" value=""
					size="20" maxlength="50"></td>
			</tr>
			<tr>
				<td class="header">学生アカウント追加<br>※CSVファイルのみ</td>
				<!-- ファイル選択 include -->
				<td>C:abc.csv<br> <input type="checkbox" id="noupload"
					name="noupload" value="reset">今回は追加しない。</td>
			</tr>
		</table>
	</form>
</div>
<!-- end of #dialog-form -->

<!-- #dialog-form-check  -->
<div id="dialog-form-check" title="フォーム確認">
	<form>
		<table id="form-check" class="sample">
			<tr>
				<td class="header">年度</td>
				<td>year+年</td>
			</tr>
			<tr>
				<td class="header">調査開始時刻</td>
				<td>stime</td>
			</tr>
			<tr>
				<td class="header">調査終了時刻</td>
				<td>ltime</td>
			</tr>
			<tr>
				<td class="header">学生アカウント追加<br>※CSVファイルのみ</td>
				<!-- ファイル選択 include -->
				<td>upload file name.csv<br> <input type="checkbox" id="noupload"
					name="noupload" value="reset">今回は追加しない。</td>
			</tr>
		</table>
	</form>
</div>
<!-- end of #dialog-form-check -->
