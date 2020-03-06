<?php
$password = 'pabios';
$login = 'pabios';
$database = 'pabios';
$host = 'localhost';

// connection à la base de donnée
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $login, $password);

$id = 115;
$author_id = 2;

// écriture d'une requête
//$query = 'SELECT * FROM articles WHERE id='.$id;
$query = sprintf('SELECT * FROM livre WHERE id=%s', $pdo->quote($id));
echo $query . "\n";

// executer la requête
$results = $pdo->query($query);

// gestion des erreurs
if (!$results) {
    var_dump($pdo->errorInfo());
    die;
}

// afficher le nombre de résultats
echo $results->rowcount().' enregistrement'."\n";

// boucler sur les enregistrements
foreach ($results as $row) {
    echo $row['id'] . "\t";
    echo $row['titre'] . "\n";
    //var_dump($row);
}

// utilisation d'objet
echo "\n";

// déclaration d'une classe (cf cours à ce sujet)
class Livre {}

// écriture de la requête
$query = sprintf('SELECT * FROM livre WHERE auteur_id=%s', $pdo->quote($author_id));
echo $query . "\n";

// executer la requête
$results = $pdo->query($query, PDO::FETCH_CLASS, 'Livre');
echo $results->rowcount() . ' enregistrements' . "\n";
foreach ($results as $row) {
    echo $row->id . "\t";
    echo $row->titre . "\n";
}
//var_dump($row);

// récupérer juste le premier enregistrement
$results = $pdo->query($query, PDO::FETCH_CLASS, 'Livre');
$livre = $results->fetch();
//var_dump($livre);

// récupérer tous les enregistrement sous forme d'un tableau
$livres = $results->fetchAll();
//var_dump($livres);
echo count($livres) . "\n";


// insertion, modification, suppression
echo "\n";

// écriture de la requête d'insertion
$query = sprintf('
    INSERT INTO livre (titre, auteur_id, date_achat) VALUES (%s, %s, NOW())',
    $pdo->quote('Les Misérables'),
    $pdo->quote($author_id)
);
echo $query . "\n";

// executer la requête
$nb_enregistrement_modified = $pdo->exec($query);

// nombre d'enregistrement modifié
echo $nb_enregistrement_modified . ' enregistrements ont été modifié' . "\n";

// dernier ID inseré dans la base
echo 'dernier ID : ' . $pdo->lastInsertId() . "\n";
