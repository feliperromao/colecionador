$(function(){
    $("#btnCadastraNovoMaterial").bind('click', function(){
        validade( $("#frmCadastroMaterial_tipo" ) )
        const material = {
            tipo: $("#frmCadastroMaterial_tipo").val()
        }
        if( material.tipo ){
            $.ajax({
                data: material,
                dataType: 'json',
                type: 'post',
                url: base_url + 'home/add_material',
                error: _=>{

                }
            }).done(response=>{
                const dados =
                    `<tr>
                        <td>${material.tipo}</td>
                        <td>
                            <button data-id='${response.id_material}' class='btnExcluirMaterial btn btn-sm btn-outline-danger' >Excluir</button>
                        </td>
                    </tr>`
                $("#listMateriaisCadastrados").prepend(dados)
                const nofiticacao = addNotify('success', `Material adicionado com <strong>sucesso!</strong>`)
                $("#notificacoes").prepend(nofiticacao);
            })
        }else{
            const nofiticacao = addNotify('danger', 'Favor preencha os campos <strong>corretamente.</strong>')
            $("#notificacoes").prepend(nofiticacao);
        }
    })
})