// script.js
$(document).ready(function() {
    $('#storeDetails').click(function() {
        var targetted = $('input[name="targetted[]"]').map(function(){return $(this).val();}).get();
        var implemented = $('input[name="implemented[]"]').map(function(){return $(this).val();}).get();

        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: {
                targetted: targetted,
                implemented: implemented
            },
            success: function(response) {
                $('#output').html(response);
            }
        });
    });
});
