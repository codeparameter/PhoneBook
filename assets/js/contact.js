$(document).ready(function (){

    $('#contactSubmit').click(function(){
        const form = $(this).parent();
        const targetLink = form.attr('data-target') + formQuery(form);
        $.post(targetLink, function(response){
            if(response['status'] === 'error'){
                $('#phoneAlert').html(response['message']).removeClass('alert');
            }
            else{
                window.location.href = "/";
            }
        });
    });
});