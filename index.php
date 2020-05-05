<?php
   require_once ('_config.php');
   
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
    <?php include('_header.php'); ?>
    <?php include('./include/slider.php'); ?>
    <div class="container" > 
        <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> &#128400     Bonjour soit le bienvenue.   Bien que ce site est en cours de développement tu peux dors et déjà  <a href="./cloud.php">héberger</a> ton site.
          </div>
          
        <?php foreach($posts as $post): ?> 
        <div class="card-deck">
            <div class="card" style="width: 20rem;">
              <img class="card-img-top" src="./assets/images/slide1.jpg" alt="Card image cap">
              <div class="card-body">
                    <h5 class="card-title"> <?=$post->title ?></h5>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">update : <?=$post->published_at; ?></li>
                  </ul>
                    <a href="post.php?id=<?=$post->id ?>" class="btn btn-primary">Lire plus</a>
              </div>
            </div>
        </div>
          <?php endforeach; ?>
    </div>

    

    <?php include('_footer.php') ?>
  </body>
</html>
