<?php
// seed.php - popula 100 registros de exemplo (execute uma vez)
ini_set('display_errors',1); error_reporting(E_ALL);
require __DIR__ . '/config.php';

$names = ["Ana","Bruno","Carla","Daniel","Eduarda","Fábio","Gisele","Henrique","Isadora","João","Karina","Leandro","Mariana","Neto","Olivia","Paulo","Quésia","Rafael","Sofia","Tiago"];
$surnames = ["Silva","Souza","Oliveira","Pereira","Costa","Almeida","Cardoso","Gomes","Ribeiro","Martins","Rocha","Lima","Barbosa","Fernandes"];
$cursos = ["Desenvolvimento de Sistemas","Informática","Administração","Enfermagem"];
$tipos = ["Aluno","Responsavel","Outro"];
$ruas = ["Rua A","Rua B","Av. Central","Praça das Flores","Travessa do Sol","Alameda Verde"];
$bairros = ["Centro","Jardim","Bela Vista","Vila Nova","Monte Alegre","Boa Vista"];
$cep_template = ["60000-000","60100-000","60200-000","60300-000","60400-000"];

$pdo->beginTransaction();
try {
    $stmt = $pdo->prepare("INSERT INTO alunos (nome, data_nascimento, rua, numero, bairro, cep, responsavel, tipo, curso) VALUES (:nome,:data_nasc,:rua,:numero,:bairro,:cep,:responsavel,:tipo,:curso)");
    for ($i=0;$i<100;$i++) {
        $name = $names[array_rand($names)] . ' ' . $surnames[array_rand($surnames)];
        $year = rand(1980, 2015);
        $month = rand(1,12);
        $day = rand(1,28);
        $data_nasc = sprintf('%04d-%02d-%02d',$year,$month,$day);
        $rua = $ruas[array_rand($ruas)] . ' ' . rand(1,300);
        $numero = (string)rand(1,9999);
        $bairro = $bairros[array_rand($bairros)];
        $cep = $cep_template[array_rand($cep_template)];
        $responsavel = (rand(0,1) ? $names[array_rand($names)].' '.$surnames[array_rand($surnames)] : '');
        $tipo = $tipos[array_rand($tipos)];
        $curso = $cursos[array_rand($cursos)];

        $stmt->execute([
            ':nome'=>$name,
            ':data_nasc'=>$data_nasc,
            ':rua'=>$rua,
            ':numero'=>$numero,
            ':bairro'=>$bairro,
            ':cep'=>$cep,
            ':responsavel'=>$responsavel,
            ':tipo'=>$tipo,
            ':curso'=>$curso
        ]);
    }
    $pdo->commit();
    echo "Populados 100 registros com sucesso.";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Erro: ".$e->getMessage();
}
