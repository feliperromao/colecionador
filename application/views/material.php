<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="frmCadastroMaterial_tipo">Tipo de Material</label>
                            <input type="text" class="form-control" id="frmCadastroMaterial_tipo" placeholder="Material">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button id="btnCadastraNovoMaterial" type="button" class="btn btn-primary">Adicionar Material</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="notificacoes"></div>
        </div>
    </div>
    <h3 >Materiais Cadastrados</h3>
    <div class="row">

        <div class="col">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>MATERIAL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="listMateriaisCadastrados">
                <?php if(isset($materiais) && !empty($materiais) ): foreach ($materiais as $m): ?>
                    <tr>
                        <td><?= $m['tipo'] ?></td>
                        <td>
                            <button data-id="<?= $m['id'] ?>" class="btnExcluirMaterial btn btn-sm btn-outline-danger" type="button">
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

<script src="<?= base_url('assets/js/material/add_material.js') ?>"></script>
<script src="<?= base_url('assets/js/material/del_material.js') ?>"></script>