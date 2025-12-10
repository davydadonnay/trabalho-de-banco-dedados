<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/config.php';

try {
    $sql = "SELECT
                CASE
                    WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) <= 17 THEN '0-17'
                    WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 18 AND 25 THEN '18-25'
                    WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 26 AND 40 THEN '26-40'
                    ELSE '41+' END AS faixa,
                COUNT(*) AS total
            FROM alunos
            GROUP BY faixa";
    
    echo json_encode($pdo->query($sql)->fetchAll());
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
}
