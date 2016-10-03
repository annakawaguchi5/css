<script type="text/javascript">
/**
 * ポップアップ
 */
$(function() {
	var dialog, form,

	year = $( "#year" ),
	stime = $( "#stime" ),
	ltime = $( "#ltime" );
	//echo year;
	allFields = $( [] ).add( year ).add( stime ).add( ltime );

	// 「新規作成」ボタンがクリックされたらダイアログを表示


	$( "#new" ).button().on( "click", function() {
		$('#year').val('');
		$('#stime').val('');
		$('#ltime').val('');
		dialog.dialog( "open" );
	});

	function addYear() {
		var valid = true;
		allFields.removeClass( "ui-state-error" );
		if ( valid ) {


			$("<td>"+$('#year').val()+"年度</td>").insertAfter('#form2 .year');
			$("<td>"+$('#stime').val()+"</td>").insertAfter('#form2 .stime');
			$("<td>"+$('#ltime').val()+"</td>").insertAfter('#form2 .ltime');

			/*
			$("<td>"+$('#year').val()+"年度</td>").replaceAll('#form2 .year');
			$("<td>"+$('#stime').val()+"</td>").replaceAll('#form2 .stime');
			$("<td>"+$('#ltime').val()+"</td>").replaceAll('#form2 .ltime');*/

			valid = false;
		}
		return valid;
		allFields.removeData();
		//allFields.detach('year');
	}

	// 表示するフォームは 'dialog-form' という ID で定義します。
	dialog = $("#dialog-form").dialog({
		autoOpen: false,
		height: 480,
		width: 460,
		modal: true,
		buttons: {  // ダイアログに表示するボタンと処理
			"新規作成": function(year, stime, ltime) {
				$(this).dialog("close");
				$("#dialog-form-check").dialog("open");
				addYear();
			},
			"キャンセル": function() {
				$(this).dialog("close");
				Close();
			}
		}

	});

	form = dialog.find( "form2" ).on( "submit", function( event ) {
		event.preventDefault();
		addYear();
	});



	$("#dialog-form-check").dialog({
		autoOpen: false,
		height: 480,
		width: 460,
		modal: true,
		buttons: {  // ダイアログに表示するボタンと処理
			"新規作成": function() {
				//新規作成を実行
				//document.form.submit();
				$(this).dialog("close");
				Close();
				return false;

			},
			"キャンセル": function() {
				$(this).dialog("close");
				Close();
			}
		}
	});

	function Close() {
		form.reset();
		allFields.val("").removeClass( "ui-state-error" );
	}
});
function showValues() {
	var fields = $(":input").serializeArray();
	$("#results").empty();
	jQuery.each(fields, function(i, field){
		$("#results").append(field.value + " ");
	});
}
$(":checkbox, :radio").click(showValues);
$("#text").click(showValues);
$("select").change(showValues);
showValues();

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
$(function () {
	$('#stime').datetimepicker({
		locale: 'ja',
		sideBySide: true,
		viewMode: 'years',
		format : 'YYYY-MM-DD HH:mm:ss'
	});
	$('#ltime').datetimepicker({
		locale: 'ja',
		sideBySide: true,
		viewMode: 'years',
		format : 'YYYY-MM-DD HH:mm:ss',
		useCurrent: false //Important! See issue #1075
	});
	$("#stime").on("dp.change", function (e) {
		$('#ltime').data("DateTimePicker").minDate(e.date);
	});
	$("#ltime").on("dp.change", function (e) {
		$('#stime').data("DateTimePicker").maxDate(e.date);
	});
});

<!--
function check(time){
	if(time.elements['stime'].value!="" || time.elements['ltime'].value!=""){
		var stime = time.elements['stime'].value;
		var ltime = time.elements['ltime'].value;
		if(stime.match(/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/) && ltime.match(/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/)){
			return true;
		}else if(stime==""){
			alert('開始時刻を入力して下さい。');
			return false;
		}else if(ltime==""){
			alert('終了時刻を入力して下さい。');
			return false;
		}

	}else{
		alert('項目を正確に埋めてください。');
		return false;
	}
}

//-->
</script>