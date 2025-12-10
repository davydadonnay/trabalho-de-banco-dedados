<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';
try {
    $stmt = $pdo->query("SELECT bairro, COUNT(*) AS total FROM alunos GROUP BY bairro ORDER BY total DESC LIMIT 10");
    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) { http_response_code(500); echo json_encode(['error'=>$e->getMessage()]); }
