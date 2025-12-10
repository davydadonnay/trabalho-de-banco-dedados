<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); echo json_encode(['status'=>'error','message'=>'Use POST']); exit;
}

$data = $_POST;
$id = intval($data['id'] ?? 0);
if ($id <= 0) { http_response_code(400); echo json_encode(['status'=>'error','message'=>'ID inválido']); exit; }

$nome = trim($data['nome'] ?? '');
$dataNascimento = $data['dataNasc'] ?? '';
$rua = trim($data['rua'] ?? '');
$numero = trim($data['numero'] ?? '');
$bairro = trim($data['bairro'] ?? '');
$cep = trim($data['cep'] ?? '');
$responsavel = trim($data['responsavel'] ?? '');
$tipo = trim($data['tipo'] ?? '');
$curso = trim($data['curso'] ?? '');

if ($nome === '' || $dataNascimento === '' || $rua === '' || $numero === '' || $bairro === '' || $cep === '' || $tipo === '' || $curso === '') {
    http_response_code(400); echo json_encode(['status'=>'error','message'=>'Preencha todos os campos obrigatórios.']); exit;
}

try {
    $stmt = $pdo->prepare("UPDATE alunos SET nome=:nome, data_nascimento=:data_nasc, rua=:rua, numero=:numero, bairro=:bairro, cep=:cep, responsavel=:responsavel, tipo=:tipo, curso=:curso WHERE id = :id");
    $stmt->execute([
        ':nome'=>$nome, ':data_nasc'=>$dataNascimento, ':rua'=>$rua, ':numero'=>$numero,
        ':bairro'=>$bairro, ':cep'=>$cep, ':responsavel'=>$responsavel, ':tipo'=>$tipo,
        ':curso'=>$curso, ':id'=>$id
    ]);
    echo json_encode(['status'=>'ok']);
} catch (PDOException $e) {
    http_response_code(500); echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}
