<?php

function conectar()
{    
    $user = "root";
    $senha = "elaborata";

    $dsn = 'mysql:host=localhost;dbname=logistica;port=3306';

    $pdo = new PDO($dsn, $user, $senha);
    return $pdo
}
/**
 * lista todos os pedidos pelo filtro aplicado
 * @param string $cliente
 * @param string $status
 * @return array
 */
function listaPedidos($cliente = '', $status = '') {

        $pdo = conectar()

    $filtro = "";
    if ($cliente != '') {
        $filtro = "WHERE cliente LIKE '$cliente%'";
    }

    if ($status != '' && $filtro != "") {
        $filtro = $filtro . "AND status = '$status'";
    } elseif ($status != '' && $filtro != "") {
        $filtro = $filtro . "WHERE status = '$status'";
    }

    $sql = "SELECT * FROM pedidos $filtro ORDER BY data_atualizacao DESC";
    echo $sql;

    $res = $pdo->query($sql);
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

    return $dados;
}
function cadastrarPedido()
{
    
}