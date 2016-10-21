<style>
.page-back {
	position: fixed;
	bottom: 10px;
	right: 100px;
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
	<?php
	//ユーザ登録
	//echo '<a href="importCsv.php?year='.$dispyear.'"><input type="image" src="./img/register.gif" alt="登録" onclick="register()"></a>';
?>

	<input type="image" src="./img/change.gif" value="change" alt="変更">
	<input type="image" src="./img/delete.gif" value="delete" alt="削除" onclick="deleteaccount();">
	</div>
</div>
