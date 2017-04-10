$(document).ready(function(){
    $('#reservation').datepicker({
        format: 'yyyy-mm-dd',
        language: 'ru'
    });

    $(".timepicker").timepicker({
        showInputs: false,
        maxHours: 24,
        showMeridian: false
    });


    $(document).on('change','.itemImg',function(){
        var path = $('.itemImg').val();
        $('.media__upload_img').html('<img src="' +path + '" width="100px"/> <br>');
    });

    $(document).on('change', '.selectLang', function(){
        var langId = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/secure/news/news/get_categ",
            data: 'langId=' + langId,
            success: function (data) {
                $(".selectCat").html(data);
            }
        });
    });

    $('#customfields-type').on('change', function () {
         if($(this).val() === 'select' || $(this).val() === 'radio' || $(this).val() === 'checkbox'){
             $.ajax({
                 type: 'POST',
                 url: "/secure/custom_fields/custom_fields/get_variation",
                 data: {},
                 success: function (data) {
                     $("#variation-box").html(data);
                 }
             });
         }
    });
});