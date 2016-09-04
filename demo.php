<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="flipCountDown のデモでーす。">
<title>flipCountDown - jQueryプラグイン</title>
<link href="jquery.flipcountdown.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>flipCountDown デモです。</h1>

<h3>時計</h3>
<div id="clock"></div>

<h3>カウントダウン（東京五輪まで）</h3>
<div id="timer"></div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jquery.flipcountdown.js"></script>
<script>
jQuery(function($){
  $('#clock').flipcountdown();
  $('#timer').flipcountdown({
    size:'md',
    beforeDateTime:'7/24/2020 00:00:01'
  });
});
</script>

</body>
</html>