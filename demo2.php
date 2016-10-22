<?php
include('page_header.php');
include_once('db_inc.php');
?>
<script type="text/javascript">
jQuery(function($){
    $(document).on('blur','dd > input',function(){
        var inputVal = $(this).val();
        var backup = $(this).parent().data('backup');
        if(inputVal===''){
            inputVal = this.defaultValue;
        };
        $(this).html('<input type="text" value="'+inputVal+'" />');
        $(this).parent().removeClass('on').text(inputVal);
        if(backup !== inputVal){
            $('button').removeAttr('disabled');
        };
        $(this).html('<input type="text" value="'+inputVal+'" />');
    });

    $('dd').each(function(){
        var backup = $(this).text();
        $(this).data('backup',backup)
            .click(function(){
            if(!$(this).hasClass('on')){
                $(this).addClass('on');
                var txt = $(this).text();
                $(this).html('<input type="text" value="'+txt+'" />');
                $('dd > input').focus()
            };
        });
    });
    $('button').attr('disabled','disabled')
        .click(function(){;
        $('dd').each(function(){
            var backup = $(this).data('backup');
            $(this).text(backup);
        });
        $(this).attr('disabled','disabled');
    });
});
</script>

<dl>
    <dt>名前：</dt>
    <dd>技評太郎</dd>

    <dt>会社名：</dt>
    <dd>技術評論社</dd>

    <dt>役職：</dt>
    <dd>WEBディレクター</dd>

    <dt>得意：</dt>
    <dd>jQuery</dd>
</dl>

<button>リセット</button>

<?php
include('page_footer.php');
?>