<?php

try {
    $pdo = new PDO("mysql:dbname=datagouv;host=localhost;port=3306", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $stmt = $pdo->prepare("SELECT * FROM cities WHERE department_code = :code ORDER BY name");
    $stmt->bindValue("code", $_GET['departement_id'], PDO::PARAM_STR);
    $stmt->execute();

    $villes = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

echo json_encode($villes);
