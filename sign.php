<?php
ob_start();
session_start();
require_once ('lib/flash.php');
require_once ('./connect.php');

    if(isset($_POST['sign'])){
        if(!empty($_POST['nom']) AND !empty($_POST['tel']) AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2'])){
             
            $nom = htmlspecialchars($_POST['nom']);
            $tel = intval(htmlspecialchars($_POST['tel']));
            $mdp1 = htmlspecialchars($_POST['mdp1']);
            $mdp2 = htmlspecialchars($_POST['mdp2']);

            $mdp1 = crypt($mdp1,'zifou_De_Guinee');
            $mdp2 = crypt($mdp2,'zifou_De_Guinee');

            $reponses = $pdo->query("SELECT * FROM user WHERE telephone = $tel");
            $nb = $reponses->rowCount();
            if($nb != 0){
                $flash = 'votre numero de telephone est deja utiliser';
                $typeFlash = 'danger';
            }else if($nb == 0){
                    if($mdp1 === $mdp2){

                        $query = sprintf(' INSERT INTO user (userName,password,telephone,town_id,town,email)
                                            VALUES  (%s,%s,%s,1,"africa","metterVotreEmail@gmail.com")', 
                                            $pdo->quote($nom), $pdo->quote($mdp1), $pdo->quote($tel));
                        $result = $pdo->exec($query);
                         
                        
                         $req= $pdo->query("SELECT id FROM user WHERE telephone = $tel");
                            $reponse =$req->fetch();
                            $_SESSION['id'] = $reponse['id'];
                            header('Location:profile.php?id='.$_SESSION['id']);

                    }else{
                        $flash = 'Veuillez saisir le meme mot de passe';
                        $typeFlash ='danger';
                    }
            }
            echo '<pre>';
                var_dump($reponses);
            echo'</pre>';
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>inscription</title>
    <?php include('_head.php') ?>
  </head>
  <body class="text-center">
  <?php include('_header.php') ?>
  
    <div class="container">
    <?php
        if(!empty($flash)){
             add_flash($typeFlash,$flash);
            show_flash();
        }
     ?>
        <form class="form-signin" method="post" >
            <img class="mb-4" src="./assets/images/favicon/android-chrome-192x192.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
            <label for="nom" class="sr-only">Nom </label>
            <input type="text" name ="nom" id="nom" class="form-control" placeholder="Votre nom" required autofocus>
           
            <label for="inputEmail" class="sr-only">Numero Telephone</label>
            <input type="tel" name ="tel" id="inputEmail" class="form-control" placeholder="+224.." required autofocus>
           
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name = "mdp1" id="inputPassword" class="form-control" placeholder="mot de passe " required>
            
            <label for="inputPassword" class="sr-only">confirmer votre Mot de Passe</label>
            <input type="password" name = "mdp2" id="inputPassword" class="form-control" placeholder="retaper votre mot de passe" required>
           
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> se Souvenir de moi
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="sign">Sign in</button>
            <p class="mt-5 mb-3 text-muted">  </p>
        </form>
    </div>



  <?php include('_footer.php') ?>
  </body>
</html>
