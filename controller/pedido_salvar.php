<?php

var_dump($_POST);

require '../model/pedidos.php';

$num_pedido = $_POST['num_pedido'];
$data = $_POST['data_pedido'];
$cliente = $_POST['cliente'];
$status = $_POST['status'];
$observacoes = $_POST['observacoes'];
$id = $_POST['id'];

if (trim($num_pedido) == '') {
    $erro = "O numero do pedido é obrigatorio!";
}

if (trim($data) == '') {
    $erro = "A data esta em um formato inválido!";
}

if (trim($cliente) == '') {
    $erro = "O cliente é obrigatorio!";
}


if (isset($erro)) {
    header("Location: ../controller/pedido_editar.php?id=$id&msg=" . $erro);
} else {
    //grava no banco
    $num = atualizarPedido($id, $num_pedido, $cliente, $data, $status);
    $msg = "Pedido Atualizado com sucesso";
    header("Location: ../index.php?msg=" . $msg);
}