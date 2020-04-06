<?php
   require_once('_config.php');
   //$req = 'SELECT * FROM post';
   //$reponse = $pdo->query($req);


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>acceuil</title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container" >
    <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> Bienvenue parmi la comunauté <strong>pabiosoft</strong>: ce site web est en cours de developpement click sur <a href="./cloud.php">hebergement</a>  pour heberger ton site .
       </div>
    <?php foreach($posts as $post): ?>
      <article>

            <div class="card mt-3 mb-3">
                <h2 class="card-header">
                    <?=$post->title ?>
                </h2>
              <div class="card-body">
                <p class="card-text"><?=$post->content ?> </p>
                <a href="post.php?id=<?=$post->id ?>" class="btn btn-primary">lire plus</a>
              </div>
            </div>
      </article>
    <?php endforeach; ?>
    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
