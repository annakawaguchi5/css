<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<!-- 新規登録画面 -->
<!-- コース名、要件 -->

<div class="container" id="newyear" title="新規作成">
	<form class="form-horizontal" action="coursechange_do.php"
		method="post" onSubmit="return check(this)"
		enctype="multipart/form-data" name="newyear">
		<table id="form1" class="table table-bordered">
			<tr>
				<td class="header info">年度</td>

				<?php
				// 今日の日付を取得
				$now = new DateTime();
				$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
				$now = $now->format('Y/m/d H時i分s秒');
				$y = date('Y');

				echo '<td><input type="text" id="year" name="year" value="'.$y.'" size="20"
				maxlength="20">年度</td>';
				?>
			</tr>
			<tr>
				<td class="header info">調査開始時刻</td>
				<td>
					<div class='input-group date' id='stime'>
						<span class="input-group-addon"> <span
							class="glyphicon glyphicon-calendar"></span> </span> <input
							type='text' class="form-control" name="stime" />

					</div>
				</td>
			</tr>
			<tr>
				<td class="header info">調査終了時刻</td>
				<td>
					<div class='input-group date' id='ltime'>
						<span class="input-group-addon"> <span
							class="glyphicon glyphicon-calendar"></span> </span> <input
							type='text' class="form-control" name="ltime" />
					</div>
				</td>
			</tr>
			<tr>
				<td class="header info">コース</td>
				<td><?php include('coursechange.php');?></td>
			</tr>
		</table>
		<input type="hidden" name="act" value="insert">
		<input type="submit" value="登録" />
	</form>
</div>

				<?php
				include('page_footer.php');
				?>