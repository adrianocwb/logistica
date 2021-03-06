<?php

require_once 'db.php';

/**
 * Lista todos os pedidos pelo filtro aplicado
 * @param string $cliente
 * @param string $status
 * @return array
 */
function listaPedidos($cliente = '', $status = '')
{
    $pdo = conectar();
  
    $filtro = "";
    
    if ($cliente != '')
    {
        $filtro = " WHERE cliente LIKE '$cliente%' ";
    }
 
    if ($status != '' && $filtro != "")
    {
        $filtro .=  " AND status = '$status' ";
            
    } elseif ($status != '' && $filtro == "")
    {
        $filtro .=  " WHERE status = '$status' ";
    }
    
    
     $sql = "SELECT * FROM pedidos $filtro ORDER BY data_atualizacao DESC";

     
    $res = $pdo->query($sql);

    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

    return $dados;
}

/**
 * Cadatra um novo pedido
 * @param int $numero
 * @param string $cliente
 * @param string $data
 * @param string $status
 */
function cadastrarPedido($numero, $cliente, $data, $status)
{
    $pdo = conectar();
    
    $sql = "INSERT INTO `pedidos` "
            . "(`id`, `num_pedido`, `cliente`, `data_pedido`, "
            . "`status`, `data_atualizacao`) "
            . "VALUES "
            . "(NULL, '$numero', '$cliente', '$data', '$status', NOW());";
    
    $total = $pdo->exec($sql);
    
    return $total;
}

/**
 * Deleta o pedido informado
 * @param int $id
 * @return int
 */
function deletarPedido($id)
{
    $pdo = conectar();
    
    $sql = "DELETE FROM pedidos WHERE id = $id";
    
    $total = $pdo->exec($sql);
    
    return $total;
    
}


/**
 * Retorna os dados de um pedido cadastrado
 * @param int $id
 */


/**
 * Altera os dados do pedido informado
 * @param int $id
 * @param int $num_pedido
 * @param string $cliente
 * @param string $data
 * @param string $status
 */
function atualizarPedido($id, $num_pedido, $cliente, $data, $status)
{
    $pdo = conectar();
    $agora = date("Y-m-d H:i:s");
    
    $sql = "UPDATE pedidos SET "
            . "status = '$status',"
            .  "num_pedido = '$num_pedido', "
            . "cliente = '$cliente',"
            . "data_pedido = '$data',"
            . "data_atualizacao = '$agora' "
            . " WHERE id = $id";
   
    $total = $pdo->exec($sql);
    
    return $total;
    
}