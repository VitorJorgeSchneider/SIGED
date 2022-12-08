<?php 
include('protect.php');
include('conexao.php');
$mat = $_SESSION['matriculadoaluno'];
$maioridade_sql = "SELECT * FROM estagiario WHERE matricula = '$mat'";
$maioridade_query = $mysqli->query($maioridade_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$maioridade = $maioridade_query->fetch_assoc();
$estagiarioquant = $maioridade_query->num_rows;

$respon_sql = "SELECT * FROM responsavel WHERE matricula = '$mat'";
$respon_query = $mysqli->query($respon_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$quantrespon = $respon_query->num_rows;

$validacao_sql = "SELECT * FROM estagio WHERE codEstagiario = '$mat'";
$validacao_query = $mysqli->query($validacao_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$quantidade = $validacao_query->num_rows;

if($quantidade == 1 || $estagiarioquant == 1){
	if($maioridade['maioridade'] == '1' && $quantrespon == 0){
		header("Location: responsavel.php");
	}else{
		header("Location: selectEmpresa.php");	
	}
	
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styledoc.css">
	
	<title>Ficha de Confirmação</title>
</head>
<body>
	<main>
		<div class="estilo">
			<div class="tit">
				<br><br>
				<p><strong>FICHA DE CONFIRMAÇÃO <br>ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO</strong><br>Cursos técnicos e de graduação (bacharelados - tecnologias)

				<br>
				<br>
				<h4><strng>DADOS DO ESTUDANTE</strng></h4>
		</div>
		
		<br><br><br>
		<div class="texto1">
			<form action="validaestagiario.php" method="POST">
				<p>Curso: <br>
				<input type="radio" name="curso" value="Tecnico em Agropecuária" required>Tecnico em Agropecuária	</p><br>			
				<p>Campus:<br>
				<input type="radio" name="campus" value="Frederico Westphalen" required>Frederico Westphalen
				</p><br>
				<p>Ano:<br>
				<input type="number" name="ano" placeholder="Ex.: 2" required></p>	
				</p><br>
				<p>Semestre:<br>
				<input type="number" name="semestre" placeholder="Ex.: 4" required></p>
				<br>
				<hr>
				<p>Nascimento: <br>
				<input type="date" name="nascimento" required>
				</p><br>
				<hr>
				<p>Telefone:</p>
				<p>Informe o código de área.<br>
				<input type="text" name="telefone" placeholder="Ex.: (00) 0 0000-0000" required></p><br>
				<hr>
				<p>Endereço:</p>
				<p>Rua, Avenida ou outro logradouro e nome completo.<br>
				<input type="text" name="rua" placeholder="Ex.: Rua do Comércio" required></p>
				<br>
				<p>Número:</p>
				<p>Também informe complemento, se houver. <br> Exemplo: 350/Apartamento 301. Se não tem número, use s/n.<br>
				<input type="text" name="numero" placeholder="Ex.: 000 Apartamento 00." required>	
				</p>
				<br>
				<p>Bairro</p>
				<p>Ou localidade, linha, distrito. <br>
				<input type="text" name="bairro" placeholder="Ex.: Bairro Ipiranga" required></p><br>
				<p>Cidade:</p>
				<p>Informe o nome completo e com apenas as iniciais maiúsculas.
				<br>
				<input type="text" name="cidade" placeholder="Ex.: Frederico Westphalen" required></p><br>
				<p>Estado:<br>
				<select name="estado" required>
					<option value = "" disabled selected>ESCOLHA SEU ESTADO </option>
					<option value = "AC">AC  </option>
					<option value = "AL">AL  </option>
					<option value = "AM">AM  </option>
					<option value = "AP">AP  </option>
					<option value = "BA">BA  </option>
					<option value = "CE">CE  </option>
					<option value = "DF">DF  </option>
					<option value = "ES">ES  </option>
					<option value = "GO">GO  </option>
					<option value = "MA">MA  </option>
					<option value = "MG">MG  </option>
					<option value = "MS">MS  </option>
					<option value = "MT">MT  </option>
					<option value = "PA">PA  </option>
					<option value = "PB">PB  </option>
					<option value = "PE">PE  </option>
					<option value = "PI">PI  </option>
					<option value = "PR">PR  </option>
					<option value = "RJ">RJ  </option>
					<option value = "RN">RN  </option>
					<option value = "RO">RO  </option>
					<option value = "RR">RR  </option>
					<option value = "RS">RS  </option>
					<option value = "SC">SC  </option>
					<option value = "SE">SE  </option>
					<option value = "SP">SP  </option>
					<option value = "TO">TO  </option>	
				</select></p><br>
				<p>CEP: <br>
				<input type="text" name="cep" placeholder="Ex.: 98.400-000" required></p><br><hr>
				<p>Nacionalidade: <br>
				<input type="radio" name="nacionalidade" value="Brasileiro" required>Brasileiro<br>
				<input type="radio" name="nacionalidade" value="Estrangeiro, com documentação (CPF e RNE/CRNM) brasileira" required>Estrangeiro, com documentação (CPF e RNE/CRNM) brasileira
				</p><br><hr>
				<p>CPF: <br>
				<input type="text" name="cpf" placeholder="Ex.: 000.000.000-00" required>
				</p><br><hr>
				<p>RG: </p>
				<p>O número do RG está na carteira de identidade. No caso de estrangeiro, informar o número do RNE/CRNM.<br>
				<input type="text" name="rg" placeholder="Ex.: 0000000000" required>
				</p><br>
				<p>Órgão expedidor do RG:</p>
				<p>Olhe na sua carteira de identidade e informe a sigla do Órgão expedidor, por exemplo:<br>
				<br>
				Secretaria de Segurança Pública = SSP<br>
				Secretaria da Justiça e da Segurança = SJS<br>
				<input type="text" name="orgaoexp" placeholder="Ex.: SSP" required>
				</p><br>
				<p>Unidade da Federação do Órgão expedidor do RG:<br>
				Informe qual Unidade da Federação (UF) emitiu seu RG(identidade).<br>
				<select name="unidadefed" required>
					<option value = "" disabled selected>ESCOLHA SEU UF</option>
					<option value = "AC">AC  </option>
					<option value = "AL">AL  </option>
					<option value = "AM">AM  </option>
					<option value = "AP">AP  </option>
					<option value = "BA">BA  </option>
					<option value = "CE">CE  </option>
					<option value = "DF">DF  </option>
					<option value = "ES">ES  </option>
					<option value = "GO">GO  </option>
					<option value = "MA">MA  </option>
					<option value = "MG">MG  </option>
					<option value = "MS">MS  </option>
					<option value = "MT">MT  </option>
					<option value = "PA">PA  </option>
					<option value = "PB">PB  </option>
					<option value = "PE">PE  </option>
					<option value = "PI">PI  </option>
					<option value = "PR">PR  </option>
					<option value = "RJ">RJ  </option>
					<option value = "RN">RN  </option>
					<option value = "RO">RO  </option>
					<option value = "RR">RR  </option>
					<option value = "RS">RS  </option>
					<option value = "SC">SC  </option>
					<option value = "SE">SE  </option>
					<option value = "SP">SP  </option>
					<option value = "TO">TO  </option>	
				</select>
				</p><br>
				<p>Data de expedição do RG:<br>
					Data<br>
				<input type="date" name="dataexprg" required>
				</p><br><hr>
				<p>Você tem idade inferior a 18 anos?<br>
				<input type="radio" name="maioridade" value= 1 required>Sim<br>
				<input type="radio" name="maioridade" value= 0 required>Não
				</p><br>
				<hr>

				<br><br><br><br>
				<button type="submit">Salvar dados</button>
			</form>
		</div>
			<a href="introducao.php"> Voltar!</a>			
		</div>	
	</main>
</body>
</html>