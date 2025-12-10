<?php
// config.php - ajuste as credenciais conforme seu ambiente
// NÃO comite credenciais reais no GitHub em produção.

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$DB_HOST = '127.0.0.1';
$DB_NAME = 'trabalho-banco-de-dados';
$DB_USER = 'root';
$DB_PASS = ''; // coloque a senha do seu MySQL se houver

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Falha na conexão com o banco: ' . $e->getMessage()]);
    exit;
}

