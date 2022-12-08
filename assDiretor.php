<?php
include('conexao.php');
	$al = $_GET['aluno'];
	$a_sql = "SELECT * FROM estagio";
	$a_query = $mysqli->query($a_sql);
	while ($a = mysqli_fetch_assoc($a_query)) {
		if(password_verify($a['codEstagiario'], "$al")){
			$matricula = $a['codEstagiario'];
		}
		
	}$i = 0;


$estagiario_sql = "SELECT * FROM estagiario WHERE matricula = '$matricula'";
$estagiario_query = $mysqli->query($estagiario_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagiario = $estagiario_query->fetch_assoc();


$estagio_sql = "SELECT * FROM estagio WHERE codEstagiario = '$matricula'";
$estagio_query = $mysqli->query($estagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagio = $estagio_query->fetch_assoc();
if($estagio['assinaturaDiretor'] != NULL){
	header("Location: assinado.php");
} 

$data_s = strtotime($estagio['datasub']);
$data_sub_dia = date("d", $data_s);
$data_sub_mes = date("m", $data_s);
$data_sub_mes_escrito = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
$mes = $data_sub_mes_escrito[$data_sub_mes - 1];
$data_sub_ano = date("Y", $data_s);


$data_na = strtotime($estagiario['nascimento']);
$data_nasc = date("d/m/Y", $data_na);
$data_ex = strtotime($estagiario['dataexprg']);
$data_exp = date("d/m/Y", $data_ex);

$codempresa = $estagio['codEmpresa'];
$codrepresentante = $estagio['codRepresentante'];
$codondeestagio = $estagio['codOndeEstagio'];
$codsupervisor = $estagio['codSupervisor'];
$codorientador = $estagio['codOrientador'];
$codcoorientador = $estagio['codCoorientador'];

$empresa_sql = "SELECT * FROM empresa WHERE codEmpresa = '$codempresa'";
$empresa_query = $mysqli->query($empresa_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$empresa = $empresa_query->fetch_assoc();

$representante_sql = "SELECT * FROM representante WHERE codRepresentante  = '$codrepresentante'";
$representante_query = $mysqli->query($representante_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$representante = $representante_query->fetch_assoc();

$ondeestagio_sql = "SELECT * FROM ondeestagio WHERE codLocal  = '$codondeestagio'";
$ondeestagio_query = $mysqli->query($ondeestagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$ondeestagio = $ondeestagio_query->fetch_assoc();

$dadosestagio_sql = "SELECT * FROM dadosestagio WHERE matricula = '$matricula'";
$dadosestagio_query = $mysqli->query($dadosestagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$dadosestagio = $dadosestagio_query->fetch_assoc();

$orientador_sql = "SELECT * FROM professores WHERE id  = '$codorientador'";
$orientador_query = $mysqli->query($orientador_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$orientador = $orientador_query->fetch_assoc();

$coorientador_sql = "SELECT * FROM professores WHERE id  = '$codcoorientador'";
$coorientador_query = $mysqli->query($coorientador_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$coorientador = $coorientador_query->fetch_assoc();

$supervisor_sql = "SELECT * FROM supervisor WHERE codSupervisor  = '$codsupervisor'";
$supervisor_query = $mysqli->query($supervisor_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$supervisor = $supervisor_query->fetch_assoc();

$responsavel_sql = "SELECT * FROM responsavel WHERE matricula = '$matricula'";
$responsavel_query = $mysqli->query($responsavel_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$responsavel = $responsavel_query->fetch_assoc();

$data_i = strtotime($dadosestagio['inicio']);
$data_inic = date("d/m/Y", $data_i);


$data_f = strtotime($dadosestagio['fim']);
$data_fim = date("d/m/Y", $data_f);



$iff_sql = "SELECT * FROM assinantes WHERE cargo = 'Entidade educacional'";
$iff_query = $mysqli->query($iff_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$iff = $iff_query->fetch_assoc();

$extensao_sql = "SELECT * FROM assinantes WHERE cargo = 'Coordenador de extensão'";
$extensao_query = $mysqli->query($extensao_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$extensao = $extensao_query->fetch_assoc();

$curso_sql = "SELECT * FROM assinantes WHERE cargo = 'Coordenador de extensão'";
$curso_query = $mysqli->query($curso_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$Cordcurso = $curso_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styledoc.css">
	
	<title>TERMO DE COMPROMISSO & PLANO DE ATIVIDADES</title>
</head>
<body id="body">
	<main id="conteudo">
		<div class="estilo">
			<br><p><strong>TERMO DE COMPROMISSO<br>
				ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO<br></strong>
			<br><br>
			<br><br>
			<div class="texto2">	
				<div class="box">
					<div class="box0">
						<p><strong>I – ESTAGIÁRIO</strong></p>
					</div>
				</div>
				<div class="box">	
					<div class="box0">
						<p>Nome: <?php echo $estagiario['nome']; ?></p>
					</div>
				</div>
				<div class="box">	
					<div class="box1">
						<p>E-mail: <?php echo $estagiario['email']; ?></p>
					</div>
					<div class="box2">
						<p>Telefone: <?php echo $estagiario['telefone']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Curso: <?php echo $estagiario['curso']; ?></p>
					</div>	
				</div>
				<div class="box">	
					<div class="box1">
						<p>Ano / semestre: <?php echo $estagiario['ano'] .'º Ano, '. $estagiario['semestre'] .'º Semestre'; ?></p>
					</div>
					<div class="box2">
						<p>Matrícula nº: <?php echo $estagiario['matricula']; ?></p>
					</div>
				</div>
				<div class="box">	
					<div class="box1">
						<p>CPF nº: <?php echo $estagiario['cpf']; ?></p>
					</div>
					<div class="box2">
						<p>Nascimento: <?php echo $data_nasc; ?></p>
					</div>
				</div>
				<div class="box">	
					<div class="box3">
						<p>RG nº: <?php echo $estagiario['rg']; ?></p>
					</div>
					<div class="box4">
						<p>Órgão Expedidor: <?php echo $estagiario['orgaoexp']; ?></p>
					</div>
					<div class="box5">
						<p>Data de Expedição: <?php echo $data_exp; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Endereço: <?php echo $estagiario['rua'] .' Nº: '. $estagiario['numero'] .' Bairro: '. $estagiario['bairro']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box1">
						<p>Município/UF: <?php echo $estagiario['cidade'] . '/'. $estagiario['estado']; ?></p>
					</div>
					<div class="box2">
						<p>CEP: <?php echo $estagiario['cep']; ?></p>
					</div>
				</div>
				<br><br><br>
				<div class="box">
					<div class="box0">
						<p><strong>II – ENTIDADE EDUCACIONAL</strong> - Instituto Federal Farroupilha</p>
					</div>
				</div>
				<div class="box">
					<div class="box1">
						<p><em>Campus:</em> Frederico Westphalen</p>
					</div>
					<div class="box2">
						<p>CNPJ: 10.662072/0011-20</p>
					</div>
				</div>	
				<div class="box">
					<div class="box0">
						<p>Telefone: (55) 3744-8900</p>	
					</div>
				</div>	
				<div class="box">
					<div class="box0">
						<p>Endereço: Linha 7 de Setembro, BR 386 - KM 40 s/n</p>
					</div>
				</div>
				<div class="box">
					<div class="box1">
						<p>Município/UF: Frederico Westphalen / RS</p>
					</div>
					<div class="box2">
						<p>CEP: 98400-000</p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Representante legal/Cargo: <?php echo $iff['nome']; ?></p>
					</div>
				</div>
				<br><br><br>
				<div class="box">
					<div class="box0">
						<p><strong>III – PARTE CONCEDENTE</strong></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Nome: <?php echo $empresa['nome']; ?></p>
					</div>
				</div>	
				<div class="box">
					<div class="box1">
						<p>E-mail: <?php echo $representante['email']; ?></p>	
					</div>
					<div class="box2">
						<p>Telefone: <?php echo $representante['telefone']; ?></p>
					</div>
				</div>	
				<div class="box">
					<div class="box0">
						<p>CNPJ: <?php echo $empresa['CNPJ']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Área de atuação: <?php echo $empresa['area']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Definição da área do estágio: <?php echo $ondeestagio['setor']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Endereço: <?php echo $ondeestagio['rua'] .' Nº: '. $ondeestagio['numero'] .' Bairro: '. $ondeestagio['bairro']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box1">
						<p>Município/UF: <?php echo $ondeestagio['cidade'] .'/'. $ondeestagio['estado']; ?></p>
					</div>
					<div class="box2">
						<p>CEP: <?php echo $ondeestagio['cep']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Representante legal/Cargo: <?php echo $representante['cargo']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>CPF do Representante legal: <?php echo $representante['cpf']; ?></p>
					</div>
				</div>
				<br><br><br><br>

				<p>As partes mencionadas celebram entre si este <strong>TERMO DE COMPROMISSO DE ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO,</strong> convencionado às cláusulas e condições seguintes:</p><br>
				<p><strong>CLÁUSULA PRIMEIRA</strong> – Este instrumento tem por objetivo estabelecer as condições para realização do Estágio Curricular Supervisionado e particularizar a relação jurídica especial existente entre o <strong>ESTAGIÁRIO</strong>, a <strong>PARTE CONCEDENTE</strong> e a <strong>ENTIDADE EDUCACIONAL</strong>.</p><br>
				<p><strong>CLÁUSULA SEGUNDA</strong> – O Estágio Curricular Supervisionado, definido no Projeto Pedagógico do Curso, nos termos de <a href="#">Lei n° 11.788/08</a> e da <a href="#">Lei nº 9.394/96</a> (Diretrizes e Bases da Educação Nacional), entendido como ato educativo supervisionado, visa à complementação do ensino e da aprendizagem proporcionando preparação para o trabalho profissional do <strong>ESTAGIÁRIO</strong>, possibilitando-lhe aperfeiçoamento técnico-cultural, científico e de relacionamento humano, bem como condições de vivenciar e adquirir experiência prática em situações reais de trabalho em sua área de atuação.</p><br>
				<p><strong>CLÁUSULA TERCEIRA</strong> – O estágio terá duração mínima de <?php echo $dadosestagio['hrtotal']; ?> horas (<?php echo $dadosestagio['hrtotalescrito']; ?>) com previsão de início em <?php echo $data_inic; ?> e término em <?php echo $data_fim; ?>, com uma atividade de <?php echo $dadosestagio['hrdia']; ?> (<?php echo $dadosestagio['hrdiaescrito']; ?>) horas diárias, totalizando <?php echo $dadosestagio['hrsemana']; ?> (<?php echo $dadosestagio['hrsemanaescrito']; ?>) horas semanais, sendo compatível com as atividades escolares e de acordo com o Art. 10, da <a href="#">Lei nº 11.788/08</a>.<br>	
				<strong>§1°</strong> Este Termo de Compromisso de Estágio Curricular Supervisionado pode ser prorrogado a critério das partes, através de Termos Aditivos, desde que não ultrapasse 02 (dois) anos, conforme previsto no Regulamento de Estágios do Instituto Federal Farroupilha. <br>
				<strong>§2°</strong> O Plano de Atividades, os Relatórios de Atividades da Parte Concedente e as Avaliações serão anexados ao Termo de Compromisso de Estágio Curricular Supervisionado, sendo parte integrante e indissociável deste.<br>
				<strong>§3°</strong> As atividades principais poderão ser ampliadas, reduzidas, alteradas ou substituídas, de acordo com a progressividade do Estágio e do Currículo, desde que de comum acordo entre os partícipes.<br> 
				<strong>§4°</strong> A concessão dos descansos durante a jornada do estágio deverá respeitar um intervalo mínimo de 1 (uma) hora, para jornadas de 8 (oito) horas diárias, suficiente à preservação da higidez física e mental do <strong>ESTAGIÁRIO</strong> e aos padrões de horário de alimentação (lanches, almoço e jantar).<br>
				<strong>§5°</strong> Será concedido 30 (trinta) dias de recesso ao <strong>ESTAGIÁRIO</strong> quando esse completar 1 (um) ano de estágio ou número de dias de recesso proporcionais ao período cumprido, o qual deverá ser gozado, preferencialmente, durante as férias escolares.<br> 
				<strong>§6°</strong> Nos períodos de avaliação final, a carga horária do estágio deverá ser reduzida pelo menos à metade, para garantir o bom desempenho do estudante, nos termos da <a href="#">Lei de Estágios</a>.<br>
				<strong>§7º</strong> Aplica-se ao <strong>ESTAGIÁRIO</strong> a legislação relacionada à saúde e segurança no trabalho, sendo sua implementação de responsabilidade da <strong>PARTE CONCEDENTE</strong>.</p><br><br> 

				<p><strong>CLÁUSULA QUARTA</strong> – O <strong>ESTAGIÁRIO</strong> desenvolverá suas atividades obrigando-se a:</p>
				<ul>
					<li>Cumprir com empenho e interesse a programação estabelecida no Plano de Atividades;</li>
					<li>Cumprir as condições fixadas para o Estágio observando as normas de trabalho vigentes na <strong>PARTE CONCEDENTE</strong>, preservando o sigilo e a confidencialidade sobre as informações que tenha acesso;</li>
					<li>Observar a jornada e o horário ajustados para o Estágio;</li>
					<li>Apresentar documentos comprobatórios da regularidade da sua situação escolar, sempre que solicitado pela <strong>PARTE CONCEDENTE</strong>;</li>
					<li>Manter rigorosamente atualizados seus dados cadastrais escolares, junto à <strong>PARTE CONCEDENTE</strong>;</li>
					<li>Informar de imediato, qualquer alteração na sua situação escolar, tais como: trancamento de matrícula, abandono, conclusão de curso ou transferência de Instituição de Ensino;</li>
					<li>Vistar os relatórios de atividades elaborados pela <strong>PARTE CONCEDENTE</strong> com periodicidade compatível com o período do estágio e, inclusive, sempre que solicitado;</li>
					<li>Responder pelas perdas e danos eventualmente causados por inobservância das normas internas da <strong>PARTE CONCEDENTE</strong>, ou provocados por negligência ou imprudência.</li>
				</ul><br><br>
				<p><strong>CLÁUSULA QUINTA</strong> – Cabe à <strong>PARTE CONCEDENTE</strong>:</p> 
				<ul>
					<li>Celebrar o Termo de Compromisso de Estágio Curricular Supervisionado com o <strong>ESTAGIÁRIO</strong> e a <strong>ENTIDADE EDUCACIONAL</strong>, zelando pelo seu fiel cumprimento;</li>
					<li>Conceder o Estágio e proporcionar ao <strong>ESTAGIÁRIO</strong>, condições propícias para o exercício das atividades práticas compatíveis com o seu Plano de Atividades;</li>
					<li>Designar um supervisor de estágio, com qualificação compatível, de seu quadro de pessoal, para orientar, acompanhar e avaliar o desempenho do <strong>ESTAGIÁRIO</strong>;</li>
					<li>Solicitar ao <strong>ESTAGIÁRIO</strong>, a qualquer tempo, documentos comprobatórios da regularidade da situação escolar, uma vez que trancamento de matrícula, abandono, conclusão de curso ou transferência de Entidade Educacional constituem motivos de imediata rescisão;</li>
					<li>Elaborar e encaminhar para a <strong>ENTIDADE EDUCACIONAL</strong> o Relatório de Atividades, assinado pelo supervisor, com periodicidade compatível com o período do estágio, com vista obrigatória do <strong>ESTAGIÁRIO</strong>;</li>
					<li>Entregar, por ocasião do término do Estágio, o Termo de Realização de Estágio, com indicação resumida das atividades desenvolvidas, do período de estágio e da avaliação de desempenho do aluno;</li>
					<li>Manter em arquivo e à disposição da fiscalização os documentos que comprovem a relação de Estágio;</li>
					<li>Permitir, condicionalmente, o início das atividades de Estágio somente após o recebimento deste Termo de Compromisso assinado pelos partícipes.</li>
				</ul><br><br>
				<p><strong>CLÁUSULA SEXTA</strong> – Cabe à <strong>ENTIDADE EDUCACIONAL</strong>:</p>
				<ul>
					<li>Indicar, no Plano de Atividades, as condições de adequação do estágio ao Projeto Pedagógico do Curso, à etapa e modalidade da formação escolar, ao horário e calendário escolar;</li>
					<li>Avaliar as instalações da <strong>PARTE CONCEDENTE</strong> do Estágio e sua adequação à formação cultural e profissional do aluno;</li>
					<li>Indicar um Professor Orientador como responsável pelo acompanhamento e avaliação das atividades do <strong>ESTAGIÁRIO</strong>;</li>
					<li>Solicitar da <strong>PARTE CONCEDENTE</strong> o Relatório de Atividades desenvolvidas pelo aluno, com a ciência do mesmo, em periodicidade mínima de 6 (seis) meses;</li>
					<li>Zelar pelo cumprimento do Termo de Compromisso de Estágio Curricular Supervisionado e reorientar o <strong>ESTAGIÁRIO</strong> para outro local em caso de descumprimento de suas normas;</li>
					<li>Avaliar a realização do Estágio do aluno por meio de instrumentos de avaliação conforme Regulamento de Estágio adotado pela Instituição.</li>
				</ul><br><br>
				<p><strong>CLÁUSULA SÉTIMA</strong> – Na vigência do presente Termo de Compromisso de Estágio Curricular Supervisionado, o <strong>ESTAGIÁRIO</strong> estará incluído na cobertura do seguro contra acidentes pessoais, contratado pela <strong>ENTIDADE EDUCACIONAL</strong>, Apólice n°  02.0982.52687 Sub 3, da MBM Seguradora S/A.</p><br>
				<p><strong>CLÁUSULA OITAVA</strong> – O término do Estágio ocorrerá nos seguintes casos:</p>
				<ul>	
					<li>Automaticamente, ao término do período previsto para sua realização;</li>
					<li>Desistência do Estágio ou rescisão do Termo de Compromisso de Estágio Curricular Supervisionado, por decisão voluntária de qualquer dos partícipes, mediante comunicação por escrito;</li>
					<li>Pelo trancamento da matrícula, abandono, desligamento ou conclusão do curso na <strong>ENTIDADE EDUCACIONAL</strong>;</li>
					<li>Pelo descumprimento das condições do presente Termo de Compromisso de Estágio Curricular Supervisionado.</li> 
				</ul><br><br>
				<p><strong>CLÁUSULA NONA</strong> – Na modalidade de Estágio Obrigatório, a concessão de bolsa, auxílio-transporte, bem como auxílio-alimentação ou outra forma de contraprestação, a critério da <strong>PARTE CONCEDENTE</strong>, é facultativa. No caso de Estágio Não-Obrigatório, a concessão de bolsa e de auxílio-transporte é compulsória.<br>
				<strong>§1º</strong> Nesse <strong>Estágio obrigatório</strong>, o valor da bolsa e do auxílio-transporte diário serão, respectivamente, de R$ <?php echo $dadosestagio['valorbolsa']; ?> (<?php echo $dadosestagio['valorbolsaescrito']; ?>) e R$ <?php echo $dadosestagio['valoraux']; ?> (<?php echo $dadosestagio['valorauxescrito']; ?>).<br>
				<strong>§2º</strong> A eventual concessão de benefícios relacionados à alimentação, saúde ou outros não caracterizará vínculo empregatício.<br><br>
				<strong>CLÁUSULA DÉCIMA</strong> – O Estágio não cria vínculo empregatício de qualquer natureza, desde que observados as disposições da <a href="#">Lei nº 11.788/08</a> e do presente Termo de Compromisso de Estágio Curricular Supervisionado.<br><br>
				<strong>CLÁUSULA DÉCIMA PRIMEIRA</strong> – A rescisão do presente Termo de Compromisso de Estágio Curricular Supervisionado poderá ser feita a qualquer tempo, unilateralmente, mediante comunicação por escrito.<br><br>
				<strong>CLÁUSULA DÉCIMA SEGUNDA</strong> – Fica eleito o Foro da Justiça Federal de Santa Maria, RS, com renúncia de qualquer outro, por mais privilegiado que seja para dirimir quaisquer dúvidas ou controvérsias em decorrência do presente Termo de Compromisso de Estágio Curricular Supervisionado que não puderem ser decididas diretamente pelos partícipes.</p><br>
				<p>E assim, justos e acordados, assinam este instrumento em três vias de igual teor e forma.</p><br><br><br>
				<div class="data">
					<p>Frederico Westphalen/RS, <?php echo $data_sub_dia; ?> de <?php echo $mes; ?> de <?php echo $data_sub_ano; ?>.</p>
				
				</div><br><br>
				<div class="boxassin">
					<div class="boxass0">
						<?php
						$data_ass_estagiario = strtotime($estagio['assinaturaEstagiario']);
						$data_assinada_estagiario = date("d/m/Y h:i:s", $data_ass_estagiario);
						echo 'Assinado digitalmente por ' .$estagiario['nome'];?><br>
						<?php echo ' Data: ' .$data_assinada_estagiario;?> 
						<hr>	
						<p>Estagiário</p>										
					</div>
					<div class="boxass1">
						<form action ="AssinarDiretor.php" method="POST">
							<button type="submit" name= "ass" value= <?php echo $matricula; ?>>Assinar!</button>
						
						</form>
							<hr>
							<p>Entidade Educacional</p>
					</div>
					<div class="boxass2">
						<?php if ($estagio['assinaturaRepresentante'] == NULL) {
							?><hr>
							<p>Parte Concedente</p><?php
						}else{
							$data_ass_cons = strtotime($estagio['assinaturaRepresentante']);
							$data_assinada_cons = date("d/m/Y h:i:s", $data_ass_cons);
							echo 'Assinado digitalmente por ' .$representante['nome'];?><br>
							<?php echo ' Data: ' .$data_assinada_cons; ?>
							<hr>
							<p>Parte Concedente</p><?php
						}  ?>
					</div>
				</div><br>
				<div class="box">
					<div class="box0">
						<p></p>
					</div>
				</div>
				<br>
				<div class="boxassinresp">
					<div class="boxassinhr">
						<?php if($estagio['assinaturaResponsavel'] == NULL){
							?><hr><?php
						}else{
							$data_ass_resp = strtotime($estagio['assinaturaResponsavel']);
							$data_assinada_resp = date("d/m/Y h:i:s", $data_ass_resp);
							echo 'Assinado digitalmente por ' .$responsavel['nome'];?><br>
							<?php echo ' Data: ' .$data_assinada_resp; ?>
							<hr><?php
						}?>
							
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Responsável Legal(para estagiário menor de 18 anos):</p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Nome: <?php echo $responsavel['nome']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>CPF: <?php echo $responsavel['cpf']; ?></p>
					</div>
				</div>
				<div class="box">
					<div class="box0">
						<p>Grau de parentesco: <?php echo $responsavel['grau']; ?></p>
					</div>
				</div>
				<p><em>Observação IFFar: Este documento possui assinatura digital, conforme orientações da legislação federal vigente.</em></p>
			</div>
			<br><br>
			<br><p><strong>PLANO DE ATIVIDADES<br>
				ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO<br></strong>
			<br><br>
			<br><br>
			<div class="texto2">
				<div class="boxb">
					<div class="box">
						<div class="box0">
							<p><strong>1 IDENTIFICAÇÃO DO ESTAGIÁRIO</strong></p>
						</div>
					</div>
					<div class="box">	
						<div class="box0">
							<p>Nome: <?php echo $estagiario['nome']; ?></p>
						</div>
					</div>
					<div class="box">	
						<div class="box1">
							<p>E-mail: <?php echo $estagiario['email']; ?></p>
						</div>
						<div class="box2">
							<p>Telefone: <?php echo $estagiario['telefone']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Curso: <?php echo $estagiario['curso']; ?></p>
						</div>	
					</div>
					<div class="box">
						<div class="box1">
							<p>CPF nº: <?php echo $estagiario['cpf']; ?></p>
						</div>
						<div class="box2">
							<p>RG nº: <?php echo $estagiario['rg']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Endereço: <?php echo $estagiario['rua'] .' Nº: '. $estagiario['numero'] .' Bairro: '. $estagiario['bairro']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>Município/UF: <?php echo $estagiario['cidade'] . '/'. $estagiario['estado']; ?></p>
						</div>
						<div class="box2">
							<p>CEP: <?php echo $estagiario['cep']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Professor Orientador: <?php echo $orientador['nome']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>E-mail: <?php echo $orientador['email']; ?></p>
						</div>
						<div class="box2">
							<p>Telefone: <?php echo $orientador['telefone']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Professor Coorientador: <?php echo $coorientador['nome']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>E-mail: <?php echo $coorientador['email']; ?></p>
						</div>
						<div class="box2">
							<p>Telefone: <?php echo $coorientador['telefone']; ?></p>
						</div>
					</div>
				</div>
				<br>
				<div class="boxb">
					<div class="box">
						<div class="box0">
							<p><strong>2 IDENTIFICAÇÃO DA PARTE CONCENDENTE</strong></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Nome: <?php echo $empresa['nome']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>E-mail: <?php echo $representante['email']; ?></p>
						</div>
						<div class="box2">
							<p>Telefone: <?php echo $representante['telefone']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Endereço: <?php echo $ondeestagio['rua'] .' Nº: '. $ondeestagio['numero'] .' Bairro: '. $ondeestagio['bairro']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>Município/UF: <?php echo $ondeestagio['cidade'] .'/'. $ondeestagio['estado']; ?></p>
						</div>
						<div class="box2">
							<p>CEP: <?php echo $ondeestagio['cep']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p>Supervisor: <?php echo $supervisor['nome']; ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>E-mail: <?php echo $supervisor['email']; ?></p>
						</div>
						<div class="box2">
							<p>Telefone: <?php echo $supervisor['telefone']; ?></p>
						</div>
					</div>
				</div><br>
				<div class="boxb">
					<div class="box">
						<div class="box0">
							<p><strong>3 PREVISÃO DE ATIVIDADES A SEREM REALIZADAS</strong></p>
						</div>
					</div>
					<div class="box">
						<div class="box0">
							<p><?php echo $dadosestagio['atividades']; ?></p>
						</div>
					</div>
				</div><br>
				<div class="boxb">
					<div class="box">
						<div class="box0">
							<p><strong>4 PERÍODO DE ESTÁGIO</strong></p>
						</div>
					</div>
					<div class="box">
						<div class="box1">
							<p>Início: <?php echo $data_inic; ?></p>
						</div>
						<div class="box2">
							<p>Previsão de término: <?php echo $data_fim; ?></p>
						</div>
					</div>
				</div>
				<br><br>
				<div class="data">
					<p>Frederico Westphalen/RS, <?php echo $data_sub_dia; ?> de <?php echo $mes; ?> de <?php echo $data_sub_ano; ?>.</p>
				</div><br><br><br>
			</div>
			<div class="texto">
				<div class="assin_box">
					<?php
					$data_ass_estagiario = strtotime($estagio['assinaturaEstagiario']);
					$data_assinada_estagiario = date("d/m/Y h:i:s", $data_ass_estagiario);
					echo 'Assinado digitalmente por ' .$estagiario['nome'];?><br>
					<?php echo ' Data: ' .$data_assinada_estagiario;?> 
					<hr>	
					<p>Estagiário</p>
				</div><br><br><br>
				<div class="assin_box">
					<?php
					if ($estagio['assinaturaSupervisor'] == NULL) {
						?><hr>
						<p>Supervisor</p>
						<p>Parte Concedente</p><?php
					}else{
						$data_ass_Sup = strtotime($estagio['assinaturaOrientador']);
						$data_assinada_Sup = date("d/m/Y h:i:s", $data_ass_Sup);
						echo 'Assinado digitalmente por ' .$supervisor['nome'];?><br>
						<?php echo ' Data: ' .$data_assinada_Sup; ?>
						<hr>
						<p>Supervisor</p>
						<p>Parte Concedente</p><?php
					}
					?>
				</div><br><br><br>
				<div class="assin_box">
					<?php
					if ($estagio['assinaturaOrientador'] == NULL) {
						?><hr>
						<p>Professor Orientador</p>
						<p>Entidade Educacional</p><?php
					}else{
						$data_ass_Orient = strtotime($estagio['assinaturaOrientador']);
						$data_assinada_Orient = date("d/m/Y h:i:s", $data_ass_Orient);
						echo 'Assinado digitalmente por ' .$orientador['nome'];?><br>
						<?php echo ' Data: ' .$data_assinada_Orient; ?>	
						<hr>
						<p>Professor Orientador</p>
						<p>Entidade Educacional</p><?php
					}
					?>

				</div><br><br><br>
				<div class="assin_box">
					<?php 
					if ($estagio['assinaturaCordCurso'] == NULL) {
						?><hr>
						<p>Coordenador de curso</p>
						<p>Entidade Educacional</p>	<?php
					}else{
						$data_ass_CordCur = strtotime($estagio['assinaturaCordCurso']);
						$data_assinada_CordCur = date("d/m/Y h:i:s", $data_ass_CordCur);
						echo 'Assinado digitalmente por ' .$Cordcurso['nome'];?><br>
						<?php echo ' Data: ' .$data_assinada_CordCur; ?>	
						<hr>
						<p>Coordenador de curso</p>
						<p>Entidade Educacional</p><?php
					}
					?>
				</div><br><br><br>
				<div class="assin_box">
					<?php 
					if($estagio['assinaturaCordExt'] == NULL){
						?><hr>
						<p>Coordenador de Extensão</p>
						<p>Entidade Educacional</p><?php
					}else{
						$data_ass_CordExt = strtotime($estagio['assinaturaCordExt']);
						$data_assinada_CordExt = date("d/m/Y h:i:s", $data_ass_CordExt);
						echo 'Assinado digitalmente por ' .$extensao['nome'];?><br>
						<?php echo ' Data: ' .$data_assinada_CordExt; ?>	
						<hr>
						<p>Coordenador de Extensão</p>
						<p>Entidade Educacional</p><?php
					}	?>

					
				</div>

			</div>
							


				<br><br><br>
				
		</div>
			
		</div>	
	</main>

</body>
</html>