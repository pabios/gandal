 <?php
//require_once ('_config.php');
require_once ('lib/flash.php');
require_once ('./connect.php');

 
$post = $pdo->query('SELECT title,content FROM post ');
//post en cas d'une recherche de mot qui n'existe pas 
$postPropose = $pdo->query('SELECT title,content from post where id = 1');
         

  

 if( isset($_GET['searchIn']) ){
      $q = htmlspecialchars($_GET['searchIn']);
      //$q = explode(' ',$q); // permet  separer par un espace la recherche utilisateur
      $post = $pdo->query('SELECT title,content FROM post WHERE title LIKE "%'.$q.'%"  ');
      
      // contacte titre et contenu et puis recherche mot cle mp a la wikipedia :) 
      if($post->rowCount() == 0){
          $post = $pdo->query('SELECT title,content FROM post WHERE CONCAT(title,content) LIKE "%'.$q.'%"  ');
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
    <?php include('_header.php') ?>
<div class="container">
     <?php
     if($post->rowCount() > 0){
        $reponses = $post->fetchAll();
       ?>
       <div class ="row">
            <?php foreach( $reponses as $rep):  ?>
            <div class="col-md-4">
                  <?php //echo $rep['title'].'<br/>'; echo $rep['content']; ?> 
                  <h2><?php echo $rep['title'];?></h2>
                    <?php 
                        if(isset($q)){
                            $q = htmlspecialchars($q);
                        echo '<a href="#">'.$q.' est cite plusieus dans cet article </a>';
                    }
                         ?>
                    <p><?=$rep['content']?></p>
                    <p><a class="btn btn-secondary" href="#" role="button">lire plus &raquo;</a></p>
            </div>
            <?php endforeach;?>
        </div>
    <!-- dans le ou l'utilisateur recherche un truc qui n'est pas un mot contenu dans la table post-->
    <?php 
    }else{
       add_flash('danger', 'votre recherche n\'aparait pas sur notre site. Revenez plutard');
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
