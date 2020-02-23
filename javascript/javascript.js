
function check_empty_fields(form){

    var warning = false;
    
    if (form.first_name.value == "") {
        toggle_warning(form.first_name,true);
        form.first_name.focus();
        warning = true;
    }else{
        toggle_warning(form.first_name);
    }

    if (form.last_name.value == "") {
        toggle_warning(form.last_name,true);
        form.last_name.focus();
        warning = true;
    }else{
        toggle_warning(form.last_name);
    }

    if (form.country.value == "") {
        toggle_warning(form.country,true);
        form.country.focus();
        warning = true;
    }else{
        toggle_warning(form.country);
    }

    if (form.phone_number.value == "") {
        toggle_warning(form.phone_number,true);
        form.phone_number.focus();
        warning = true;
    }else{
        toggle_warning(form.phone_number);
    }

    if (form.email.value == "") {
        toggle_warning(form.email,true);
        form.email.focus();
        warning = true;
    }else{
        toggle_warning(form.email);
    }
    if(warning){
        return false;
    }
    return true ;
}

function toggle_warning(element,activate){
    var message = "";
    if(activate){
        message = element.title+' is Required';
    }
    document.getElementById(element.name + '_warning').innerHTML = message;
}
