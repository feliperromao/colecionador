$(function(){
    $(document).on('click', '.btnExcluirRegiao', function(){
        const deleta = confirm('Tem certeza que deseja excluir este item?');
        if( deleta ){
            $.ajax({
                data: {id_regiao: $(this).data('id')},
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/del_regiao',
                error: _=>{
                    const mensagem = 'Erro ao deletar este item, favor tente novamente'
                    const notify = addNotify('warning', mensagem)
                    $("#notificacoes").prepend(notify);
                }
            }).done(_=>{
                
            })
        }

    });
});