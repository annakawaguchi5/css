<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery UI Dialog - Modal form</title>
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>
<body>
	<script type="text/javascript">

$(function() {
    // 表示するフォームは 'dialog-form' という ID で定義します。
    $("#dialog-form").dialog({
        autoOpen: false,
        height: 480,
        width: 460,
        modal: true,
        buttons: {  // ダイアログに表示するボタンと処理
            "保存": function() {
                displayMessage("「保存」ボタンが押されました。終了するには「閉じる」ボタンを押してください。");
            },
            "閉じる": function() {
                displayMessage("「閉じる」ボタンが押されました。");
                $(this).dialog("close");
            }
        },
    });

    // 「開く」ボタンがクリックされたらダイアログを表示
    $("#open").click(function() {
        $("#dialog-form").dialog("open");
        return false;
    });
});

// エラー表示
function displayError(str) {
    var msg = $(".messageBar");

    msg
        .text(str)
        .addClass("ui-state-error");
    setTimeout(function() {
        msg.removeClass("ui-state-error", 1500);
    }, 500);
}

// メッセージ表示
function displayMessage(str) {
    var msg = $(".messageBar");

    msg
        .text(str)
        .addClass("ui-state-highlight");
    setTimeout(function() {
        msg.removeClass("ui-state-highlight", 1500);
    }, 500);
}
	</script>

	<!--contentns-->
	<div id="contents">
		<div id="main">

			<section>
				<h3>jQuery UI ダイアログ サンプル</h3>
				<p>jQuery UI の ダイアログを使用してみました。 「開く」ボタンをクリックすると、画面が表示（ポップアップ）されます。</p>
				<div>

					<style>
table.sample {
	border: 1px solid #FDFEFE;
	border-collapse: collapse;
	border-spacing: 0;
	empty-cells: show;
}

.sample th {
	border-top: solid 1px #8DB9DB;
	border-left: solid 1px #8DB9DB;
	border-right: solid 1px #8DB9DB;
	border-bottom: solid 1px #8DB9DB;
	background-color: #85B5D9;
	color: #FFFFFF;
	padding: 0.3em 1em;
	white-space: nowrap;
	text-align: center;
	font-weight: bold;
}

.sample td {
	border-top: solid 1px #8DB9DB;
	border-left: solid 1px #8DB9DB;
	border-right: solid 1px #8DB9DB;
	border-bottom: solid 1px #8DB9DB;
	padding: 0.3em 1em;
	white-space: nowrap;
	text-align: left;
}

.sample td.header {
	background-color: #E1EFFB;
	color: #2E6E9E;
	font-weight: bold;
}
</style>

					<p class="messageBar"
						style="margin-top: 20px; border: 1px solid transparent; padding: 0.3em;">
						下のボタンを押してください。</p>
					<div>
						<button id="open">開く</button>
					</div>

					<!-- #dialog-form  -->
					<div id="dialog-form" title="新規ユーザー">
						<form>
							<table id="form1" class="sample">
								<tr>
									<td class="header">ID</td>
									<td><input type="text" id="userid" name="userid" value=""
										size="10" maxlength="10"></td>
								</tr>
								<tr>
									<td class="header">名前</td>
									<td><input type="text" id="name" name="name" value="" size="20"
										maxlength="50" /></td>
								</tr>
								<tr>
									<td class="header">よみ</td>
									<td><input type="text" id="furigana" name="furigana" value=""
										size="20" maxlength="50"></td>
								</tr>
								<tr>
									<td class="header">電話番号1</td>
									<td><input type="text" id="telno1" name="telno1" value=""
										size="13" maxlength="13"></td>
								</tr>
								<tr>
									<td class="header">電話番号2</td>
									<td><input type="text" id="telno2" name="telno2" value=""
										size="13" maxlength="13"></td>
								</tr>
								<tr>
									<td class="header">パスワード</td>
									<td><input type="password" id="pass1" name="pass1" value=""
										size="10" maxlength="15"></td>
								</tr>
								<tr>
									<td class="header">パスワード（確認）</td>
									<td><input type="password" id="pass2" name="pass2" value=""
										size="10" maxlength="15"></td>
								</tr>
								<tr>
									<td class="header">管理者</td>
									<td><input type="checkbox" id="admin" name="admin"></td>
								</tr>
							</table>
						</form>
					</div>
					<!-- end of #dialog-form -->
				</div>
			</section>
		</div>
	</div>
</body>
</html>
