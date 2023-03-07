function nameQuery(inputEl){
    inputEl = $(inputEl);
    return `${inputEl.attr('name')}=${inputEl.val()}`
}

function formQuery(form){
    let query = [];
    form.children('input').each(function(index){query.push(this)});
    return "?" + query.map(nameQuery).join("&");
}