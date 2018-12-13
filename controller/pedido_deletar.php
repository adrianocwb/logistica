<?php

require '../model/pedidos.php';

$id = $_GET['id'];

$num = deletarPedido($id);

$msg = "Pedido foi removido";
header("Location: ../index.php?msg=".$msg);

