<?php
define('HOST', 'geodireito.postgresql.dbaas.com.br');
define('USER', 'geodireito');
define('PASS', 'urblog2022');
define('DBNAME', 'geodireito');
$conn = new PDO('pgsql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
?>

