<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>新規作成</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

   <script>
  $( function() {
    var dialog, form,

      year = $( "#year" ),
      stime = $( "#stime" ),
      ltime = $( "#ltime" ),
      student = $( "#student" ),
      allFields = $( [] ).add( year ).add( stime ).add( ltime ).add( student );

    }


    function addYear() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );


      if ( valid ) {
        $( "#year tbody" ).append( "<tr>" +
          "<td>" + year.val() + "</td>" +
          "<td>" + stime.val() + "</td>" +
          "<td>" + ltime.val() + "</td>" +
        "</tr>" );
        dialog.dialog( "close" );
      }
      return valid;
    }

    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "新規作成": addYear,
		"キャンセル": function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addYear();
    });

    $( "#create-year" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  } );
  </script>
</head>

<body>

<div id="dialog-form" title="新規作成">
  <p class="validateTips">新規作成に必要な情報を入力して下さい。</p>

  <form>
    <fieldset>
      <label for="year">年度：</label>
      <input type="text" name="year" id="year" value="" class="text ui-widget-content ui-corner-all">
      <label for="stime">調査開始時刻：</label>
      <input type="text" name="stime" id="stime" value="" class="text ui-widget-content ui-corner-all">
      <label for="ltime">調査終了時刻：</label>
      <input type="text" name="ltime" id="ltime" value="" class="text ui-widget-content ui-corner-all">
      <label for="student">学生アカウント追加：</label>

<!-- ファイル参照はinclude -->

      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>


<div id="users-contain" class="ui-widget">
  <h1>新規作成:</h1>
  <table id="year" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>年度</th>
        <th>開始時刻</th>
        <th>終了時刻</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>28</td>
        <td>28 12/32 00:00</td>
        <td>29 01/30 16:00</td>
      </tr>
    </tbody>
  </table>
</div>



</body>
</html>