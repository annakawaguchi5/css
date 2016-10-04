<?php
include('page_header.php');
include_once('db_inc.php');
$year=$_GET['year'];
?>
<div class="container" id="import" title="import">
<?php echo '<form class="form-horizontal" action="importCsv_do.php?year='.$year.'" method="post"
		enctype="multipart/form-data" name="import">'; ?>

	<h1>学生アカウント 追加・変更</h1>
	<h3>
		<span style="font-weight: bold"><?php echo $year;?> </span>年度のユーザ情報を登録・更新します。
	</h3>
	<span style="color: red">※CSVファイルのみ対応</span><br> <br>
	<label class="radio-inline"> <input type="radio" name="data" value="0" checked>前期
	</label> <label class="radio-inline"> <input type="radio" name="data" half="1">年間(前期＋後期)
	</label> <input type="file" name="csvfile" size="30" /> <br> <input
		type="submit" value="登録" />
	</form>
</div>

<?php
include('page_footer.php');
?>