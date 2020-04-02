<?php
//require_once './App.php';
class Table{
    protected static $table;
    protected static $getId;


    /**
     * Permet d'executer une requete
     * @param statement la requete
     * @param arg la valeur  ( si la requete est preparer)
     * @param nb le nombre d'enregistrement qu'on veut recuperer (a ameliorer)
     */

    public static function maQuery($statement,$arg = null,$nb = false){
        if($arg){
            return App::getDb()->maPrepare ($statement,[$category_id],get_called_class(),$nb);

        }else{
            return App::getDb()->maQuery ($statement,get_called_class(),$nb);

        }
    }

    /**
     * permet de renvoyer un enregistrement 
     * @param son id
     */
    public static function trouver($id){
        return App::getDb()->maPrepare("
            SELECT *
            FROM ".static::$table."
            WHERE id = ?
            ",[$id],get_called_class(),true);
    }
    /**
     * Permet de renvoyer le nom de la class en cours 
     * facile pour trouver mes tables
     * a Ameliorez pour apres
     */
    private static function getTable(){

        if( static::$table ==null){
            $className = explode('\\',get_called_class());
            static::$table =  strtolower($className);
        }
        return static::$table;
    }
    // bon a changer

    /**
     * Permet de selectionner tout les champs d'une table x
     * avec la methode get_called_class() qui fera reference au pere au moment de l'appel
     */
    public static function tout(){
        return App::getDb()->maQuery("
        SELECT *
        FROM ".static::$table."
        ",get_called_class());
    }
}