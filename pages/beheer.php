<?php
session_start();
//even lelijke oplossing voor het cookie probleem
if(isset($_COOKIE['beheerder_id']) && $_COOKIE['beheerder_id'] != '' && is_numeric($_COOKIE['beheerder_id']) && !isset($_SESSION['beheerder_id'])){
    $_SESSION['beheerder_id'] = $_COOKIE['beheerder_id'];
}
if(isset($_SESSION['beheerder_id']) && $_SESSION['beheerder_id'] != ''){
    if(!isset($_SESSION['gebruikersnaam'])){
        $stmt = $db->query('select * from beheerder where beheerder_id = "'.$_SESSION['beheerder_id'].'"');
        $result = $stmt->fetchObject();
        if(!empty($result)){
            $gebruikersnaam = $result->gebruikersnaam;
        }else{
            $gebruikersnaam = 'Onbekende beheerder.';
        }
    }else{
        $gebruikersnaam = $_SESSION['gebruikersnaam'];
    }
    echo 'Welkom '.$gebruikersnaam;
    echo '<br />';
    echo '<a href="index.php?page=logout">Log uit</a>';
}else{
    echo 'Log alstublieft in.';
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
