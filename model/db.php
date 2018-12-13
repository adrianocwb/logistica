<?php

/**
 * Efetua a conexão com BD
 * @param type $id
 * @return \PDO
 */

function conectar()
{
    $user = "root";
    $senha = "elaborata";

    $dsn = 'mysql:host=localhost;dbname=logistica;port=3306';

    $pdo = new PDO($dsn, $user, $senha);
    return $pdo;
    
}