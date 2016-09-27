<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<!-- 新規登録画面 -->
<!-- コース名、要件 -->


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
				<td><?php include('importCsv_do.php');?> <br> <input type="checkbox"
					id="noupload" name="noupload" value="reset">今回は追加しない。</td>
			</tr>

		</table>
	</form>
</div>

<!-- #dialog-form-check  -->
<div id="dialog-form-check" title="フォーム確認" style="display: none;">
	<p>
		<b>Results:</b> <span id="results"></span>
	</p>
	<form>
		<table id="form2" class="sample">
			<tr>
				<!-- <td>年度</td>
				<td class="year"></td> -->
				<td class="header year">年度</td>
			</tr>
			<tr>
				<!-- <td>調査開始時刻</td>
				<td class="stime"></td> -->
				<td class="header stime">調査開始時刻</td>
			</tr>
			<tr>
				<!--  <td>調査終了時刻</td>
				<td class="ltime"></td> -->
				<td class="header ltime">調査終了時刻</td>
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

<?php
include('page_footer.php');
?>