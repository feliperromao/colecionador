$(function(){
    $("#btnCadastraItem").bind('click', function(){
        // Validação dos campos obrigatórios
        validade( $("#frmCadastroItem_moeda") )
        validade( $("#frmCadastroItem_material") )
        validade( $("#frmCadastroItem_descricao") )
        validade( $("#frmCadastroItem_valor") )
        validade( $("#frmCadastroItem_dtCompra") )
        validade( $("#frmCadastroItem_dtProducao") )

        const item = {
            id_moeda: $("#frmCadastroItem_moeda").val(),
            moeda: $("#frmCadastroItem_moeda option:selected").html(),
            pais: $("#frmCadastroItem_moeda option:selected").attr('data-pais'),
            regiao: $("#frmCadastroItem_moeda option:selected").attr('data-regiao'),
            id_material: $("#frmCadastroItem_material").val(),
            material: $("#frmCadastroItem_material option:selected").html(),
            descricao: $("#frmCadastroItem_descricao").val(),
            valor: $("#frmCadastroItem_valor").val(),
            data_compra: $("#frmCadastroItem_dtCompra").val(),
            data_producao: $("#frmCadastroItem_dtProducao").val()
        }
        if( item.id_moeda && item.id_material && item.descricao && item.valor && item.data_compra && item.data_producao ){
            $.ajax({
                data: item,
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/add_item',
                error: response =>{
                    const textMensage =
                        `<p>Não foi possivel adicionar este item</p>
                        <p><strong>${response.responseText}</strong></p>`
                    const notifiAddError = addNotify('warning', textMensage)
                    $("#notificacoes").prepend(notifiAddError);
                }
            }).done( response=>{
                const itemCadastrado =
                    `<tr>
                        <td>${item.moeda}</td>
                        <td>${item.material}</td>
                        <td>${item.pais}</td>
                        <td>${item.regiao}</td>
                        <td>${item.descricao}</td>
                        <td>${item.valor}</td>
                        <td>${item.data_compra}</td>
                        <td>${item.data_producao}</td>
                        <td>
                            <button data-id='${response.id_item}' class='btnExcluirItem btn btn-sm btn-outline-danger'>Excluir</button>
                        </td>
                    </tr>`
                $("#listItensCadastrados").prepend(itemCadastrado)
                const notifiAddSuccess = addNotify('success', 'Item adicionado com <strong>sucesso</strong>')
                $("#notificacoes").prepend(notifiAddSuccess);
            })
        }else{
            const notifiCamposValidacao = addNotify('danger', 'Favor preencha os campos <strong>corretamente</strong>')
            $("#notificacoes").prepend(notifiCamposValidacao);
        }
    })

})