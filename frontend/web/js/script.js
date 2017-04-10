$(document).ready(function () {
    $('#reports-report_type_id').on('change', function () {
        $.ajax({
            type: 'POST',
            url: "/reports/reports/get_additional_fields",
            data: {id: $(this).val()},
            success: function (data) {
                $("#additionalFields").html(data);
            }
        });
    });

    var valid = new Validation();
    valid.init({
        classItem: 'vItem',
        eventElement: '#sendReport'
    });
});