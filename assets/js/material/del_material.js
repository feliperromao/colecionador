$(function(){
    $(".btnExcluirMaterial").bind('click', function(){
        $.ajax({
            data: {id_material: $(this).data('id') },
            dataType: 'json',
            type: 'post',
            url: base_url + 'home/del_material',
            error: response=>{

            }
        }).done(response=>{
            $(this).parent().parent().remove()
            const nofiticacao = addNotify('info', 'Material excluido com <strong>sucesso</strong>')
            $("#notificacoes").prepend(nofiticacao);
        })
    })
})