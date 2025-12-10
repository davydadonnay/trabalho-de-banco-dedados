<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); echo json_encode(['status'=>'error','message'=>'Use POST']); exit;
}

$id = intval($_POST['id'] ?? 0);
if ($id <= 0) { http_response_code(400); echo json_encode(['status'=>'error','message'=>'ID inválido']); exit; }

try {
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
    $stmt->execute([':id'=>$id]);
    echo json_encode(['status'=>'ok']);
} catch (PDOException $e) {
    http_response_code(500); echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}
