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
  <style>
    body {
            padding-top: 60px;
        }


        /* fix padding under menu after resize */

        @media screen and (max-width: 767px) {
            body {
                padding-top: 60px;
            }
        }

        @media screen and (min-width:768px) and (max-width: 991px) {
            body {
                padding-top: 110px;
            }
        }

        @media screen and (min-width: 992px) {
            body {
                padding-top: 60px;
            }
        }
  </style>
    <?php include('_header.php'); ?>
    <div class="container" > 
        <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> &#128400     Bonjour soit le bienvenue.   Bien que ce site est en cours de développement tu peux dors et déjà  <a href="./cloud.php">héberger</a> ton site.
          </div>
          <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> &#129321; ce blog est en cours de Developpement les articles qui sont present sont a titre indicatif
          </div>
          
        <?php foreach($posts as $post): ?> 
        <div class="card-deck">
            <div class="card" style="width: 20rem;">
              <img class="card-img-top" src="./assets/images/moji1.png" alt="Card image cap">
              <div class="card-body">
                    <h5 class="card-title"> <?=$post->title ?></h5>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Derniere mise a jour: <?=$post->published_at; ?></li>
                    <li class="list-group-item"><?php   
                    
                         $extrait = $post->content; 
                        //echo substr($extrait,0,-1);
                        echo $post->afficheMots($post->content,10);
                        ?> 
                     </li>
                  </ul>
                    <a href="post.php?id=<?=$post->id ?>" class="btn btn-primary">Lire plus</a>
              </div>
            </div>
        </div><br> 
          <?php endforeach; ?>
    </div>

    

    <?php include('_footer.php') ?>
  </body>
</html>
