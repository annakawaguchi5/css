<script type="text/javascript">
/**
 * ポップアップ
 */
$(function() {
	var dialog, form,

	/*year = $( "#year" ),
	stime = $( "#stime" ),
	ltime = $( "#ltime" );*/
	echo #year;
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