<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';
try {
    $stmt = $pdo->query("SELECT HOUR(criado_em) AS hora, COUNT(*) AS total FROM alunos GROUP BY hora ORDER BY hora");
    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) { http_response_code(500); echo json_encode(['error'=>$e->getMessage()]); }
