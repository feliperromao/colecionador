const validade = function(element){
    if( $(element).val() ){
        $(element).removeClass('is-invalid')
        $(element).addClass('is-valid')
    }else{
        $(element).removeClass('is-valid')
        $(element).addClass('is-invalid')
    }
}