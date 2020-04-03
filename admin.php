<?php

require_once('_config.php');
/**
 * Fichier totalement en Procedurales
 */
$pdo = new PDO('mysql:host=localhost;dbname=pabios;charset=UTF8','pabios','pabios');

 $categories = $pdo->query('SELECT * FROM category');
$posts = $pdo->query('SELECT * FROM post');
$comments = $pdo->query('SELECT * FROM comment');
$users = $pdo->query('SELECT distinct  * FROM user'); 
/**
 * jointure entre la table commentaire et la table User
 */
 $commentUsers =$pdo->prepare('SELECT u.userName,c.id FROM comment as c INNER JOIN user as u ON c.author_id = u.id WHERE c.id =? ');

/**
 * jointure entre la table la  post et la table USER
 */
$userPost= $pdo->prepare('SELECT  u.id,u.userName, u.email,count(p.id) as nbPost FROM post as p RIGHT OUTER JOIN user as u ON p.author_id = u.id WHERE u.id = ? GROUP BY u.id  ');

/**
 * jointure entre post et USER dans la table post en query
 */
$postUserForArticle= $pdo->query('SELECT p.title,p.published_at, u.userName,p.id,p.category_id FROM post as p INNER JOIN user as u ON p.author_id = u.id  ');

 /**
  * jointure entre POST et CATEGORIE partie categorie 
  * @param l'id de la category avec alias pc au niveau de l'execute()
  */
  $postCategory =$pdo->prepare('SELECT  COUNT(p.id) as nb,c.name FROM post as p INNER JOIN category as c ON c.id = p.category_id  WHERE c.id =? GROUP BY c.name');

  /**
  * jointure entre POST et CATEGORIE partie POST
  * @param l'id de post avec comme alios cp au niveau de l'execute()
  */
  $categoryPost =$pdo->prepare('SELECT  c.name FROM post as p INNER JOIN category as c ON c.id = p.category_id  WHERE p.id =? ');

/**
 * jointure entre POST ET COMMENTAIRE
 * @param l'id de Post  avec comme alias  pcom au niveau de l'execute()
 */
  $postComment = $pdo->prepare('SELECT p.id, COUNT(c.id) as nbComment FROM post as p LEFT JOIN comment as c ON p.id = c.post_id WHERE p.id = ? OR p.id IS NULL GROUP by p.id');

  /**
 * jointure entre POST ET COMMENTAIRE
 * @param l'id de Commentaire  avec comme alias  pcom au niveau de l'execute()
 */
  $commentPost = $pdo->prepare('SELECT p.id, COUNT(c.id) as nbComment FROM post as p LEFT JOIN comment as c ON p.id = c.post_id WHERE p.id = ? OR c.id IS NULL GROUP by p.id');
/**
 * JOINTURE entre post et commentaire affichage du nomArticle  et ces liste de comantaire
 * @param l'id du commantaire
 */
  $commentPostForComment = $pdo->prepare('SELECT c.id as idComment,p.id as idPost,p.title,c.comment,c.published_at  FROM comment as c LEFT OUTER JOIN post as p ON c.post_id = p.id WHERE c.id = ? OR c.id IS null');

/**
 * JOINTURE entre post et user agregation sur nbPoste
 * @param id USER
 */
$postUser = $pdo->prepare('SELECT u.userName, COUNT(p.id) as nbPost FROM user as u LEFT OUTER JOIN post as p ON u.id = p.author_id WHERE u.id >=1 or u.id IS null GROUP BY u.userName');



?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin</title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include('_header.php') ?>

    <div class="container" >
      <article>
        <div class="card mb-3 border-info">
            <div class="card-header text-white bg-info">Categories</div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col"> Nombre d'article</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   foreach ($categories as $category):
                    $postCategory->execute(array($category['id']));
                      foreach($postCategory as $pc):
                    ?>
                        <tr>
                          <th scope="row"><?php echo $category['id'] ?></th>
                          <td>
                              <a href="categorie.php?id=<?php echo $category['id'] ?>">
                                  <?php echo $category['name'] ?>
                              </a>
                          </td>
                          <td>
                              <?= $pc['nb']?>
                          </td>
                        </tr>
                      <? endforeach; ?>
                    <?php endforeach; ?>
              </tbody>
            </table>
        </div>
      </article>



        <article>
          <div class="card mb-3 border-info">
              <div class="card-header text-white bg-info">Articles</div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date</th>
                    <th scope="col">nombre de commentaire</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                          foreach ($posts as $post):
                                  foreach($postUserForArticle as $pufa): 
                                    $postComment->execute(array($pufa['id']));  
                                      foreach($postComment as $pcom):
                                          $categoryPost->execute(array($pufa['id']));
                                            foreach($categoryPost as $cp):
                      ?>
                          <tr>
                            <th scope="row"><?php echo $pufa['id'];?></th>
                            <td>
                                <a href="post.php?id=<?php echo $post['id'] ?>">
                                    <?php echo $pufa['title']; ?>
                                </a>
                            </td>
                            <td><?=$pufa['userName'] ?></td>
                            <td><?= $cp['name']?></td>
                            <td><?= $pufa['published_at'] ?></td>
                            <td> <?=$pcom['nbComment'] ?></td>
                          </tr>
                                            <?php endforeach;?>
                                        <?php endforeach; ?>
                                    <?php endforeach;  ?>
                      <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        </article>



          <article>
            <div class="card mb-3 border-info">
                <div class="card-header text-white bg-info">Commentaires</div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Article</th>
                      <th scope="col">Auteur</th>
                      <th scope="col">Commentaire</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                            foreach ($comments as $comment):
                               $commentPostForComment->execute(array($comment['id']));
                               foreach($commentPostForComment as $cpfc):
                                  $commentUsers->execute(array($comment['id']));
                                  foreach($commentUsers as $cu):
                      ?>
                            <tr>
                              <th scope="row"><?php echo $comment['id'] ?></th>
                              <td>
                                  <a href="post.php?id=<?php echo $comment['post_id'] ?>">
                                      <?php echo $cpfc['title'] ?>
                                  </a>
                              </td>
                             <td><?=$cu['userName'] ?></td>
                              <td><?php echo $cpfc['comment'] ?></td>
                              <td><?php echo $cpfc['published_at'] ?></td>
                            </tr>
                                  <?php endforeach;?>
                               <?php endforeach;?>
                        <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
          </article>



            <article>
              <div class="card mb-3 border-info">
                  <div class="card-header text-white bg-info">Utilisateurs</div>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nombre d'article Ecrit</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($users as $user):
                               $userPost->execute(array($user['id']));
                              foreach($userPost as $up):
                          ?>
                              <tr>
                                <th scope="row"><?php echo $up['id'] ?></th>
                                <td><?php echo $up['userName'] ?></td>
                                <td><a href="mailto:<?php echo $user['email'] ?>"><?php if(!empty($up['email'])){ echo $up['email'];}else{ echo "cet utilisateur n'a pas d'Email";} ?></a></td>
                                <td>
                                    <?=$up['nbPost']?>
                                </td>
                              </tr>
                              <?php endforeach;?>
                          <?php endforeach; ?>
                    </tbody>
                  </table>
              <?php foreach ($categories as $category): ?>
               <li class="nav-item">
                   <a class="nav-link" href="categorie.php?id=<?php echo $category['id'] ?>">
                       <?php echo $category['name'] ?>
                       <span class="badge">0</span>
                   </a>
               </li>
              <?php endforeach; ?>
              </div>
            </article>



    </div>

    <?php include('_footer.php') ?>
  </body>
</html>
