<?php include('page_header.php');



if(isset($_POST['list6_0_0'])){
	$course=$_POST['list6_0_0'];
	$gp=$_POST['list6_1_0'];
	$gpa=$_POST['list6_2_0'];
	$detail=$_POST['list6_3_0'];
	$youken=$_POST['list6_4_0'];
}else{
	echo "記入されていません";
}
if(isset($_POST['list6_0_1'])){
	$course1=$_POST['list6_0_1'];
	$gp1=$_POST['list6_1_1'];
	$gpa1=$_POST['list6_2_1'];
	$detail1=$_POST['list6_3_1'];
	$youken1=$_POST['list6_4_1'];
}
?>

<style>
.button_wall { text-align : center ; }
</style>

<h3>内容確認</h3>
<FORM method="POST" action="coursechange_decide.php">
<?php if(isset($_POST['list6_0_0'])){ ?>
<table class="table table-bordered" width="100%">
<thead>
              	<tr>
              	<tr class="active">
              	<th width="30%">項目</th>
              	<th width="70%">内容</th>
              	</tr>
</thead>
 <tbody>
<tr><td>コース名 </td><td><?php echo $course; ?></td></tr>
<input type="hidden" name="コース名" value="<?php echo $course; ?>">

<tr><td>単位数</td><td><?php echo $gp; ?></td></tr>
<input type="hidden" name="単位数" value="<?php echo $gp; ?>">

<tr><td>GPA</td><td><?php echo $gpa; ?></td></tr>
<input type="hidden" name="GPA" value="<?php echo $gpa; ?>">

<tr><td>コース説明</td><td><?php echo $detail; ?></td></tr>
<input type="hidden" name="コース説明" value="<?php echo $detail; ?>">

<tr><td>要件</td><td><?php echo $youken ;?></td></tr>
<input type="hidden" name="要件" value="<?php echo $youken; ?>">

</tbody>
</table>
<table>
</table>
<?php }?>
<?php if(isset($_POST['list6_0_1'])){?>
<table class="table table-bordered" width="100%">
<thead>
              	<tr>
              	<tr class="active">
              	<th width="30%">項目</th>
              	<th width="70%">内容</th>
              	</tr>
</thead>
 <tbody>
<tr><td>コース名 </td><td><?php echo $course1; ?></td></tr>
<input type="hidden" name="コース名1" value="<?php echo $course1; ?>">

<tr><td>単位数</td><td><?php echo $gp1; ?></td></tr>
<input type="hidden" name="単位数1" value="<?php echo $gp1; ?>">

<tr><td>GPA</td><td><?php echo $gpa1; ?></td></tr>
<input type="hidden" name="GPA1" value="<?php echo $gpa1; ?>">

<tr><td>コース説明</td><td><?php echo $detail1; ?></td></tr>
<input type="hidden" name="コース説明1" value="<?php echo $detail1; ?>">

<tr><td>要件</td><td><?php echo $youken1; ?></td></tr>
<input type="hidden" name="要件1" value="<?php echo $youken1; ?>">

</tbody>
</table>
<table>
</table>
<?php }?>
<p>
以上が記入された内容となります。</p>
<p>全て記入されており、正しければ決定を押してください。</p>
<div class="button_wall">
<input type="submit"  value="決定する" >
</div>
</FORM>


<?php include('page_footer.php');?>


