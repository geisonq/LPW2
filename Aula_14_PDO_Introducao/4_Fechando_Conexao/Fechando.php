<?php


$connection;
try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=psdb', 'root', 'root');
    $connection->beginTransaction();
    // comandos
    $connection->commit();
} catch (PDOException $exc) {
    if ((isset($connection)) && ($connection->inTransaction())) {
        $connection->rollBack();
    }
    print $exc->getMessage();
} finally {
     if (isset($connection)) {
        unset($connection);
    }
}
