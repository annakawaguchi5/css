<imart type="head">
  <title>新規登録画面</title>
           ・・・
</imart>
 <!-- Load library -->
 <script src="ui/libs/jquery-validation-1.9.0/jquery.validate.js"></script>
 <script src="ui/js/imui-form-util.js"></script>
 <imart type="imuiValidationRule" rule="foo/bar#hoge" rulesName="rules" messagesName="messages" />
 <script type="text/javascript">
   (function($) {
     $(document).ready(function() {
       // Form の 2 度押し防止
       imuiDisableOnSubmit('#form');

       // 参照画面へ引き渡すキーの配列生成
       var optionalData = ['user_cd'];

       // 登録ボタンクリック
       $('#register-button').click(function() {

         // バリデーションチェック
         if (imuiValidate('#form', rules, messages)) {
           // 確認ダイアログ表示
           imuiConfirm(
             '<imart type="string" value=$data.dialogMessages.message escapeJs="true" />', // メッセージ
             '<imart type="string" value=$data.dialogMessages.title escapeJs="true" />',  // タイトル
             function() { // OKクリック時のコールバック関数
               // Ajax でのデータ送信と次画面への遷移
               imuiAjaxSubmit('#form', 'POST', 'json', 'reference/list/views/list');
             }
           );
         }
       });
     });
   })(jQuery);
 </script>
<!-- 画面タイトル -->
<div class="imui-title">
  <h1>新規登録画面</h1>
</div>

<!-- ツールバー -->
<div class="imui-toolbar-wrap">
  <div class="imui-toolbar-inner">
    <ul class="imui-list-toolbar">
      <!-- 戻るボタン -->
      <li><a href="#" class="imui-toolbar-icon" title="戻る"><span class="im-ui-icon-common-16-back"></span></a></li>
    </ul>
  </div>
</div>

<!-- コンテンツエリア -->
<div class="imui-form-container-narrow">
  <!-- h2 -->
  <div class="imui-chapter-title">
    <h2>入力フォームのタイトル（必要に応じて配置）</h2>
  </div>

  <form id="form" method="POST" class="target_form mt-10" action="hoge/register" onsubmit="return false;">
    <table class="imui-form">
      <tr>
        <th><label>項目名1</label></th>
        <td><imart type="imuiTextbox" id="textbox" name="textbox" style="width: 200px;" /></td>
      </tr>
      <tr>
        <th><label>項目名2</label></th>
        <td><imart type="imuiPassword" id="password" name="password" style="width: 200px;" /></td>
      </tr>
      <tr>
        <th><label>項目名3</label></th>
        <td><imart type="imuiTextArea" id="textarea" name="textarea" width="350px" height="50px" /></td>
      </tr>
      <tr>
        <th><label>項目名4</label></th>
        <td>
          <imart type="imuiCheckbox" id="checkbox_1" name="checkbox" label="チェック1"  />
          <imart type="imuiCheckbox" id="checkbox_2" name="checkbox" label="チェック2"  />
          <imart type="imuiCheckbox" id="checkbox_3" name="checkbox" label="チェック3"  />
        </td>
      </tr>
      <tr>
        <th><label>項目名5</label></th>
        <td>
          <imart type="imuiRadio" id="radio_1" name="radio" label="ラジオ1" />
          <imart type="imuiRadio" id="radio_2" name="radio" label="ラジオ2" />
          <imart type="imuiRadio" id="radio_3" name="radio" label="ラジオ3" />
        </td>
      </tr>
      <tr>
        <th><label>項目名6</label></th>
        <td>
          <imart type="imuiSelect" id="inputItem6" name="inputItem6" width="200px" />
        </td>
      </tr>
    </table>
    <div class="imui-operation-parts">
      <imart type="imuiButton" value="登録" id="register-button" class="imui-large-button" />
    </div>
  </form>
</div>