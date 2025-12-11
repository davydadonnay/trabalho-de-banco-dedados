#Trabalho banco de dados  
Trabalho desenvolvido para a disciplina de Banco de Dados – EEEP Manoel Mano  
Professor: Adelison S. Aragão  
Data: 02/12/2025  

---

1. Introdução  
Este projeto consiste em um dashboard web desenvolvido em PHP com conexão a um banco de dados MySQL.  
O sistema permite inserir, consultar e visualizar informações armazenadas no banco dos alunos cadastrados, além de apresentar um insight da quantidade e informações sobre os alunos.

---

2. Tecnologias Utilizadas 
- PHP 8  
- HTML / CSS  
- MySQL  
- phpMyAdmin  
- Chart.js (para gráficos)  
- XAMPP / WAMP / LAMP  

---

3. Como executar o sistema  
1. Crie um banco de dados chamado "trabalho-banco-de-dados"
2. Coloque o SQL no PHPAdmin
3. Abre o arquivo "dashboard.php"
4. preencha o formulário
5. Volte para a página inicial que verá os dados na tela inicial

6. #Consultas no arquivo "seed.php"

7. <?php
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
<img width="576" height="889" alt="Screenshots_2025-12-11-18-57-01" src="https://github.com/user-attachments/assets/696eb269-ec6f-4e0e-b371-b21ab159e48d" />
<img width="576" height="898" alt="Screenshots_2025-12-11-18-57-14" src="https://github.com/user-attachments/assets/ff93dd16-0fbb-43d4-a664-f540cb7d8a5e" />
Imagens da tela inicial em um celular
<img width="547" height="1018" alt="Screenshots_2025-12-11-18-57-42" src="https://github.com/user-attachments/assets/f5676bc1-0f35-46d9-bdc9-5c02dce117c7" />
Imagem da tela de formulário em um celular
