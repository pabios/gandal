<?php
require_once('_config.php');
$post_id = $_GET['id'];

$query = 'SELECT *
FROM post
WHERE post.id='.$pdo->quote($_GET['id']);
//var_dump($query);echo '<br />';

$current_post_result = $pdo->query($query);
/* gestion article manquant : erreur 404 *//*
if ($current_post_result->rowcount() == 0) {
    add_flash('warning', 'Erreur 404 : l\'article n\'existe pas.');
    header('Location: '.$root_url);
}
$current_post = $current_post_result->fetch();*/

$current_post['id'];

/* traitement du formulaire de commentaire *//*
if (isset($_POST['nom']) && isset($_POST['commentaire'])) {
  // requête d'ajout du commentaire :
  $query = sprintf('INSERT INTO comment (post_id, author, comment, published_at) VALUES (%s, %s, %s, NOW())', $current_post['id'], $pdo->quote($_POST['nom']), $pdo->quote($_POST['commentaire']));
  $result = $pdo->exec($query);
  if ($result) {
      add_flash('success', 'Merci pour votre commentaire');
      header('Location: '.$root_url.'post.php?id='.$current_post['id']);
  }
}*/

//var_dump($current_category['name']);echo '<br />';

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP4 database — <?php echo $current_post['title'] ?></title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container">
      <article>
        <header>
          <h1><?php echo $current_post['title'] ?></h1>

          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item"><?php echo $current_post['category_name'] ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $current_post['title'] ?></li>
            </ol>
          </nav>

        </header>

        <div>
          <?php echo $current_post['content'] ?>
        </div>

        <footer>
          <p>Publié le <span class="label label-default"><?php echo $current_post['published_at'] ?></span> par <span class="label label-default"><?php echo $current_post['name'] ?></span></p>
        </footer>

      </article>

      <aside>
        <?php require_once('_comments.php'); ?>
      </aside>
    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
