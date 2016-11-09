<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

if(!isset($_SESSION['urole']) || $_SESSION['urole']!=3){
	echo '閲覧できません。';
}else{
?>

<!-- 新規登録画面 -->
<h3 style="color:red;">すべての項目を埋め、「登録」ボタンを押してください。</h3>
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



				echo '<td><input type="text" id="year" name="year" value="'.$row['year'].'" size="20"
				maxlength="20">年度</t>';
				?>
			</tr>
			<tr>
				<th class="header info">調査開始時刻</th>
				<td>
					<div class='input-group date' id='stime'>
						<span class="input-group-addon"><span
							class="glyphicon glyphicon-calendar"></span> </span> <input
							type='text' class="form-control" name="stime" value="<?php echo $row['stime']?>"/>

					</div>
				</td>
			</tr>
			<tr>
				<th class="header info">調査終了時刻</th>
				<td>
					<div class='input-group date' id='ltime'>
						<span class="input-group-addon"> <span
							class="glyphicon glyphicon-calendar"></span> </span> <input
							type='text' class="form-control" name="ltime" value="<?php echo $row['ltime']?>"/>
					</div>
				</td>
			</tr>
			<tr>
				<th class="header info">コース</th>
				<td><?php include('coursechange.php');?></td>
			</tr>
		</table>
		<input type="hidden" name="act" value="insert">
		<button type="submit" class="center-block btn btn-primary btn-lg" style="width:300px; ">登録</button>
	</form>
</div>

				<?php
}
				include('page_footer.php');
				?>