<?php


$connection;
try {
    $connection = new PDO('mysql:host=localhost;dbname=psdb', 'root', 'root');
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
