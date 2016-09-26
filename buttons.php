<?php
include('page_header.php');
?>

<style>
.page-back {
	position: fixed;
	bottom: 10px;
	right: 10px;
}

/* IE6用ハック */
* html,* html body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	overflow-y: hidden;
}

* html div#body-inner {
	height: 100%;
	overflow-y: scroll;
}

* html div.page-back {
	position: absolute;
	right: 30px;
}
</style>
<div id="body-inner">
	<div id="header">
		<h1>大見出し</h1>
	</div>
	<div>（コンテンツの内容）</div>
	<div class="page-back">
		<a href="#header"><img src="./FSV001BT005_5/button05_seikyu_05.jpg" />
		</a>
	</div>
</div>




<?php
include ('page_footer.php');
?>
