<form id='csv' class="form-horizontal" action="importCsv_do.php">
    <div class="form-group">
        <div class="col-md-8">
            <input id="fake_input_file" onclick="$('#file_input').click();"
                readonly="readonly" type="text" value="" class="form-control input-sm"
                maxlength="12" >
            <input id="file_input" onchange="$('#fake_input_file').val(files[0].name)"
                 style="display: none;" class="form-control input-sm" type="file">
        </div>
        <div class="col-md-2">
            <input onclick="$('#file_input').click();"
                class="btn btn-default btn-sm btn-block open" type="button"
                value="参 照">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <input type="button" class="btn btn-primary btn-sm btn-block import_csv"
                value="取 込" id="import_csv">
        </div>
    </div>
</form>