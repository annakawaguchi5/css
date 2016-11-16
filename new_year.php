<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続


?>

<!-- 新規登録画面 -->
<h3 style="color: red;">すべての項目を埋め、「登録」ボタンを押してください。</h3>
<div id="newyear" title="新規作成">
	<form class="form-horizontal" action="coursechange_do.php"
		method="post" onSubmit="return check(this)"
		enctype="multipart/form-data" name="newyear">
		<table id="form1" class="table table-bordered">
			<tr>
				<th class="header info">年度(西暦)</th>

				<?php
				// 今日の日付を取得
				$now = new DateTime();
				$now->setTimeZone(new DateTimeZone('Asia/Tokyo'));
				$now = $now->format('Y/m/d H時i分s秒');
				$y = date('Y');
				$year=$y-1;

				$sql = "SELECT year,stime,ltime,cname,detail,gp,gpa
				FROM tb_limit NATURAL JOIN tb_course WHERE year='$year'AND cid=2";
				$rs = mysql_query($sql, $conn);
				if (!$rs) die ('エラー: ' . mysql_error());
				$row = mysql_fetch_array($rs);



				echo '<td><div class="col-xs-10"><input type="text" class="form-control" id="year" name="year" value="'.$row['year'].'" size="20"
				maxlength="20"></div>
				<div class="col-xs-2"><label>年度</label></div></td>';
				?>
			</tr>
			<tr>
				<th class="header info">調査開始時刻</th>
				<td>
					<div class='input-group date' id='stime'>
						<span class="input-group-addon"><span
							class="glyphicon glyphicon-calendar"></span> </span> <input
							type='text' class="form-control" name="stime"
							value="<?php echo $row['stime']?>" />

					</div>
				</td>
			</tr>
			<tr>
				<th class="header info">調査終了時刻</th>
				<td>
					<div class='input-group date' id='ltime'>
						<span class="input-group-addon"> <span
							class="glyphicon glyphicon-calendar"></span> </span> <input
							type='text' class="form-control" name="ltime"
							value="<?php echo $row['ltime']?>" />
					</div>
				</td>
			</tr>
			<tr>
				<th class="header info">コース</th>
				<td><?php //include('coursechange.php');//コース数変更?>
					<div class="course1">
						<div>
							<div class="col-xs-1">
								<label>コース名</label>
							</div>
							<div class="col-xs-11">
							<input type="text" class="form-control" name="cname1">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="col-xs-2">
								<label>単位数</label>
							</div>
							<div class="col-xs-8">
								<input type="text" class="form-control" name="gp1">
							</div>
							<div class="col-xs-2">以上</div>
						</div>
						<div class="col-sm-6">
							<div class="col-xs-2">
								<label>GPA</label>
							</div>
							<div class="col-xs-8">
								<input type="text" class="form-control" name="gpa1">
							</div>
							<div class="col-xs-2">以上</div>
						</div>
						<label>コース説明</label>
						<textarea rows="2" class="form-control" name="detail1"></textarea>
					</div>
					<br>

					<div class="course2">
						<div class="col-xs-2">
							<label>コース名</label>
						</div>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="cname2">
						</div>
						<br> 単位数<input type="text" class="form-control" name="gp2">以上 GPA<input
							type="text" class="form-control" name="gpa2">以上<br> コース説明<br>
						<textarea class="form-control" rows="2" name="detail2"></textarea>
					</div>
				</td>
			</tr>
		</table>
		<input type="hidden" name="act" value="insert">
		<button type="submit" class="center-block btn btn-primary btn-lg"
			style="width: 300px;">登録</button>
	</form>
</div>

				<?php
				include('page_footer.php');
				?>