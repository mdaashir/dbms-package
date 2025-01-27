<?php
try {
    $pdo = new PDO("pgsql:host=" . "localhost" . ";dbname=" . "dev", "postgres", "postgres");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "ALTER TABLE sample_menu ADD COLUMN deleted_at TIMESTAMP NULL DEFAULT NULL";
    $pdo->exec($sql);
    echo "Column deleted_at added successfully to sample_menu table.\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
