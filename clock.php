<style type="text/css">
#clock {
	position: relative;
	width: 200px;
	height: 200px;
	background-image: url(http://winofsql.jp/image/clockface.jpg);
	background-size:contain;
	list-style: none;
	background-repeat:no-repeat;
	display:none;
}

#sec, #min, #hour {
	position: absolute;
	width: 10px;
	height: 200px;
	top: 0px;
	left: 95px;
	background-size:contain;
}

#sec {
	background-image: url(http://winofsql.jp/image/sechand.png);
	z-index: 3;
}

#min {
	background-image: url(http://winofsql.jp/image/minhand.png);
	z-index: 2;
}

#hour {
	background-image: url(http://winofsql.jp/image/hourhand.png);
	z-index: 1;
}

</style>

<script type="text/javascript">
function set_time() {
	var hours = new Date().getHours();
	var mins = new Date().getMinutes();
	var seconds = new Date().getSeconds();

	var hdegree = hours * 30 + (mins / 2);
	var hrotate = "rotate(" + hdegree + "deg)";
	$("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate, "transform" : hrotate});

	var mdegree = mins * 6;
	var mrotate = "rotate(" + mdegree + "deg)";
	$("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate, "transform" : mrotate});

	var sdegree = seconds * 6;
	var srotate = "rotate(" + sdegree + "deg)";
	$("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate, "transform" : srotate});

}

$(function() {
	set_time();
	$("#clock").show();
	setInterval( function() {set_time();}, 1000 );
});

</script>

<ul id="clock">
	<li id="hour"></li>
	<li id="min"></li>
	<li id="sec"></li>
</ul>

