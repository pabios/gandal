<?php
require_once('Table.php');
class Post extends Table {
    public $id; // bon a regler plus tard
    private $date;
    protected static $table = 'post';

    public function lastByCategory($category_id){
        //du coup facile on remplace App::getDb()->prepare par notre maPrepare()
       /*  return App::getDb()->MaQuery("
            SELECT *
            FROM ".static::$table // faut
             ); */
    }
    public function getDate($id){
        return App::getDb()->maPrepare("
            SELECT *
            FROM ".static::$table."
            WHERE id = ?
            ",[$id],get_called_class(),true);
    }
    /***
     * Permet de retourner les dernier articles
     * en utilant la methode maQuery
     */
    public static function getLast(){
        return self::maQuery('
            SELECT *
            FROM post as p
            LEFT JOIN category as c
                ON p.category_id = c.id
            ');
    }

    public static function getUrl(){
         $root_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

        return  $root_url.'post.php?id='.self::a_id;
    }

    public static function afficherPost($id){
        return App::getDb()->maQuery("SELECT * FROM post WHERE id =$id",__CLASS__);

    }
    /**
     * Jointure entre Post Category et Menu 
     * utiliser sur la page index.php
     */
    public static function  postCategoryMenu(){
          return App::getDb()->maQuery(
                 "SELECT  COUNT(p.id) as nb ,c.id,c.name 
                  FROM category as c INNER JOIN ".static::$table." as p ON c.id = p.category_id  GROUP BY c.id ",get_called_class()
                );

    }
    public static function getId(){
        $getId = 0;
        if(isset($_GET['id'])){
             $getId = $_GET['id'];
            $getId = htmlspecialchars(intval($getId));
            $req =  App::getDb()->maQuery(
                "SELECT EXISTS (SELECT * FROM ".static::$table." WHERE id =".$getId." ) ",static::$table,false
               );
               if($req == false){
                die();
               }else{
                
                    $getId =  $_GET['id'];

               }
        }else if(isset($_POST['id'])){
            $getId = $_POST['id'];
            $getId = htmlspecialchars(intval($getId));
        }
        return   $getId;

    }
    /**
     *
     */
    public static function currentPost(){
        
        return App::getDb()->maQuery(
            "SELECT *
             FROM ".static::$table."
             WHERE post.id = ".self::getId(),static::$table,true
        );
    }
    /**
     * a finir
     */
    public static function myQuote(){
        return App::getDb()->quote($_GET['id']);
    }
     
    /**
     * utiliser dans page post.php
     */
    public static function currentCategory(){
            //self::currentPost()->id
         return App::getDb()->maQuery(
            "SELECT c.name,c.id FROM ".static::$table."
            as p INNER JOIN category as c ON c.id = p.category_id  WHERE p.id =".self::getId(),static::$table,true
        );
    }

    /**
     * Utilser dans la page post.php
     */
    public static function postUser(){
        //currentPost()->id
        return App::getDb()->maQuery(
            "SELECT p.title,p.content,p.published_at, u.userName,p.id,p.category_id FROM ".static::$table."
            as p INNER JOIN user as u ON p.author_id = u.id  WHERE p.id=".self::getId(),static::$table,true
        );
    }










}


?>