<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<!-- 新規登録画面 -->
<!-- コース名、要件 -->

<div class="container" id="newyear" title="新規作成">
	<form class="form-horizontal" action="upload.php" method="post"
		enctype="multipart/form-data">
		<table id="form1" class="table table-hover">
			<tr>
				<td class="header info">年度</td>

				<?php
				// 今日の日付を取得
				$now = new DateTime();
				$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
				$now = $now->format('Y/m/d H時i分s秒');
				$year = date('Y');

				echo '<td><input type="text" id="year" name="year" value="'.$year.'" size="20"
				maxlength="20">年度</td>';
				?>
			</tr>
			<tr>
				<td class="header info">調査開始時刻</td>
				<td>
					<div class="input-group" id="stime">
						<input type="text" class="form-control date" id="stime"
							name="stime" /> <span class="input-group-addon"><span
							class="glyphicon glyphicon-calendar"></span> </span>
					</div>
				</td>
			</tr>
			<tr>
				<td class="header info">調査終了時刻</td>
				<td>
					<div class="input-group" id="ltime">
						<input type="text" class="form-control date" id="ltime"
							name="ltime" /> <span class="input-group-addon"><span
							class="glyphicon glyphicon-calendar"></span> </span>
					</div>
				</td>
			</tr>
			<!--
			<tr>
				<td class="header info">調査開始時刻</td>
				<td><input type="text" class="hoge" id="stime" name="stime" value=""
					size="20" maxlength="50" /></td>
			</tr>
			<tr>
				<td class="header info">調査終了時刻</td>
				<td><input type="text" class="hoge" id="ltime" name="ltime" value=""
					size="20" maxlength="50"></td>
			</tr>-->
			<tr>
<<<<<<< HEAD
			<!-- 欄の増設可に -->
<!--
=======
				<!-- 欄の増設可に -->

>>>>>>> 3eff64da258a6b60e25bc158f2d0025eb40f85ae
				<td class="header info">コース名・登録要件</td>

				<td></td>
			</tr>
			-->
			<tr>
				<td class="header info">学生アカウント追加<br>※CSVファイルのみ</td>
				<!-- ファイル選択 include -->
				<td><input type="file" name="csvfile" size="30" /></td>
			</tr>
		</table>
		<input type="submit" value="次へ進む" />
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