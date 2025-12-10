<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status'=>'error','message'=>'Use POST']);
    exit;
}

$nome          = trim($_POST['nome'] ?? '');
$dataNascimento = $_POST['dataNasc'] ?? '';
$rua           = trim($_POST['rua'] ?? '');
$numero        = trim($_POST['numero'] ?? '');
$bairro        = trim($_POST['bairro'] ?? '');
$cep           = trim($_POST['cep'] ?? '');
$responsavel   = trim($_POST['responsavel'] ?? '');
$tipo          = trim($_POST['tipo'] ?? '');
$curso         = trim($_POST['curso'] ?? '');

if ($nome === '' || $dataNascimento === '' || $rua === '' || $numero === '' || $bairro === '' || $cep === '' || $tipo === '' || $curso === '') {
    http_response_code(400);
    echo json_encode(['status'=>'error', 'message'=>'Preencha todos os campos obrigatórios.']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO alunos 
        (nome, data_nascimento, rua, numero, bairro, cep, responsavel, tipo, curso) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $nome,
        $dataNascimento,
        $rua,
        $numero,
        $bairro,
        $cep,
        $responsavel,
        $tipo,
        $curso
    ]);

    echo json_encode(['status'=>'ok','id'=>$pdo->lastInsertId()]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}
