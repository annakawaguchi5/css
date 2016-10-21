<?php
include('page_header.php');
include_once('db_inc.php');
?>
<!--
<script type="text/javascript">
jQuery(function($){
    $('td').each(function(){
        var backup = $(this).text();
        $(this).data('backup',backup)
            .click(function(){
            if(!$(this).hasClass('on')){
                $(this).addClass('on');
                var txt = $(this).text();

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
-->
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
		echo '<input type="hidden" name="uid[]" value="'.$u.'" checked="checked">';
		echo '<tr ><th class="col-xs-4 info">学籍番号</th><th>'.$u.'</th></tr>';
		echo '<tr><th class="info">名前</th><td><input type="text" name="uname[]" value="'.$row['uname'].'"></td></tr>';
		echo '<tr><th class="info">パスワード</th><td><input type="text" name="upass[]" value="'.$row['upass'].'"></td></tr>';
		echo '<tr><th class="info">前期修得単位数</th><td><input type="text" name="halfgp[]" value="'.$row['halfgp'].'"></td></tr>';
		echo '<tr><th class="info">前期GPA</th><td><input type="text" name="halfgpa[]" value="'.$row['halfgpa'].'"></td></tr>';
		echo '<tr><th class="info">年間修得単位数</th><td><input type="text" name="allgp[]" value="'.$row['allgp'].'"></td></tr>';
		echo '<tr><th class="info">年間GPA</th><td><input type="text" name="allgpa[]" value="'.$row['allgpa'].'"></td></tr>';
		echo '</table>';


	}

	echo '上記のデータに変更しますか?</p>';
	echo '<button type="submit" class="btn btn-danger">変更</button>';
	echo '<a href="year.php"><button class="btn btn-default">戻る</button></a></form>';
}else{
	echo '<h2>変更するユーザIDが与えられていません</h2>';
	echo '<a href="year.php">戻る</a>';
}
?>
</div>
<?php
include('page_footer.php');
?>