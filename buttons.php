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
function list(change){
    if(change.elements["uid"].value==""){
        alert("チェックされていません。");
        /* FALSEを返してフォームは送信しない */
        return false;
    }else{
        /* TRUEを返してフォーム送信 */
        return true;
    }
}
function deleteaccount(){
	document.getElementById('list').action = 'user_delete_check.php';
	}
</script>



<div id="body-inner">
	<div class="page-back">
	<input type="submit" src="./FSV001BT005_5/button05_koudoku_05.jpg" value="change" alt="変更">
	<input type="submit" src="./FSV001BT005_5/button05_seikyu_05.jpg" value="delete" alt="削除" onclick="deleteaccount();">
	</div>
</div>
