<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$pdo=new PDO('mysql:host=localhost;dbname=pabios','pabios','pabios');
// $results = $pdo->exec('INSERT…');
$results=$pdo->query('SELECT * FROM post;');
foreach($results as $row) {
  //var_dump($row);
  echo $row['title'];
}

?>
