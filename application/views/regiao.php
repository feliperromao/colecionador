<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form id="frmCadastroRegiao">
                <div class="form-group">
                    <label  for="frmCadastroRegiao_regiao">Região</label>
                    <input id="frmCadastroRegiao_regiao" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <button id="btnCadastraRegiao" type="button" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="notificacoes"></div>
        </div>
    </div>
    <h3 >Regiões Cadastradas</h3>
    <div class="row">

        <div class="col">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>REGIÃO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="listRegioesCadastradas">
                <?php if(isset($regioes) && !empty($regioes) ): foreach ($regioes as $r): ?>
                    <tr>
                        <td><?= $r['regiao'] ?></td>
                        <td>
                            <button data-id="<?= $r['id'] ?>" class="btnExcluirRegiao btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/regiao/add_regiao.js') ?>"></script>
<script src="<?= base_url('assets/js/regiao/del_regiao.js') ?>"></script>