<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 >Cadastro de Itens</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form id="frmCadastroItem">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="frmCadastroItem_moeda">Moeda <span class="text-danger font-weight-bold">*</span></label>
                            <select class="form-control custom-select" id="frmCadastroItem_moeda">
                                <option selected disabled value="">Selecione</option>
                                <?php if( isset($moedas) && !empty($moedas) ): foreach ($moedas as $m): ?>
                                    <?php
                                        $pais = $this->Database_model->get('pais', $m['id']);
                                        $regiao = $this->Database_model->get('regiao', $pais['id_regiao']);
                                    ?>
                                    <option data-regiao="<?= $regiao['regiao'] ?>" data-pais="<?= $pais['nome'] ?>" value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="frmCadastroItem_material">Material <span class="text-danger font-weight-bold">*</span></label>
                            <select class="form-control custom-select" id="frmCadastroItem_material">
                                <option selected disabled value="">Selecione</option>
                                <?php if( isset($materiais) && !empty($materiais) ): foreach ($materiais as $mat): ?>
                                    <option value="<?= $mat['id'] ?>"><?= $mat['tipo'] ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="frmCadastroItem_descricao">Descrição <span class="text-danger font-weight-bold">*</span></label>
                            <input id="frmCadastroItem_descricao" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="frmCadastroItem_valor">Valor <span class="text-danger font-weight-bold">*</span></label>
                            <input id="frmCadastroItem_valor" class="form-control" step="0.01" type="number">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="frmCadastroItem_dtCompra">Data de Compra <span class="text-danger font-weight-bold">*</span></label>
                            <input id="frmCadastroItem_dtCompra" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="frmCadastroItem_dtProducao">Data de Produção <span class="text-danger font-weight-bold">*</span></label>
                            <input id="frmCadastroItem_dtProducao" class="form-control" type="date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button id="btnCadastraItem" type="button" class="btn btn-primary">Adicionar</button>
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
    <h3 >Meus Itens</h3>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-responsive-lg">
                <thead class="thead-light">
                    <tr>
                        <th>MOEDA</th>
                        <th>MATERIAL</th>
                        <th>PAIS</th>
                        <th>REGIÃO</th>
                        <th>DESCRIÇÃO</th>
                        <th>VALOR</th>
                        <th>DATA DE COMPRA</th>
                        <th>DATA DE PRODUÇÃO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="listItensCadastrados">
                <?php if(isset($itens) && !empty($itens) ): foreach ($itens as $i): ?>
                    <tr>
                        <td><?= $i['nome_moeda'] ?></td>
                        <td><?= $i['material'] ?></td>
                        <td><?= $i['pais'] ?></td>
                        <td><?= $i['regiao'] ?></td>
                        <td><?= $i['descricao'] ?></td>
                        <td><?= $i['valor'] ?></td>
                        <td><?= date('d/m/Y', strtotime($i['data_compra'])) ?></td>
                        <td><?= date('d/m/Y', strtotime($i['data_producao'])) ?></td>
                        <td>
                            <button data-id="<?= $i['id'] ?>" class="btnExcluirItem btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/item/add_item.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/item/del_item.js') ?>"></script>