<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) { http_response_code(400); echo json_encode(['error'=>'ID inválido']); exit; }

try {
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    if (!$row) { http_response_code(404); echo json_encode(['error'=>'Registro não encontrado']); }
    else echo json_encode($row);
} catch (PDOException $e) {
    http_response_code(500); echo json_encode(['error'=>$e->getMessage()]);
}
