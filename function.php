<?php

function   getId(){
    if(isset($_GET['id'])){
        extract($_GET);
        $getId = htmlspecialchars($id);
        $getId = intval($getId);
        return $getId;
    }
}


function affichemots($texte,$mots)   
{   
   $StringTab=explode(" ",$texte);   
   for($i=0;$i<$mots;$i++)   
   {   
      $NewString.=" "."$StringTab[$i]";   
   } 
// ajoute 3 points de suspension a la fin
$NewString.=" ...";
   return $NewString;   
} 

?>