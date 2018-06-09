<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form id="frmCadastroMoeda" >
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="frmCadastroMoeda_nome">Nome</label>
                            <input type="text" class="form-control" id="frmCadastroMoeda_nome" placeholder="Nome da moeda">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="frmCadastroMoeda_pais">País</label>
                            <select class="form-control custom-select" id="frmCadastroMoeda_pais">
                                <option selected disabled value="">Selecione</option>
                                <?php if( isset($paises) && !empty($paises) ): foreach ($paises as $p): ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['nome'] ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button id="btnCadastraNovaMoeda" type="button" class="btn btn-primary">Adicionar Moeda</button>
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="notificacoes"></div>
        </div>
    </div>
    <h3 >Moedas Cadastrados</h3>
    <div class="row">

        <div class="col">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>MOEDA</th>
                        <th>PAÍS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="listMoedasCadastradas">
                <?php if(isset($moedas) && !empty($moedas) ): foreach ($moedas as $m): ?>
                    <tr>
                        <td><?= $m['nome'] ?></td>
                        <td><?= $this->Database_model->get('pais',$m['id_pais'])['nome'] ?></td>
                        <td>
                            <button data-id="<?= $m['id'] ?>" class="btnExcluirMoeda btn btn-sm btn-outline-danger" type="button">
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/moeda/add_moeda.js') ?>"></script>
<script src="<?= base_url('assets/js/moeda/del_moeda.js') ?>"></script>