<?php
require_once('_config.php');
require('./function.php');

$current_category_id = getId();
$query = 'SELECT * FROM category WHERE id='.$current_category_id;
$current_category_result = $pdo->query($query);
$current_category = $current_category_result->fetch();

 




?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>categorie — [<?=$current_category['name']?>]</title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container">
      <section>
        <header>
          <h1>[<?=$current_category['name']?>]</h1>

            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">[<?=$current_category['name']?>]</li>
              </ol>
            </nav>
        </header>



<?php
  // Requête pour récupérer tous les articles de la catégorie
 $query ='SELECT p.title,p.published_at, u.userName,p.id,p.category_id FROM post as p INNER JOIN user as u ON p.author_id = u.id WHERE category_id ='.$current_category_id; 
 $posts = $pdo->query($query);
?>
        <?php foreach ($posts as $post): ?>
            <article>
                <div class="card mt-3 mb-3">
                    <h2 class="card-header">
                        [<?=$post['title']?>]
                        <span class="badge badge-secondary">[<?=$post['userName']?>]</span>
                    </h2>
                  <div class="card-body">
                    <p class="card-text">[Résumé de l'article 1]</p>
                    <a href="post.php?id=<?=$post['id']?>" class="btn btn-primary" title="<?=$post['title']?>">Lire la suite de l'article 1</a>
                  </div>
                </div>
            </article>
        <?php endforeach ?>


      </section>
    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
