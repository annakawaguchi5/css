<?php include('page_header.php'); ?>
<style>
.button_wall { text-align : right ; }
</style>
<form class="form-horizontal bg-info" action="check.php" method="post">
  <div class="form-group">
    <label for="uid" class="control-label col-sm-2">ユーザID:</label>
    <div class="col-sm-10">
      <input type="text" name="uid" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="pass" class="control-label col-sm-2">パスワード:</label>
    <div class="col-sm-10">
      <input type="password" name="pass" class="form-control">
    </div>
  </div>
  <div class="button_wall">
  <button class="btn btn-success col-sm-offset-2" type="submit" value="ログイン">ログイン</button>
  <button class="btn btn-default" type="reset" value="取消">取消</button>
  </div>
</form>


<h4 class="col-xs-offset-1 col-xs-6"><a href="passwd_info.php">パスワードを忘れてしまったら</a></h4>


<?php include('page_footer.php'); ?>