<?php
/**
 * lista todos os pedidos pelo filtro aplicado
 * @param string $cliente
 * @param string $status
 * @return array
 */




function listaPedidos($cliente='', $status= '')
{
$user = "root";
$senha = "elaborata";

$dsn = 'mysql:host=localhost;dbname=logistica;port=3306';

$pdo = new PDO($dsn, $user, $senha);


if ($cliente != '')
{
    $filtro = "WHERE cliente = '$cliente' ";
} else {
    $filtro = "";
} if ($status != '')
{
    $filtro = "WHERE status = '$status'";
} else {
    $filtro = "";
}
$sql = "SELECT * FROM pedidos ORDER BY data_atualizacao DESC";
$res = $pdo->query($sql);
$dados = $res->fetchAll(PDO::FETCH_ASSOC);

return $dados;

}
