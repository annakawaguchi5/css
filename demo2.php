<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>
<!-- Bootstrap stylesheet -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<!-- ClockPicker Stylesheet -->
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">

<!-- Input group, just add class 'clockpicker', and optional data-*
<div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
    <input type="text" class="form-control" value="13:14">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>-->

<!-- Or just a input -->
<input id="demo-input" />

<!-- jQuery and Bootstrap scripts -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<!-- ClockPicker script -->
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>

<script type="text/javascript">
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		// TODO: time changed
		console.log(this.value);
	});
$('#demo-input').clockpicker({
	autoclose: true
});

if (something) {
	// Manual operations (after clockpicker is initialized).
	$('#demo-input').clockpicker('show') // Or hide, remove ...
			.clockpicker('toggleView', 'minutes');
}
</script>




<?php
include('page_footer.php');
?>