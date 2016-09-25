<?php
/*
require_once('db_inc.php');  //データベース接続
include 'page_header.php';
*/
?>
<!-- 無遷移送信がまだ -->
<form class="form-horizontal" id="info" action="info.php" method="post"
	onsubmit="doSomething();return false;">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h5 class="panel-title">通知作成</h5>
		</div>
		<div class="panel-body">
			<label>項目を埋め、「送信」ボタンを押してください。<br> </label>
			<div class="form-group">
				<label for="title" class="control-label ">タイトル:</label>
				<div class="">
					<input type="text" id="title" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="message" class="control-label">詳細:</label>
				<div class="">
					<textarea id="detail" class="form-control" row="4" cols="30"></textarea>
				</div>
			</div>
			<div class="col-sm-offset-1">
				<div class="form-group">
				<?php
				/*
				$sql="SELECT * FROM tb_user GROUP BY urole";
				$rs = mysql_query($sql, $conn);
				if (!$rs) die ('エラー: ' . mysql_error());
				$row = mysql_fetch_array($rs);
*/
					$roles = array(
				"1" => "学生",
				"2" => "教員(権限なし)",
				"3" => "教員(権限あり)",
				"9" => "管理者");

					foreach($roles as $urole => $rolename){
						if($urole==9){
							echo '<label class="checkbox"><input type="checkbox" disabled="disabled" checked="checked" name="'.$urole.'">'.$rolename.'</label>';
						}else{
					echo '<label class="checkbox"><input type="checkbox" name="'.$urole.'">'.$rolename.'</label>';
					}
					}

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