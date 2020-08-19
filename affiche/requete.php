<?php
    require_once ('../connect.php');
   // $clouds = $pdo->query('SELECT distinct  * FROM cloud'); 
 
if(isset($_POST['envoyer'])){
    if (isset($_POST['nom']) && isset($_POST['tel'])  && isset($_POST['pact']) && isset($_POST['message'])  ) {
          
        extract($_POST);
        $nom = htmlspecialchars($nom);
        $tel = htmlspecialchars($tel);
        $pact = htmlspecialchars($pact);
        $message = htmlspecialchars($message);

        $nom = 'le nom :'.$nom;
        $tel = 'le telephone :'.$tel;
        $pact = 'le pacte :'.$pact;
        $message = 'le message :'.$message;
         
        $query ="
        INSERT INTO cloud (nomDomaine,extension,societe,email,author_id)
        VALUES (?, ?, ?, ?, ?)";
        $req = $pdo->prepare($query);
        $req->execute(array($nom,$pact,$message,$tel,25));
        
          echo ' successss';
    }
}
 

?>