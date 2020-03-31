<?php




/* récupérer et afficher les commentaire relatif à l'article */

/* $query = 'SELECT * FROM comment WHERE post_id='.$current_post['id'];
$comment_result = $pdo->query($query); */
?>

<div id="divRecharge"> 
  <?php if ($comment_result): ?>
      <?php foreach ($comment_result as $comment): ?>
          <div class="card mt-3 mb-3">
              <h2 class="card-header">
                  <?php echo $comment->name ?>
                  <span class="badge badge-secondary"><?php echo $comment->published_at; ?></span>
              </h2>
            <div class="card-body">
              <p class="card-text"><?php echo $comment->comment; ?></p>
            </div>
          </div>
      <?php endforeach ?>
  <?php else: ?>
      <div class="alert alert-info" role="alert">Il n'y a pas encore de commentaire, soyez le premier !</div>
  <?php endif ?>
</div>



<?php /* formulaire de commentaire */ ?>
<div class="card mt-3 mb-3 border-info">
  <div class="card-header text-white bg-info">Votre avis ?</div>
  <div class="card-body">

    <form action="" method="POST">
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required />
      </div>
      <div class="form-group">
        <label for="commentaire">Commentaire</label>
        <textarea id="commentaire" name="commentaire" class="form-control" rows="5" required ></textarea>
      </div>
      <p class="text-right"><input type="submit" class="btn btn-primary" value="Envoyer" name="envoyer"></p>
    </form>

  </div>
</div>
