<?php
session_start();
require_once ('lib/flash.php');
require_once ('./connect.php');
    if(isset($_POST['login'])){
        if(!empty($_POST['tel']) AND !empty($_POST['mdp1']) ){
            $tel = htmlspecialchars($_POST['tel']);
            $mdp1 = htmlspecialchars($_POST['mdp1']);
            $mdp1 = crypt($mdp1,'zifou_De_Guinee');
            $req = $pdo->query("SELECT id,userName,password FROM user WHERE telephone = $tel");
            $verif = $req->fetch();

             if($mdp1 == $verif['password']){
                $flash = 'PAGE PROFILE';
                $typeFlash ='success';
                $_SESSION['id'] = $verif['id'];
                $_SESSION['nom'] = $verif['userName'];

                header('Location:profile.php?id='.$_SESSION['id']);
             }else{
                $flash = 'votre mot de passe ou votre numero est incorect';
                $typeFlash ='danger';
             }

            /* echo '<pre>';
                var_dump($rverif);
            echo'</pre>'; */
            
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>connection</title>
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
            <h1 class="h3 mb-3 font-weight-normal">connection</h1>
             
            <label for="inputEmail" class="sr-only">Numero Telephone</label>
            <input type="tel" name ="tel" id="inputEmail" class="form-control" placeholder="+224.." required autofocus>
           
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name = "mdp1" id="inputPassword" class="form-control" placeholder="mot de passe " required>
        
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> se Souvenir de moi
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Se connecter</button><br/><hr/>
           
        </form>
        <div class="checkbox mb-3">
                <label>
                  ou bien
                </label>
            </div>
            <a href="./sign.php"><button class="btn btn-lg btn-primary btn-block" >S'inscrire</button></a>
            <p class="mt-5 mb-3 text-muted">  </p>
    </div>



  <?php include('_footer.php') ?>
  </body>
</html>
