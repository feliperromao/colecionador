$(function(){
    $("#btnCadastraNovaMoeda").bind('click', function(){
        validade( $("#frmCadastroMoeda_nome") );
        validade( $("#frmCadastroMoeda_pais") );
        const moeda = {
            nome: $("#frmCadastroMoeda_nome").val(),
            id_pais: $("#frmCadastroMoeda_pais").val(),
            pais: $("#frmCadastroMoeda_pais option:selected").html()
        };
        if( moeda.nome && moeda.id_pais ){
            $.ajax({
                data: moeda,
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/add_moeda',
                error: response=>{
                    const notifiCamposValidacao = addNotify('warning', `<p>Erro ao adicionar moeda.</p><p>${response.responseText}</p>`)
                    $("#notificacoes").prepend(notifiCamposValidacao);
                }
            }).done(response=>{
                const dados =
                    `<tr>
                        <td>${moeda.nome}</td>
                        <td>${moeda.pais}</td>
                        <td>
                            <button data-id='${response.id_moeda}' class='btnExcluirMoeda btn btn-sm btn-outline-danger' >Excluir</button>
                        </td>
                    </tr>`;
                $("#listMateriaisCadastrados").prepend(dados);
                const notifiCamposValidacao = addNotify('success', `Moeda adicionada com <strong>sucesso!</strong>`)
                $("#notificacoes").prepend(notifiCamposValidacao);
            })
        }else{
            const notifiCamposValidacao = addNotify('danger', 'Favor preencha os campos <strong>corretamente.</strong>')
            $("#notificacoes").prepend(notifiCamposValidacao);
        }
    })
})