<?php
$begin_time = microtime(true);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$pdo = new PDO('mysql:host=localhost;dbname=pabios;charset=UTF8','pabios','pabios');

session_start();
 //$root_url = 'http://tp4bdd.local/';
 $root_url = $_SERVER['HTTP_HOST'].'/';
require_once('lib/flash.php');
require_once('lib/i18n.php');
/* echo '<pre>';
var_dump($_SERVER['HTTP_HOST']);
echo '</pre>'; */
//var_dump($root_url);

/*
$query = 'SELECT * FROM comment';
$posts = $pdo->query($query);
foreach ($posts as $post ) {
    $i = $pdo->exec(sprintf('UPDATE comment SET comment=%s WHERE id=%s', $pdo->quote(utf8_encode($post['comment'])), $post['id']));
    var_dump($i);
}

$query = 'SELECT * FROM post';
$posts = $pdo->query($query);
foreach ($posts as $post ) {
    $i = $pdo->exec(sprintf('UPDATE post SET title="%s", abstract=%s, content=%s WHERE id=%s', utf8_encode($post['title']), $pdo->quote(utf8_encode($post['abstract'])), $pdo->quote(utf8_encode($post['content'])), $post['id']));
    var_dump($i);
}
echo 'ok';
die;*/
