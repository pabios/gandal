<?php
require_once('Table.php');
class Category extends Table{
   // private $id;
   // protected static $title;

    protected static $table = 'category';


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

       return  $root_url.'Category.php?id='.$this->id;
   }

   /**
    *   Recuperer la category en cour
    */
    public static function currentCategory(){
        return App::getDb()->maQuery("
            SELECT id ,name   FROM ".static::$table."
             WHERE id= ".self::getId(),static::$table,true
        );
    }
    public static function currentCategoryId(){
        return App::getDb()->maQuery("
            SELECT id    FROM ".static::$table."
             WHERE id= ".self::getId(),static::$table,true
        );
    }

    /**
     * Recupere tout les article de la category
     * et recuperer son auteur
     */
    public static function postCategory(){
    return App::getDb()->maPrepare(
            "SELECT p.title,p.published_at, u.userName,p.id,p.category_id,p.content 
             FROM post as p INNER JOIN user as u 
             ON p.author_id = u.id
              WHERE category_id = ?",[self::getId()],static::$table,false
         );
    }
    public static function getTitle(){
        return self::$title;
    }
}

