<?php

require_once('_config.php');

$categories = $pdo->query('SELECT * FROM category');
$posts = $pdo->query('SELECT * FROM post');
$comments = $pdo->query('SELECT * FROM comment');
$users = $pdo->query('SELECT * FROM user');


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP4 database</title>
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
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($categories as $category): ?>
                        <tr>
                          <th scope="row"><?php echo $category['id'] ?></th>
                          <td>
                              <a href="categorie.php?id=<?php echo $category['id'] ?>">
                                  <?php echo $category['name'] ?>
                              </a>
                          </td>
                        </tr>
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
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                          <tr>
                            <th scope="row"><?php echo $post['id'] ?></th>
                            <td>
                                <a href="post.php?id=<?php echo $post['id'] ?>">
                                    <?php echo $post['title'] ?>
                                </a>
                            </td>
                            <td><?php echo $post['author_id'] ?></td>
                            <td><?php echo $post['category_id'] ?></td>
                            <td><?php echo $post['published_at'] ?></td>
                          </tr>
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
                      <?php foreach ($comments as $comment): ?>
                            <tr>
                              <th scope="row"><?php echo $comment['id'] ?></th>
                              <td>
                                  <a href="post.php?id=<?php echo $comment['post_id'] ?>">
                                      <?php echo $comment['post_id'] ?>
                                  </a>
                              </td>
                              <td><?php echo $comment['author'] ?></td>
                              <td><?php echo $comment['comment'] ?></td>
                              <td><?php echo $comment['published_at'] ?></td>
                            </tr>
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
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                              <tr>
                                <th scope="row"><?php echo $user['id'] ?></th>
                                <td><?php echo $user['name'] ?></td>
                                <td><a href="mailto:<?php echo $user['email'] ?>"><?php echo $user['email'] ?></a></td>
                              </tr>
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
