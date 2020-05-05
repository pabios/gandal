<?php
   session_start();
   require_once ('lib/flash.php');
   require_once ('./connect.php');
   $req = 'SELECT * FROM cloud';
   $clouds = $pdo->query($req);

   $categories = $pdo->query('SELECT * FROM category');

   /**** 
   * debut insertion
   *****/
  if(isset($_POST['demande'])){
    if(!empty($_POST['societe']) AND !empty($_POST['domaine']) AND !empty($_POST['email']) ){
        $societe = htmlspecialchars($_POST['societe']);
        $domaine = htmlspecialchars($_POST['domaine']);
        $email = htmlspecialchars($_POST['email']);
        echo $ville;
        $reponses = $pdo->query("SELECT * FROM `cloud` WHERE nomDomaine = '$domaine'");
        $nb = $reponses->rowCount();
        $result = $reponses->fetch();
        
        if($nb == 0){
                    $query = $pdo->prepare('INSERT INTO cloud (dateAjout,nomDomaine,societe,extension,author_id,email )
                                        VALUES  (now(),?,?,".pabiosoft.com",25,?)');//en prod author_id = 1
                     
                      $query->execute(array($domaine,$societe,$email));
                   // $flash = ' Nous avons bien Reçu votre Demande ';
                   // $typeFlash = 'success';
                    $msg = true;
                    $reponses = $pdo->query("SELECT nomDomaine FROM `cloud` WHERE nomDomaine = '$domaine'");
                    $result = $reponses->fetch();
        } else if($nb != 0){
            //$flash = ' ce nom de domaine est deja utiliser';
            //$typeFlash = 'danger';
            $msg = false;
        }
        
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hebergement</title>
    <?php include('_head.php') ?>
  </head>
  <body>
    <?php include ('_header.php') ?>
<style>      
     body{
        padding-top:60px;
    }
    /* fix padding under menu after resize */
    @media screen and (max-width: 767px) {
        body { padding-top: 60px; }
    }
    @media screen and (min-width:768px) and (max-width: 991px) {
        body { padding-top: 110px; }
    }
    @media screen and (min-width: 992px) {
        body { padding-top: 60px; }
    }
</style>
 
 <div class="container" >    
    <!-- fin annonce -->
    <?php if(isset($msg) AND $msg == true):?>
        <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> Feliciation votre domaine <strong><?=$result['nomDomaine']?>.pabiosoft.com</strong>: est disponible  nous vous contacterons par email ou whatSAPP d'ici 24h pour finaliser votre comande.
        </div>
    <?php endif;?>
    <?php if(isset($msg) AND $msg == false):?>
        <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>  votre domaine <strong><?=$result['nomDomaine']?>.pabiosoft.com</strong>:  est deja vendu veuillez trouver un autre
        </div>
    <?php endif;?>
    <form method ="POST" action="" >
  <div class="form-row mx-auto" class="mx-auto">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Votre technologie utiliser</label>
      <input type="text" name="societe" class="form-control" id="validationDefault01" placeholder="php,wordPress etc.."   required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Le nom de votre site</label>
      <input type="text" name ="domaine" class="form-control" id="validationDefault02" placeholder="votre site"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefaultUsername"> Extension</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">.pabiosoft.com</span>
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">votre email ou numero WhatsApp</label>
      <input type="text" name ="email" class="form-control" id="validationDefault03" placeholder="email ou whatsapp" required>
    </div>
    <div class="col-lg-5">
    <label for="validationDefault03">votre Parcours</label>
          <select id="user_time_zone" class="form-control" size="0">
              <?php foreach($categories as $cat): ?>
                 <option > <?=$cat['name']?></option>
                  <?php endforeach;?>
              </select>
      </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
      &#128400 je certifie être un Etudiant et veux heberger ce site pour une durée de 12 mois
      </label> 
    </div>
  </div>
  <button class="btn btn-primary" name ="demande" type="submit">Envoyer ma Demande</button>
</form>
      
 <!--debut annonce --> 
 <div class="card-group">
  <div class="card">
    <img src="./assets/images/serveur.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Hebergement WEB SENEGAL</h5>
      <p class="card-text">   UNe année d'hebergement A seulement 5 000 CFA (en une fois) ou 500 CFA pendant 12 mois</p>
      <p class="card-text"><small class="text-muted">seulement chez <a href="./index.php">  pabiosoft.com </a></small></p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">1 Go Base de Donnée Mysql</li>
        <li class="list-group-item"> 1 Adresse Email Offerte</li>
        <li class="list-group-item">Un Acces FTP </li>
    </ul>
  <div class="card-footer">
      <small class="text-muted">Envie de Partager ? Rejoind la Team Pabios  sur <a href="https://discord.gg/dZqgXHy"> discord</a></small>
  </div>
  </div>
  </div>
  <div class="card">
  <div class="card">
    <img src="./assets/images/serveur.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Hebergement WEB GUINEE</h5>
      <p class="card-text">   UNe année d'hebergement A seulement 75 000 GNF (en une fois) ou 8000 GNF pendant 12 mois</p>
      <p class="card-text"><small class="text-muted">seulement chez <a href="./index.php">  pabiosoft.com </a></small></p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">1 Go Base de Donnée Mysql</li>
        <li class="list-group-item"> 1 Adresse Email Offerte</li>
        <li class="list-group-item">Un Acces FTP </li>
    </ul>
  <div class="card-footer">
      <small class="text-muted">Envie de Partager ? Rejoind la Team Pabios  sur <a href="https://discord.gg/dZqgXHy"> discord</a></small>
  </div>
  </div>
  </div>
</div>
     </div>
  </body>
</html>