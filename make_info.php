<?php
/*
require_once('db_inc.php');  //データベース接続
include 'page_header.php';
*/
?>

<form class="form-horizontal" action="send_info.php" method="POST">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h5 class="panel-title">通知作成</h5>
		</div>
		<div class="panel-body">
			<label>項目を埋め、「送信」ボタンを押してください。<br> </label>
			<div class="form-group">
				<label for="title" class="control-label col-xs-2">タイトル:</label>
				<div class="col-xs-10">
					<input type="text" name="title" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="message" class="control-label col-xs-2">メッセージ:</label>
				<div class="col-xs-10">
					<textarea name="message" class="form-control" row="4" cols="30"></textarea>
				</div>
			</div>
			<div class="col-sm-offset-1">
				<div class="form-group">
				<?php
					$roles = array(
				"1" => "学生",
				"2" => "教員(権限なし)",
				"3" => "教員(権限あり)",
				"9" => "管理者");

					foreach($roles as $urole => $rolename){
						if($urole==9){
							echo '<label class="checkbox-inline">
							<input type="hidden" name="urole[]" value="'.$urole.'">
							<input type="checkbox" disabled checked>'.$rolename.'</label>';
						}else{
					echo '<label class="checkbox-inline"><input type="checkbox" name="urole[]" value="'.$urole.'">'.$rolename.'</label>';
					}
					}
					//iyearは後に指定
					echo '<INPUT type="hidden" name="year" value="'.$_SESSION['year'].'">';

				 ?>
				</div>

				<input type="submit" value="送信"><input type="reset" value="リセット">
			</div>
		</div>
	</div>
</form>


				 <?php
				 include('page_footer.php');
				 ?>