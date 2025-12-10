<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/config.php';

try {
    $stmt = $pdo->query("SELECT curso, COUNT(*) AS total FROM alunos GROUP BY curso ORDER BY total DESC");
    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
}
