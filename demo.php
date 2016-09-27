<?php
require_once('db_inc.php');  //データベース接続
include 'page_header.php';
?>

<script type="text/javascript">
//エンターキー押下時に次のフィールドへ
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
        $('form').submit(function(e){
            e.preventDefault();
            var noneStr = '未入力';


        		$('.checkbox input:checked').map(function() {
        		    value = $(this).val();
        		    console.log(value);
        		});
        		var check_count = $('.form :checked').length;

            //各項目を取得してダイアログ内に追加
            //ホントは$("input")→$(this)で同じことを書かないようにしなきゃだけど
            //今回は見逃してください…orz


            if ( $("input#uid").val() != "" ){
                $("span#uid").html( $("input#uid").val() );
            }
            else{
                $("span#uid").html(noneStr);
            }

            if ( $("input#delete").val() != "" ){
                $("span#delete").html( $("input#email").val() );
            }
            else{
                $("span#delete").html(noneStr);
            }

            if ( $("input#change").val() != "" ){
                $("span#change").html( $("input#change").val() );
            }
            else{
                $("span#change").html(noneStr);
            }

            //ダイアログを開く
            $('#dialog').dialog('open');
        });

});
</script>



<?php
include('year.php');
?>


<div id="body-inner">
	<div class="page-back">
		<input type="image" src="./FSV001BT005_5/button05_seikyu_05.jpg"
			name="delete" value="delete" alt="削除"> <input type="image"
			src="./FSV001BT005_5/button05_koudoku_05.jpg" name="change"
			value="change" alt="変更">
	</div>
</div>

<!--▼ ui-dialog ▼-->
<div id="dialog" title="送信内容の確認">
	<p class="item">お名前</p>
	<span id="namae"></span>
	<p class="item">削除</p>
	<span id="delete"></span>
	<p class="item">変更</p>
	<span id="change"></span>
</div>
<!--▲ ui-dialog ▲-->


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
#dialog p,span {
	font-size: 12px;
}

#dialog span {
	font-weight: bold;
}
</style>
<?php
include('page_footer.php');
?>

