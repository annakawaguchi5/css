<?php include('page_header.php'); ?>

<form class="form-horizontal container-fluid bg-info" action="check.php" method="post">
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
  <button class="btn btn-success col-sm-offset-2" type="submit" value="ログイン">ログイン</button>
  <button class="btn btn-default" type="reset" value="取消">取消</button>
</form>


<?php include('page_footer.php'); ?>