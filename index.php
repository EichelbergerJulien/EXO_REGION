<?php

try {
    $pdo = new PDO("mysql:dbname=datagouv;host=localhost;port=3306", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $query = $pdo->query("SELECT * FROM regions");
    $regions = $query->fetchAll();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="app.js" defer></script>
    <title>Document</title>
</head>

<body class="container">

    <h2>Votre région</h2>
    <select name="region" id="region" class="form-select">
        <option value="#">Choississez votre région</option>
        <?php foreach ($regions as $region) : ?>
            <option value="<?= $region['code'] ?>"><?= $region['name'] ?> </option>
        <?php endforeach ?>
    </select>

    <h2>Votre Département</h2>
    <select name="departement" id="departement" class="form-select">
        <!-- Les options seront ajoutées dynamiquenent -->
    </select>

    <h2>Votre ville</h2>
    <select name="ville" id="ville" class="form-select">
        <!-- Les options seront ajoutées dynamiquenent -->
    </select>


</body>

</html>