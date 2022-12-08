<?php 
include('protect.php');
include('conexao.php');

$nome = $_SESSION['nomealuno'];
$matricula = $_SESSION['matriculadoaluno'];

$sql_code = "SELECT * FROM orientador WHERE matriculaaluno = '$matricula'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$orientacao = $sql_query->fetch_assoc();

$professor = $orientacao['idprofessor'];

$sql_code_prof = "SELECT * FROM professores WHERE id = '$professor'";
$sql_query_prof = $mysqli->query($sql_code_prof) or die("Falha na execução do código SQL: " . $mysqli->error);
$prof = $sql_query_prof->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styledoc.css">
	
	<title>Carta de Apresentação</title>
</head>
<body id="body">
	<main id='conteudo'>
		<div class="estilo">
		<img src="img/simbolo.png">
		<div class="tit">
			<p><strong>SERVIÇO PÚBLICO FEDERAL<br>MINISTÉRIO DA EDUCAÇÃO<br></strong>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA FARROUPILHA<br> <em>campus </em>Frederico Westphalen</p>
			<br>
			<br>
			<h4><strng>Carta de apresentação de estudante e solicitação de vaga para Estágio obrigatório
		</strng></h4>
		</div>
		
		<br><br><br>
		<div class="texto">
			<p>Ilustrícimo(a) Senhor(a)</p>
			<br><br><br>
			<p>Ao cumprimentar Vossa Senhoria, vimos apresentar o(a) estudante <?php echo $nome; ?>, regularmente matriculado(a) no curso Técnico em Agropecuária Integrado ao Ensino Médio, do Instituto Federal Farroupilha - Campus Frederico Westphalen.</p>
			<p>O(A) referido(a) estudante solicita a possibilidade de vaga para realização de <strong>Estágio obrigatório</strong>, cuja duração mínima deverá ser de 180 horas.</p>
			<p>Aproveitamos para contextualizar que os alunos que estão em busca de estágio são aqueles que já concluíram o segundo ano, mas falta todo o terceiro ano, ou seja, várias disciplinas técnicas ainda não foram cursadas e, dessa forma, conteúdos importantes ainda não foram vistos por eles, como, por exemplo, aqueles relacionados à: bovinocultura de corte e leite; extensão rural; cultivos anuais de inverno e verão; fruticultura e silvicultura; construções rurais; topografia e irrigação; gestão, economia e projetos; e, tecnologia em alimentos. Nesse sentido, contamos com a compreensão e a importante colaboração neste período de vivência, aprendizagem, experimentação e contato dos estudantes com a realidade. Tal atividade tem proporcionado um grande impacto na jornada de aprendizagem e leitura da realidade dos nossos alunos.</p>
			<p>Certos de contar com Vossa colaboração, agradecemos a atenção e aguardamos manifestação através da <strong>Ficha de confirmação de Estágio</strong> obrigatório.</p>
			<p>Para maiores informações, estamos à disposição na Linha Sete de Setembro, Interior, Caixa postal 169, CEP 98.400-000, Frederico Westphalen/RS, pelo telefone (55) 3744-8989 ou e-mail estagios.fw@iffarroupilha.edu.br. </p>
			<br>
			<p>Atenciosamente,</p>
			<br><br><br>
			
		</div>
		<div class="assin_box">
			<?php 
			if($orientacao['assinatura'] == NULL){
				?><hr>	
				<p>Coordenador de Extensão</p><?php
			}else{
				$data_ass = strtotime($orientacao['assinatura']);
				$data_assinada = date("d/m/Y h:i:s", $data_ass);
				echo 'Assinado digitalmente por ' .$prof['nome'];?><br>
				<?php echo ' Data: ' .$data_assinada;?>
				
				<hr>	
				<p>Coordenador de Extensão</p><?php
			}	?>
			
		</div>
		<div id="noprint">
			<button onclick="printPagina();return false">Imprimir</button>			
		</div>
		</div>	
	</main>
	
		
	
<script type="text/javascript">
	function printPagina(){
		var body = document.getElementById('body').innerHTML;
		var conteudo = document.getElementById('conteudo').innerHTML;
		document.getElementById('body').innerHTML = conteudo;
		window.print();
		document.getElementById('body').innerHTML = body;
	}
</script>	
</body>
</html>