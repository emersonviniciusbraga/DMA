<?php

$server = "localhost";
$porta = "3306";
$user = "root";
$passwd = "";
$dbname = "dma";

$mysqli = new mysqli($server,$user,$passwd,$dbname) or die(mysql_error());


?>