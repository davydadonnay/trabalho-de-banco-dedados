<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';
try {
    $stmt = $pdo->query("SELECT COUNT(*) AS ultimos_7_dias FROM alunos WHERE criado_em >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
    echo json_encode($stmt->fetch());
} catch (PDOException $e) { http_response_code(500); echo json_encode(['error'=>$e->getMessage()]); }
