<?php
require_once('Table.php');
class Comment extends Table{

    protected static $table = 'comment';


    public static function getId(){
        $getId = 1;
        if(isset($_GET['id'])){
             $getId = $_GET['id'];
            $getId = htmlspecialchars(intval($getId));
        }else{
           // echo 'patience je securise revien after';

        }
        return   $getId;

    } 
    public function getUrl(){
        $root_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

       return  $root_url.'comment.php?id='.$this->id;
   }

/**
 * Permet d'afficher les 5 dernier commentaire d'un article
 */
  public static function commentResult(){
       return App::getDb()->maPrepare("
       SELECT * FROM comment WHERE post_id = ? ORDER BY id desc LIMIT 5",[self::getId()],static::$table,false

       );
   } 
    
   /**
    * traitement du formulaire 
    */
   public static function insertComment(){
        if(isset($_POST['envoyer'])){
            if (isset($_POST['nom']) && isset($_POST['commentaire'])) {
                App::add_flash('success', 'Merci pour votre commentaire');
                App::show_flash();
                extract($_POST);
                $nom = htmlspecialchars($nom);
                $commentaire = htmlspecialchars($commentaire);
                //$nom =App::getDb()->quote($nom); :) $pdo->quote($nom)
                // requête d'ajout du commentaire :
                $query ="
                INSERT INTO comment (post_id, name, comment, published_at)
                VALUES (?, ?, ?, NOW())";
                 return App::getDb()->insert(
                    $query,self::getId(),$nom,$commentaire,static::$table
                );
            }
        }
   }
   /**
     * Permet de faire une redirection 
     */
    public static function redirect(){
        $root_url = 'http://'.$_SERVER['HTTP_HOST'].'/';
        return header('Location:'.$root_url.'post.php?id='.self::getId());
   }







}
