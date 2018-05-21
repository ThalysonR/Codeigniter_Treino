<?php
$host = "localhost";
$dbname = "mercado";
$dbuser = "teste";
$userpass = "123456";

$con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $userpass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO_ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);


if (!$con) {
      die('Could not connect');
}
else {
      echo ("Connected to local DB");
      // $qr = $con->query('SELECT * FROM usuarios;');
      // var_dump($qr->fetchAll(PDO::FETCH_ASSOC));
}
 ?>
