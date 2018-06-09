$(function(){
    $("#btnCadastraNovoPais").bind('click', function(){
        validade( $("#frmCadastroPais_nome") )
        validade( $("#frmCadastroPais_regiao") )
        const pais = {
            nome: $("#frmCadastroPais_nome").val(),
            id_regiao: $("#frmCadastroPais_regiao").val(),
            regiao: $("#frmCadastroPais_regiao option:selected").html()
        }
        if( pais.nome && pais.id_regiao ){
            $.ajax({
                data: pais,
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/add_pais',
                error: response=>{
                    const text = `<p>Erro ao inserir esse país</p><p>${response.responseText}</p>`
                    const notifiAddSuccess = addNotify('success', 'País adicionado com <strong>sucesso</strong>')
                    $("#notificacoes").prepend(notifiAddSuccess);
                }
            }).done(response=>{
                const paisCadastrado =
                    `<tr>
                        <td>${pais.nome}</td>
                        <td>${pais.regiao}</td>
                        <td>
                            <button data-id='${response.id_pais}' class='btnExcluirPais btn btn-sm btn-outline-danger'>Excluir</button>
                        </td>
                    </tr>`
                $("#listPaisCadastrados").prepend(paisCadastrado)
                const notifiAddSuccess = addNotify('success', 'País adicionado com <strong>sucesso</strong>')
                $("#notificacoes").prepend(notifiAddSuccess)
            })
        }else{
            const notifiCamposValidacao = addNotify('danger', 'Favor preencha os campos <strong>corretamente</strong>')
            $("#notificacoes").prepend(notifiCamposValidacao)
        }
    })
})