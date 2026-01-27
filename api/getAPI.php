<?php

try {
    $pdo = new PDO("mysql:dbname=datagouv;host=localhost;port=3306", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['region_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM departments WHERE region_code = :code ORDER BY name");
    $stmt->bindValue("code", $_GET['region_id'], PDO::PARAM_STR);
    $stmt->execute();
}

if (isset($_GET['departement_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM cities WHERE department_code = :code ORDER BY name");
    $stmt->bindValue("code", $_GET['departement_id'], PDO::PARAM_STR);
    $stmt->execute();
}


$result = $stmt->fetchAll();

header("Content-Type: application/json");
echo json_encode($result);
