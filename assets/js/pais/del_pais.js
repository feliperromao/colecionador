$(function(){
    $(document).on('click', ".btnExcluirPais", function(){
        const deleta = confirm('Tem certeza que deseja deletar este item?')
        if( deleta ){
            $.ajax({
                data:{id_pais: $(this).data('id')},
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/del_pais',
                error: _=>{
                    const mensagem = 'Erro ao deletar este item, favor tente novamente'
                    const notify = addNotify('warning', mensagem)
                    $("#notificacoes").prepend(notify);
                }
            }).done(_=>{
                $(this).parent().parent().remove()
                const mensagem = 'Pais deletado com sucesso!'
                const notify = addNotify('info', mensagem)
                $("#notificacoes").prepend(notify);
            })
        }
    })
});