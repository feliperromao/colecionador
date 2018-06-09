<?php defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colecionador</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/js/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/validate.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/functions.js') ?>"></script>
    <script> const base_url = '<?= base_url() ?>' </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>">Colecionador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'item' )? 'active' : null ?>">
                            <a class="nav-link" href="<?= base_url('item') ?>">Item <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?= ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'moeda' )? 'active' : null ?>">
                            <a class="nav-link" href="<?= base_url('moeda') ?>">Moeda</a>
                        </li>
                        <li class="nav-item <?= ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'pais' )? 'active' : null ?>">
                            <a class="nav-link" href="<?= base_url('pais') ?>">País</a>
                        </li>
                        <li class="nav-item <?= ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'regiao' )? 'active' : null ?>">
                            <a class="nav-link" href="<?= base_url('regiao') ?>">Região</a>
                        </li>
                        <li class="nav-item <?= ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'material' )? 'active' : null ?>">
                            <a class="nav-link" href="<?= base_url('material') ?>">Material</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    </header>
    
</body>
</html>

