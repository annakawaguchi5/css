<?php
include('page_header.php');
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
                        $('button').removeAttr('disabled');
                    };
                });
            };
        });
    });
    $('reset').attr('disabled','disabled')
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


		<tr>
			<th>学籍番号</th>
			<th>$uid</th>
		</tr>
		<tr>
			<th>名前</th>
			<td>$uname</td>
		</tr>
		<tr>
			<th>パスワード</th>
			<td>$upass</td>
		</tr>
		<tr>
			<th>前期修得単位数</th>
			<td>$halfgp</td>
		</tr>
		<tr>
			<th>前期GPA</th>
			<td>$halfgpa</td>
		</tr>
		<tr>
			<th>年間修得単位数</th>
			<td>$allgp</td>
		</tr>
		<tr>
			<th>年間GPA</th>
			<td>$allgpa</td>
		</tr>
	</table>

<button name="reset">リセット</button>


<?php

if (isset($_POST['students'])){
	$id = $_POST['students'];
	echo '<form action="user_change_check.php" method="post">';
	$uid = "";
	foreach($id as $u){
		//学生のデータを表示
		$sql = "SELECT * FROM tb_user NATURAL JOIN tb_gp WHERE uid=".$u;
		$rs = mysql_query($sql, $conn);
		if (!$rs) die ('エラー: ' . mysql_error());
		$row = mysql_fetch_array($rs) ;
		echo '<input type="checkbox" name="change[]" value="'.$u.'" checked="checked">'.$u.'<br>';

		echo '<div class="table-responsive">';
		echo '<table border=0 class="table table-bordered">';

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