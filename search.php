 <?php
//require_once ('_config.php');
require_once ('lib/flash.php');
require_once ('./connect.php');

 
$post = $pdo->query('SELECT title,content,id FROM post ');
//post en cas d'une recherche de mot qui n'existe pas 
$postPropose = $pdo->query('SELECT title,content,id from post where id = 1');
         

  

 if( isset($_GET['searchIn']) ){
      $q = htmlspecialchars($_GET['searchIn']);
      //$q = explode(' ',$q); // permet  separer par un espace la recherche utilisateur
      $post = $pdo->query('SELECT title,content,id FROM post WHERE title LIKE "%'.$q.'%"  ');
      
      // contacte titre et contenu et puis recherche mot cle mp a la wikipedia :) 
      if($post->rowCount() == 0){
          $post = $pdo->query('SELECT title,content,id FROM post WHERE CONCAT(title,content) LIKE "%'.$q.'%"  ');
      }
 }
          /*   echo '<pre>';
                var_dump($post);
            echo '</pre>'; */
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vous cherchez <?=$q?></title>
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
    <?php include('_header.php') ?>
<div class="container">
     <?php
     if($post->rowCount() > 0){
        $reponses = $post->fetchAll();
       ?>
       <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> <span>&#129312;</span>  votre recherche apparait dans ces articles
          </div>
       <div class ="row">
            <?php foreach( $reponses as $rep):  ?>
            <div class="col-md-4">
                  <?php //echo $rep['title'].'<br/>'; echo $rep['content']; ?> 
                  <h2><?php echo $rep['title'];?></h2>
                    <?php 
                        if(isset($q)){
                            $q = htmlspecialchars($q);
                        ?>
                        <p><a  href="./post.php?id=<?=$rep['id']?>" role="button">
                            <?=$q?> est cite plusieus dans cet article
                        </a></p>

                        <?php
                    }
                         ?>
                    <p><?=$rep['content']?></p>
                    <p><a class="btn btn-secondary" href="./post.php?id=<?=$rep['id']?>" role="button">lire plus &raquo;</a></p>
            </div>
            <?php endforeach;?>
        </div>
    <!-- dans le ou l'utilisateur recherche un truc qui n'est pas un mot contenu dans la table post-->
    <?php 
    }else{
       add_flash('danger', '&#129300; votre recherche n\'aparait pas sur notre site. Revenez plutard');
       show_flash();
        foreach($postPropose as $rep):
       ?>
        <div class="jumbotron">
            <div class="container">
            <h1 class="display-3"><?=$rep['title']?></h1>
            <p><?=$rep['content']?></p>
            <p><a class="btn btn-primary btn-lg" href="./post.php?id=1" role="button">Learn more &raquo;</a></p>
            </div>
        </div>

       <?php
       endforeach;
}
    ?> 
       

    <hr>

  </div> <!-- /container -->
  <?php include('_footer.php') ?>
  </body>
</html>
