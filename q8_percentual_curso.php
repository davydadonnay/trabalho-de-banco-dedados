<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';
try {
    $stmt = $pdo->query("SELECT curso, ROUND(100 * COUNT(*) / (SELECT COUNT(*) FROM alunos), 2) AS perc FROM alunos GROUP BY curso");
    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) { http_response_code(500); echo json_encode(['error'=>$e->getMessage()]); }
