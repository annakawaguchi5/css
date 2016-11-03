</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="js/smoke.min.js"></script> <script src="js/es.min.js"></script>

<script
	type="text/javascript"
	src="./jquery-yycountdown-master/js/jquery-1.10.2.min.js"></script>
<script
	type="text/javascript"
	src="./jquery-yycountdown-master/js/jquery.yycountdown.min.js"></script>
<script type="text/javascript">
	$("#timer").yycountdown({
		endDateTime   : '<?php echo $ltime;?>',
			unit          : {d: '日', h: '時間', m: '分', s: '秒'},
			complete : function(_this){
	            _this.find('.yycountdown-box').text('調査期間外です');
	        }
	});

</script>
</html>
