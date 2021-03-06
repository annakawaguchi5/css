<?php
include('page_header.php');
include_once('db_inc.php');
$year=$_GET['year'];
?>
<div class="container"
	id="import" title="import">
	<h1>アカウント 追加・変更</h1>
	<?php if($_SESSION['urole']==9){?>
	<h3>
		<span style="font-weight: bold"><?php echo $year;?> </span>年度のユーザ情報を登録・変更します。
	</h3>

	<!-- CSVインポート 6グリッド割り当て -->
	<div class="col-xs-6 alert alert-info">
	<?php echo '<form class="form-horizontal" action="importCsv_do.php?year='.$year.'" method="post"
		enctype="multipart/form-data" name="import">'; ?>
		<h3>CSVファイル</h3>
		<span style="color: red">※CSVファイルのみ対応</span><br> <br> <label
			class="radio-inline"> <input type="radio" name="data" value="1"
			checked>学生 </label> <label class="radio-inline"> <input type="radio"
			name="data" value="2">教員(権限なし)</label> <label
			class="radio-inline"> <input type="radio" name="data" value="3">教員(権限あり)
			 </label> <input type="file"
			name="csvfile" size="30" /> <br> <input type="submit" value="登録" />
		</form>
	</div>

	<!-- 手入力 6グリッド割り当て -->
	<div class="col-xs-6 alert alert-success">
	<h3>手入力</h3>
	<?php include('user_add.php');?>
	</div>
	<?php }else{
		echo 'あなたの権限ではこの機能を利用することはできません。';
	}?>
</div>

	<?php
	include('page_footer.php');
	?>