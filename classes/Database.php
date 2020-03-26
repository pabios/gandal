<?php
 class Database{

    private $name;
    private $login;
    private $pass;
    private $host;
    private $pdo;

    public function __construct($name,$login = 'pabios',$pass ='pabios',$host='localhost'){
        $this->name = $name;
        $this->login = $login;
        $this->pass = $pass;
        $this->host = $host;
        echo 'succes';
    }
    /**
     * permet d'initialiser une seul fois mon objet
     * meme avec plusieur requete faites a ma base de donner
     */
    private function getPdo(){
        if($this->pdo == null){
            $pdo = new PDO('mysql:host=localhost;dbname=pabios;charset=UTF8','pabios','pabios');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
     }
     /**
      * permet d'executer une requete sur une class donner
      *@param statement la requete
      * @param className MA CLASSE
       *@param nb le nombre d'enregistrement que je veut  avec true pour le fetch
      */
     public function maQuery($statement,$className,$nb = false){
         $req = $this->getPdo()->query($statement);
         $req->setFetchMode (PDO::FETCH_CLASS,$className);

         if($nb){
            $data = $req->fetch();
        }else{
            $data = $req->fetchAll();
        }

         return $data;
     }
     /**
      * Permet de executer une requte prepare
      * @param statement la requete
      * @param className MA CLASSE
      * @param nb le nombre d'enregistrement que je veut avec true pour le fetch
      * @param arg les argument de ma requete
      */
     public function maPrepare($statement,$arg,$className,$nb = false){
        $req = $this->getPdo()->prepare($statement);
        $req->execute($arg);
        $req->setfetchMode(PDO::FETCH_CLASS,$className);

        if($nb){
            $data = $req->fetch();
        }else{
            $data = $req->fetchAll();
        }
        return $data;
     }
}
?>