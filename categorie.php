<?php
require_once('_config.php');

$current_category_id = $_GET['id'];
var_dump($current_category_id);echo '<br />';

$query = 'SELECT * FROM category WHERE id='.$current_category_id;
var_dump($query);echo '<br />';

$current_category_result = $pdo->query($query);
$current_category = $current_category_result->fetch();

var_dump($current_category['name']);echo '<br />';

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP4 database — [Nom de la catégorie]</title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container">
      <section>
        <header>
          <h1>[Nom de la catégorie]</h1>

            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">[Nom de la catégorie]</li>
              </ol>
            </nav>
        </header>



<?php
  // Requête pour récupérer tous les articles de la catégorie
  $query = 'SELECT …';
  //$posts = $pdo->query($query);
?>
        <?php //foreach ($posts as $post): ?>
            <article>
                <div class="card mt-3 mb-3">
                    <h2 class="card-header">
                        [titre de l'article 1]
                        <span class="badge badge-secondary">[auteur de l'article 1]</span>
                    </h2>
                  <div class="card-body">
                    <p class="card-text">[Résumé de l'article 1]</p>
                    <a href="post.php?id=[article id]" class="btn btn-primary" title="[titre de l'article 1]">Lire la suite de l'article 1</a>
                  </div>
                </div>
            </article>
        <?php //endforeach ?>


      </section>
    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
