<?php

date_default_timezone_set('America/Sao_Paulo');

//VARIAVEIS DO BANCO DE DADOS
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'atua_loja';

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'sysmedical');


try {
	$pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
	
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e;
}

?>