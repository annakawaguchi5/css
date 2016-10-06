<?php
include('page_header.php');
include_once('db_inc.php');
?>

<script type="text/javascript">
jQuery(function($){
    $('td').each(function(){
        var backup = $(this).text();
        $(this).data('backup',backup)
            .click(function(){
            if(!$(this).hasClass('on')){
                $(this).addClass('on');
                var txt = $(this).text();
                $(this).html('<input type="text" value="'+txt+'" />');
                $('td > input').focus().blur(function(){
                    var inputVal = $(this).val();
                    var backup = $(this).parent().data('backup');
                    if(inputVal===''){
                        inputVal = this.defaultValue;
                    };
                    $(this).parent().removeClass('on').text(inputVal);
                    if(backup !== inputVal){
                        $('#reset').removeAttr('disabled');
                    };
                $(this).each(function(){
                    var newdata = $(this).text();
                }
                });
            };
        });
    });
    $('#reset').attr('disabled','disabled')
        .click(function(){;
        $('td').each(function(){
            var backup = $(this).data('backup');
            $(this).text(backup);
        });
        $(this).attr('disabled','disabled');
    });
});
</script>

<div class="container">
<?php
if (isset($_POST['students'])){
	$id = $_POST['students'];
	echo '<button id="reset" class="btn btn-danger btn-lg">リセット</button><br>';
	echo '<form action="user_change_do.php" method="post">';
	$uid = "";
	foreach($id as $u){
		//学生のデータを表示
		$sql = "SELECT * FROM tb_user NATURAL JOIN tb_gp WHERE uid='$u'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;

		echo '<table class="table table-bordered">';
		echo '<input type="checkbox" name="change[][]" value="'.$u.'" checked="checked">'.$u;

		echo '<tr ><th class="col-xs-4 info">学籍番号</th><th>'.$row['uid'].'</th></tr>';
		echo '<tr><th class="info">名前</th><td>'.$row['uname'].'</td></tr>';
		echo '<tr><th class="info">パスワード</th><td>'.$row['upass'].'</td></tr>';
		echo '<tr><th class="info">前期修得単位数</th><td>'.$row['halfgp'].'</td></tr>';
		echo '<tr><th class="info">前期GPA</th><td>'.$row['halfgpa'].'</td></tr>';
		echo '<tr><th class="info">年間修得単位数</th><td>'.$row['allgp'].'</td></tr>';
		echo '<tr><th class="info">年間GPA</th><td>'.$row['allgpa'].'</td></tr>';

		echo '<input type="hidden" name="change[][]" value="'.$act.'">';
		echo '<input type="hidden" name="change[][]" value="'.$act.'">';
		echo '<input type="hidden" name="change[][]" value="'.$act.'">';
		echo '<input type="hidden" name="change[][]" value="'.$act.'">';
		echo '<input type="hidden" name="change[][]" value="'.$act.'">';
		echo '<input type="hidden" name="change[][]" value="'.$act.'">';
		echo '</table>';
	}

	echo '上記のデータに変更しますか?</p>';
	echo '<button type="submit" class="btn btn-danger">変更</button>';
	echo '<a href="year.php"><button class="btn btn-default">戻る</button></a>';
}else{
	echo '<h2>削除するユーザIDが与えられていません</h2>';
	echo '<a href="year.php">戻る</a>';
}
?>
</div>
<?php
include('page_footer.php');
?>