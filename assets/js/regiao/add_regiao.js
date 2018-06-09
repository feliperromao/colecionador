$(function(){
    $("#btnCadastraRegiao").bind('click', function(){
        validade( $("#frmCadastroRegiao_regiao") );
        const regiao = $("#frmCadastroRegiao_regiao").val();
        if( regiao ){
            $.ajax({
                data: {regiao},
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/add_regiao'
            }).done(response=>{
                const dados =
                    `<tr>
                        <td>${regiao}</td>
                        <td><button data-id='${response.id_regiao}' class='btnExcluirRegiao btn btn-sm btn-outline-danger'>Excluir</button></td>
                    </tr>`;
                $("#listRegioesCadastradas").prepend(dados);
                const mensagem = 'Região adicionada com <strong>sucesso</strong>';
                const notify = addNotify('success', mensagem);
                $("#notificacoes").prepend(notify);
                $("#frmCadastroRegiao").trigger('reset')
            })
        }else{
            const mensagem = 'Favor preencha os campos <strong>corretamente.</strong>';
            const notify = addNotify('danger', mensagem);
            $("#notificacoes").prepend(notify);
        }
    })
})