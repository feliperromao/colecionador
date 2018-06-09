<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="frmCadastroPais_nome">Pais</label>
                            <input type="text" class="form-control" id="frmCadastroPais_nome" placeholder="Nome do País">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="frmCadastroPais_regiao">Região</label>
                            <select class="form-control custom-select" id="frmCadastroPais_regiao">
                                <option selected disabled value="">Selecione</option>
                                <?php if( isset($regioes) && !empty($regioes) ): foreach ($regioes as $reg): ?>
                                    <option value="<?= $reg['id'] ?>"><?= $reg['regiao'] ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <button id="btnCadastraNovoPais" type="button" class="btn btn-primary">
                                Adicionar País
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="notificacoes"></div>
        </div>
    </div>
    <h3 >Paises Cadastrados</h3>
    <div class="row">

        <div class="col">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>PAIS</th>
                        <th>REGIÃO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="listPaisCadastrados">
                <?php if(isset($paises) && !empty($paises) ): foreach ($paises as $p): ?>
                    <tr>
                        <td><?= $p['nome'] ?></td>
                        <td><?= $this->Database_model->get('regiao',$p['id_regiao'])['regiao'] ?></td>
                        <td>
                            <button class="btnExcluirPais btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/pais/add_pais.js') ?>"></script>