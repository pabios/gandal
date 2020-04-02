<?php
require_once('Table.php');
/**
 * Class a finir pour la gestion d'administritaeur
 */
class User extends Table{

    protected static $table = 'user';


    
/**
 * jointure entre la table commentaire et la table User
 */
public static function commentUsers(){
    $commentUsers =$pdo->prepare('  ');
    return App::getDb()->maPrepare("
    SELECT u.userName,c.id FROM comment as c 
    INNER JOIN user as u ON c.author_id = u.id 
    WHERE c.id =?",[self::getId()],static::table,false
    

    );
}

}
?>