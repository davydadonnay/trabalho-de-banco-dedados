<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/config.php';

try {
    $sql = "SELECT DATE_FORMAT(criado_em,'%Y-%m') AS ym, COUNT(*) AS total
            FROM alunos
            WHERE criado_em >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
            GROUP BY ym ORDER BY ym";
    
    echo json_encode($pdo->query($sql)->fetchAll());
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
}
