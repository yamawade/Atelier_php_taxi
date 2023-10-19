<?php
    const SERVER = "localhost"; 
    const  USER = "root"; 
    const  MDP = ""; 
    const  NOM_BD= "atelier_php_taxi"; 
    $dns ='mysql:host='.SERVER.';dbname='.NOM_BD.';charset=utf8';
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    try {
        $BD = new PDO($dns, USER,MDP,$option);
    } catch (PDOException $ex) {
        die("erreur de connection ".$ex->getMessage());   
    }
?>
