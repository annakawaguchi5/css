<?php
include('page_header.php');
include_once('db_inc.php');
?>


<form id="formEqualPass">
  <div class="form-group">
    <label class="control-label">Password</label>
    <input type="password" class="form-control" id="pass1" required>
  </div>
  <div class="form-group">
    <label class="control-label">Confirm Password</label>
    <input type="password" class="form-control" id="pass2">
  </div>
  <button type="submit" class="btn btn-default" id="btnEqualPass">Submit</button>
</form>

<script>


$('#btnEqualPass').click(function() {

	  if ($('#formEqualPass').smkValidate()) {
	    if( !$.smkEqualPass('#pass1', '#pass2') ){
	      // Code here


	    }
	}
	});

</script>

<?php
include('page_footer.php');
?>