<?php
include('page_header.php');
include_once('db_inc.php');
$year=$_GET['year'];
?>
<div class="container"
	id="import" title="import">
	<h1>成績追加・変更</h1>
	<?php if($_SESSION['urole']==9){?>
	<h3>
		<span style="font-weight: bold"><?php echo $year;?> </span>年度の成績情報を登録・変更します。
	</h3>

	<!-- CSVインポート 6グリッド割り当て -->
	<div class="alert alert-info">
	<?php echo '<form class="form-horizontal" action="importCsv_do.php?year='.$year.'" method="post"
		enctype="multipart/form-data" name="import">'; ?>
		<h3>CSVファイル</h3>
		<span style="color: red">※CSVファイルのみ対応</span><br> <br> <label
			class="radio-inline"> <input type="radio" name="data" value="0"
			checked>前期 </label> <label class="radio-inline"> <input type="radio"
			name="data" value="1">年間 </label> <input type="file"
			name="csvfile" size="30" /> <br> <input type="submit" value="登録" />
		</form>
	</div>


	<?php }else{
		echo 'あなたの権限ではこの機能を利用することはできません。';
	}?>
</div>

	<?php
	include('page_footer.php');
	?>