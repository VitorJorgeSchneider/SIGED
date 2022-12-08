<?php
if(!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['matriculadoaluno']) || isset($_SESSION['id']) || isset($_SESSION['idset']) || isset($_SESSION['iddir'])){
	
} else{
	die("Você não pode acessar está página porque não está logado. <p><a href=\"index.php\">Entrar</a></p>");
}

?>