<?php
require __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');

try {
    $sql = $pdo->query("SELECT * FROM alunos ORDER BY id DESC");
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
