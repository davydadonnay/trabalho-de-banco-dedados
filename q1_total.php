<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/config.php';

try {
    $stmt = $pdo->query("SELECT COUNT(*) AS total_alunos FROM alunos");
    echo json_encode($stmt->fetch());
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
}
