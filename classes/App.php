<?php
//require_once ('./Database.php');
class App{

    const DBNAME = 'pabios';
    const LOGIN = 'pabios';
    const PASS = 'pabios';
    const HOST = 'localhost';
    private static $title = 'Pabiosoft';

    private static $database;
    /**
     * se connecter a  la base de donner
     */
    public static function getDb(){
        if(self::$database == null){
            self::$database = new Database(self::DBNAME,self::LOGIN,self::PASS,self::HOST);
           // echo ' bonjour ismail connection succes';
        }

        return self::$database;
    }
    public static function tuerObjet(){
    }
    /**
     * bon pour les hackers
     *
     */
     public static function notFound($page){
        header("HTTP/1.0 404 Not Found");
        $root_url = 'http://'.$_SERVER['HTTP_HOST'].'/';
        return  $root_url.$page.'.php';
     }

     /**
      * Accesseur
      *pour le titre de m'a page
      */
      public static function getTitle(){
          return self::$title;
      }
      /**
       * Mutateur Permet de modifier mon titre
       */
      public static function setTitle($title){
          self::$title = $title;
      }

     /*
    * type (string): primary, secondary, success, danger, warning, info, light, dark
    * message (string):
     */
   public static function add_flash($type, $message)
    {
        if (!isset($_SESSION['flash'][$type])) {
            $_SESSION['flash'][$type] = array();
        }

        $_SESSION['flash'][$type][] = $message;
    }
    /**
     * affichage le message
     */
   public static function show_flash()
    {
        if (isset($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $type => $messages) {
                foreach ($messages as $message) {
                    echo sprintf('<div class="alert alert-%s" role="alert">%s</div>', $type, $message);
                }
            }
            unset($_SESSION['flash']);
        }
    }









}

