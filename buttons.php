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

/*ダイアログ内のフォントまわり*/
#dialog p,span{ font-size:12px; }
#dialog span{ font-weight:bold; }
</style>

<script type="text/javascript">
$(function(){

    // jQuery UI ダイアログの設定
    $('#dialog').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        resizable: true,
        buttons: {
            "送信する": function() {
                //送信を実行
                document.form.submit();
            },
            "キャンセル": function() {
                //ダイアログを閉じる
                $(this).dialog("close");
            }
        }
    });

    //送信ボタンが押されたときに呼び出される

    $('page-back').submit(function(e){
        e.preventDefault();
        var noneStr = '未入力';

        //各項目を取得してダイアログ内に追加
        if ( $("input#student").val() != "" ){
            $("span#student").html( $("input#student").val() );
        }
        else{
            $("span#student").html(noneStr);
        }
/*
        if ( $("input#email").val() != "" ){
            $("span#email").html( $("input#email").val() );
        }
        else{
            $("span#email").html(noneStr);
        }

        if ( $("textarea").val() != "" ){
            $("span#comment").html( $("textarea").val() );
        }
        else{
            $("span#comment").html(noneStr);
        }*/

        //ダイアログを開く
        $('#dialog').dialog('open');
    });


});
</script>



<div id="body-inner">
	<div class="page-back">
	<input type="image" src="./FSV001BT005_5/button05_seikyu_05.jpg" name="delete" value="delete" alt="削除">
	<input type="image" src="./FSV001BT005_5/button05_koudoku_05.jpg" name="change" value="change" alt="変更">
	</div>
</div>

<!--▼ ui-dialog ▼-->
<div id="dialog" title="送信内容の確認">
	<p class="item">ユーザID</p>
	<span id="uid"></span>
</div>
<!--▲ ui-dialog ▲-->
