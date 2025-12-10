<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';

try {
    $stmt = $pdo->query("SELECT * FROM alunos ORDER BY id DESC");
    $rows = $stmt->fetchAll();
    echo json_encode($rows);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
