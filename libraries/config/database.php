<?php
function getPDO(): PDO
{
    $servername = 'localhost';
    $dbname = 'welovetechno';
    $user = 'root';
    $pass = 'root';
  
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass, [
      PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
      // mode de requête par défaut => renvoit des tableaux associatifs
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  
    return $pdo;
}