<?php
    $language =array('fr','en');
    
    if(!empty($_GET['lang']) && in_array($_GET['lang'],$language)){
        $_SESSION['local'] = $_GET['lang'];
    }else{
        if(empty($_SESSION['local'])){
            $_SESSION['local'] = $language[0];
        }
    }

    