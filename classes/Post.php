<?php
require_once('Table.php');
class Post extends Table {
    public $mid; // bon a regler plus tard
    private $idByGet;
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
    // bon a changer
    public function getId(){
        $getId = $_GET['id'];
        $this->$getId = htmlspecialchars(intval($getId));
        return $this->$getId();

    }

    public function getUrl(){
         $root_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

        return  $root_url.'post.php?id='.$this->id;
    }

    public function afficherPost($id){
        return App::getDb()->query("SELECT * FROM post WHERE id =$id",__CLASS__);

    }
}


?>