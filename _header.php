<?php
    require_once('./_config.php');
    require_once('./function.php');
    //$postCategoryMenu = $pdo->query('SELECT  COUNT(p.id) as nb ,c.id,c.name  FROM category as c INNER JOIN post as p ON c.id = p.category_id  GROUP BY c.id');

?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-info mb-4">
        <div class="container">
       <a class="navbar-brand" href="index.php"><?php echo 'pabiosoft'; ?></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span> Menu
       </button>
       <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
               <a class="nav-link" href="index.php">Accueil</a>
           </li>
           <?php foreach($postCategoryMenu as $pcm): ?>
          <?php if(getId() != $pcm->id):?>
          <li class="nav-item ">
            <?php else: ?>
           <li class="nav-item active" >
            <?php endif; ?>
               <a class="nav-link" href="categorie.php?id=<?=$pcm->id?>">
                    <?=$pcm->name?>
                   <span class="badge badge-secondary"><?=$pcm->nb?></span>
               </a>
           </li>
            <?php endforeach;?>

           <?php /*$nav_categories = $pdo->query('SELECT * FROM category'); ?>
           <?php foreach ($nav_categories as $category): ?>
               <li class="nav-item">
                   <a class="nav-link" href="categorie.php?id=<?php echo $category['id'] ?>">
                       <?php echo $category['name'] ?>
                       <span class="badge">0</span>
                   </a>
               </li>
           <?php endforeach;*/ ?>
         </ul>
       </div>
</div>
     </nav>
</header>

<div class="container" >
  <?php
  Comment::insertComment();
   $s =App::show_flash();
  if(!empty($s)){ 
   Comment::redirect();
   die();
  }
    ?>
</div>
