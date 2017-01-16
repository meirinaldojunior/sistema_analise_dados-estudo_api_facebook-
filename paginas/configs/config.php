<?php 


$database = 'mydb';
$user = 'root';
$password = 'root';
$address = 'localhost';


mysql_connect($address, $user, $password) or die('Erro ao conectar com a base de dados'); // conectar com base
mysql_select_db($database) or die('erro ao selecionar base de dados.'); //selecionar base de dados

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

header('Content-type: text/html; charset=utf-8');

header('Expires: ' . $now);
header('Last-Modified: ' . $now);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0 

//configurar opcoes de linguagem para php-date
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Recife');

?>