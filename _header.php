<?php
    require_once('./_config.php');
    require_once('./function.php');
  

    //$postCategoryMenu = $pdo->query('SELECT  COUNT(p.id) as nb ,c.id,c.name  FROM category as c INNER JOIN post as p ON c.id = p.category_id  GROUP BY c.id');
     
?>
<header>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-info mb-4">
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
           <li class="nav-item active">
               <a class="nav-link" href="./cloud.php">Hebergement</a>
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
         <!--
         <form action="./search.php" method="GET" class="form-inline my-2 my-lg-0" >
            <input name ="searchIn" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button name = "doSearch" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          -->
          <form action="./search.php" method="GET" class="form-inline my-2 my-lg-0" >

            <!-- Another variation with a button -->
            <div class="input-group">
                <input type="text" name ="searchIn" class="form-control" placeholder="votre Recherche..">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit" name = "doSearch">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
          </form>
          <span class="material-icons" class="nav-link">
            <a href="./login.php" style="margin-left:15%"> <img src="./assets/images/2x/icone.png" alt="login"></a>
          </span>
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
