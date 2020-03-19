<?php
require_once('_config.php');

$serveur = 'toto';
$bdd = 'mabase';
$login = 'totot';
$mdp = 'mdp';


$donneeUser = $pdo->quote($saisiUtilisateur);
try{
    $connexion = new PDO("mysql:host=$serveur;dbname=$bdd",$login,$mdp);
    $req = 'SELECT id form posts as p inner join comment as c
     p.id = c.post_id
       ';
    $requete = $connexion->preapre($req);

}catch(PDOException $e){
    echo 'echec :'.$e->getMessage();
}
session_start();
$posts = $pdo->query('SELECT * FROM post Where id = 1');


foreach ($posts as $post){
    echo $post['title'];
}

foreach($categorie as $cat){
    echo $cat['name'];
}