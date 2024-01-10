<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'bpims_db'
], 'root', '');

try {
    $db->connection->beginTransaction();
    // $db->connection->query("INSERT INTO tbl_users VALUES()");
    $key = "Juan";
    $query = "SELECT * FROM tbl_users WHERE user_first_name=:firstname";
    $stmt = $db->connection->prepare($query);
    $stmt->bindValue('firstname', $key, PDO::PARAM_STR);
    $stmt->execute();

    var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
    $db->connection->commit();
} catch (Exception $error) {
    if ($db->connection->inTransaction()) {
        $db->connection->rollBack();
    }
    echo "Transaction failed!";
}
