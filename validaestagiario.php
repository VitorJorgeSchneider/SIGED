<?php
include('conexao.php');
include('protect.php');
$mat = $_SESSION['matriculadoaluno'];
$sql_code = "SELECT * FROM alunos WHERE matricula = $mat";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$usuario = $sql_query->fetch_assoc();

$nome = $usuario['nome'];
$curso = $_POST['curso'];
$campus = $_POST['campus'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];
$email = $usuario['email'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];
$numero = $_POST['numero'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$nacionalidade = $_POST['nacionalidade'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$orgaoexp = $_POST['orgaoexp'];
$unidadefed = $_POST['unidadefed'];
$dataexprg = $_POST['dataexprg'];
$maioridade = $_POST['maioridade'];



$estag = mysqli_query($mysqli, "INSERT INTO estagiario(matricula, nome, curso, campus, nascimento, telefone, email, ano, semestre, numero, rua, bairro, cidade, estado, cep, nacionalidade, cpf, rg, orgaoexp, unidadefed, dataexprg, maioridade) VALUES ('$mat', '$nome','$curso', '$campus', '$nascimento', '$telefone', '$email', '$ano', '$semestre', '$numero', '$rua', '$bairro', '$cidade', '$estado', '$cep', '$nacionalidade', '$cpf', '$rg', '$orgaoexp', '$unidadefed', '$dataexprg', '$maioridade')");
$fixa =  mysqli_query($mysqli, "INSERT INTO estagio(codEstagiario) VALUES ('$mat')");
if($maioridade == 1){
	header("Location: responsavel.php");
}else{
	header("Location: selectEmpresa.php");
}

?>