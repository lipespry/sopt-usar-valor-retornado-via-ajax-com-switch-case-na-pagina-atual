<?php
if (!empty($_POST['aaa'])) {
    switch ($_POST['aaa']) {
        case 1:
            include 'forms/imoveis.php';
            break;
        case 2:
            include 'forms/veiculos.php';
            break;
        case 3:
            include 'forms/produtos.php';
            break;
        default:
            die(
                'Nada foi selecionado ainda. Por favor escolha uma opção.'
            );
    }
} else
    die(
        'Requisição inválida. Esta página pertence ao tratamento de um formulário e espera um parâmetro.'
    );