<?php
include('page_header.php');
include_once('db_inc.php');
$year=$_GET['year'];
?>
<div class="container" id="import" title="import">
	<?php echo '<form class="form-horizontal" action="importCsv_do.php?year='.$year.'" method="post"
		enctype="multipart/form-data" name="import">'; ?>

		学生アカウント追加<br>※CSVファイルのみ<br>
		<!-- ファイル選択 include -->
		<input type="file" name="csvfile" size="30" />
		<br><input type="submit"
			value="登録" />
	</form>
</div>

<?php
include('page_footer.php');
?>