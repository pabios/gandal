<?php
require_once('_config.php');
$post_id = $_GET['id'];

//$query = 'SELECT * FROM post WHERE post.id='.$pdo->quote($_GET['id']);

//var_dump($query);echo '<br />';

//$current_post_result = $pdo->query($query);
/* gestion article manquant : erreur 404 */
/* if ($current_post_result->rowcount() == 0) {
    add_flash('warning', 'Erreur 404 : l\'article n\'existe pas.');
    header('Location: '.$root_url);
} */

//$current_post = $current_post_result->fetch();

/**
 * traitement du formulaire de commentaire
*/

/* if(isset($_POST['envoyer'])){

    if (isset($_POST['nom']) && isset($_POST['commentaire'])) {
        extract($_POST);
        $nom = htmlspecialchars($nom);
        $commentaire = htmlspecialchars($commentaire);


        // requête d'ajout du commentaire :
        $query = sprintf('INSERT INTO comment (post_id, name, comment, published_at) VALUES (%s, %s, %s, NOW())', $current_post['id'], $pdo->quote($nom), $pdo->quote($commentaire));
        $result = $pdo->exec($query);
        if ($result) {
            add_flash('success', 'Merci pour votre commentaire');
            header('Location: '.$root_url.'post.php?id='.$current_post['id']);
            die();
        }
      }
} */


/* $req = 'SELECT c.name,c.id FROM post as p INNER JOIN category as c ON c.id = p.category_id  WHERE p.id ='.$current_post['id'];
$current_category_result =$pdo->query($req);
$current_category = $current_category_result->fetch();
//var_dump( $current_category); */


/* $req = 'SELECT p.title,p.content,p.published_at, u.userName,p.id,p.category_id FROM post as p INNER JOIN user as u ON p.author_id = u.id  WHERE p.id='.$current_post['id'];
$postUserResult= $pdo->query($req);
$postUser = $postUserResult->fetch(); */
 


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>post — <?php echo $postUser->title; ?></title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container">
      <article>
        <header>
          <h1><?php echo $postUser->title; ?></h1>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item"><?php echo $currentCategory->name; ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $postUser->title; ?></li>
            </ol>
          </nav>

        </header>

        <div>
          <?php echo $postUser->content; ?>
        </div>

        <footer>
          <p>Publié le <span class="label label-default"><?php echo $current_post->published_at; ?></span> par <span class="label label-default"><?php echo $postUser->userName; ?></span></p>
        </footer>

      </article>

      <aside>
        <?php require_once('_comments.php'); ?>
      </aside>
    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
