$(function(){
    $(document).on('click', '.btnExcluirMoeda', function(){
        const moeda = {id_moeda: $(this).data('id') }
        $.ajax({
            data: moeda,
            dataType: 'json',
            type: 'post',
            url: base_url + 'home/del_moeda',
            error: response =>{

            }
        }).done( response =>{
            $(this).parent().parent().remove()
            const notifiItemExcluido = addNotify('info', 'Esse moeda foi excluida com <strong>sucesso</strong>')
            $("#notificacoes").prepend(notifiItemExcluido);
        })
    })
})