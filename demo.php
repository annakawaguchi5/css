<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
?>

<h1>お知らせ</h1>

  <script type="text/javascript">
  $( function() {
	  $("#info-check").button().on("click", function(){
	  $("#dialog").dialog("open");
	  }

    $( "#dialog" ).dialog({
    	autoOpen: false,
      modal: true,
      buttons: {
        "OK": function() {
          $( "#dialog" ).dialog( "close" );
        }
      }
    });
  });
  </script>

<div id="dialog" title="コメントの投稿ありがとうございます" style="display: none;">
<p>コメントを受け付けました。<br />コメントは管理人の承認後、表示されます。</p>
</div>


<button id="info-check">あいうえお</button>


<?php
include('page_footer.php');
?>