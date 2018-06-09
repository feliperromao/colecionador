$(function(){
    $(document).on('click', '.btnExcluirItem', function(){
        const item = {id_item: $(this).data('id') }
        $.ajax({
            data: item,
            dataType: 'json',
            type: 'post',
            url: base_url + 'home/del_item',
            error: response =>{

            }
        }).done( response =>{
            $(this).parent().parent().remove()
            const nofiticacao = addNotify('info', 'Esse item foi excluido com <strong>sucesso</strong>')
            $("#notificacoes").prepend(nofiticacao);
        })
    })
})