<?php

function   getId(){
    if(isset($_GET['id'])){
        extract($_GET);
        $getId = htmlspecialchars($id);
        $getId = intval($getId);
        return $getId;
    }
}
?>