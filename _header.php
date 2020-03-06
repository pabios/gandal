
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-info mb-4">
        <div class="container">
       <a class="navbar-brand" href="index.php"><?php echo __('sitename') ?></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span> Menu
       </button>
       <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
               <a class="nav-link" href="index.php">Accueil</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="categorie.php?id=1">
                   Catégorie 1
                   <span class="badge badge-secondary">0</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="categorie.php?id=2">
                   Catégorie 2
                   <span class="badge badge-secondary">0</span>
               </a>
           </li>

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
<?php show_flash() ?>
</div>
