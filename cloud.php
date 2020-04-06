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
    <?php include('_header.php') ?>

    <div class="container" >
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
    <form method ="POST" action="">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Votre Start-up</label>
      <input type="text" name="societe" class="form-control" id="validationDefault01" placeholder="le nom"   required>
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
         je confirme être un Etudiant et veux heberger ce site pour une durée d'une année minimale
      </label>
    </div>
  </div>
  <button class="btn btn-primary" name ="demande" type="submit">Envoyer ma Demande</button>
</form>
      </div>
 

      
  </body>
</html>