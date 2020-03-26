<?php
require_once('Table.php');
class Category extends Table{

    protected static $table = 'category';

    public function getUrl(){
        $root_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

       return  $root_url.'Category.php?id='.$this->id;
   }

}

