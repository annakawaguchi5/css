<script type="text/javascript">
/**
 * ポップアップ
 */
$(function() {
	// 「新規作成」ボタンがクリックされたらダイアログを表示
	$("#new").click(function() {
		$("#dialog-form").dialog("open");
		return false;
	});

	// 表示するフォームは 'dialog-form' という ID で定義します。
	$("#dialog-form").dialog({
		autoOpen: false,
		height: 480,
		width: 460,
		modal: true,
		buttons: {  // ダイアログに表示するボタンと処理
			"新規作成": function() {
				$(this).dialog("close");
				$("#dialog-form-check").dialog("open");
			},
			"キャンセル": function() {

				$(this).dialog("close");
			}
		}
	});

	$("#dialog-form-check").dialog({
		autoOpen: false,
		height: 480,
		width: 460,
		modal: true,
		buttons: {  // ダイアログに表示するボタンと処理
			"新規作成": function() {
				$(this).dialog("close");
				return false;
			},
			"キャンセル": function() {
				$(this).dialog("close");
			}
		}
	});


});

//エラー表示
function displayError(str) {
	var msg = $(".messageBar");

	msg
	.text(str)
	.addClass("ui-state-error");
	setTimeout(function() {
		msg.removeClass("ui-state-error", 1500);
	}, 500);
}

//メッセージ表示
function displayMessage(str) {
	var msg = $(".messageBar");

	msg
	.text(str)
	.addClass("ui-state-highlight");
	setTimeout(function() {
		msg.removeClass("ui-state-highlight", 1500);
	}, 500);
}
/**
 * 日付入力
 */
$(function(){
	//datepicker
	$('.hoge').datepicker({
		minDate: 0,
		changeYear: true,
		changeMonth: true,
		showMonthAfterYear: true,
		yearRange:'<?= date("Y") ?>:<?= date("Y")+1 ?>',
		dateFormat: 'yy-mm-dd(D)', //年-月-日(曜日)
		onSelect:function(date){
			$.get("hoge.php",
					{Id: $(this).attr("id"),
				Date: $(this).val()});
		}
	});
});
</script>