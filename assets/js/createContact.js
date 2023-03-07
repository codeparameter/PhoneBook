$(document).ready(function (){

    function nameQuery(inputEl){
        inputEl = $(inputEl);
        return `${inputEl.attr('name')}=${inputEl.val()}`
    }

    function formQuery(form){
        let query = [];
        form.children('input').each(function(index){query.push(this)});
        return "?" + query.map(nameQuery).join("&");
    }

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