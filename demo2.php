<?php include('page_header.php');?>
<div class="container">
    <div class='col-md-5'>
        <div class="form-group">
            <div class='input-group date' id='stime'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <div class='input-group date' id='ltime'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#stime').datetimepicker();
        $('#ltime').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#stime").on("dp.change", function (e) {
            $('#ltime').data("DateTimePicker").minDate(e.date);
        });
        $("#ltime").on("dp.change", function (e) {
            $('#stime').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
</body>
</html>