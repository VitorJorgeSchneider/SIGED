<?php
include('conexao.php');
	$p2 = $_GET['aluno'];
	echo $p2 ;
	$a_sql = "SELECT * FROM alunos";
	$a_query = $mysqli->query($a_sql);
	while ($a = mysqli_fetch_assoc($a_query)) {
		if(password_verify($a['matricula'], "$p2")){
			echo $a['nome'];
		}
		
	}$i = 0;
?>