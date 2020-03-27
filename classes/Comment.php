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

   public static function commentResult(){
    //Post::currentPost()->id
    return App::getDb()->MaQuery("
        SELECT * FROM ".static::$table."
         comment WHERE post_id=".self::getId(),static::$table,false

        );
   }

}
