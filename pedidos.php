<?php

$user = "root";
$servidor = "localhost";
$senha = "elaborata";
$banco = "logistica";

$dsn = 'mysql:localhost; dbname=logistica';
$pdo = new PDO($dsn, $user, $senha);

$sql = "SELECT * FROM `pedidos`";

$res = $pdo->query($sql);

var_dump($res);

$dados = $res->fetchAll(PDO::FETCH_ASSOC);

var_dump($dados);

