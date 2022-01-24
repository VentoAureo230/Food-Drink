<?php
require_once('appelbd.php');
$sqlQuery = 'SELECT * FROM menu';

$take = $dbh->prepare($sqlQuery);
$take->execute();
$recups = $take->fetchAll();

foreach ($recups as $recup){
    echo ($recup['nom']."\n <br>");
    echo("<img src=".$recup['photo']."></img>");
}
