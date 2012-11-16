<?php
session_start();
if(isset($_SESSION['beheerder_id']) && $_SESSION['beheerder_id'] != ''){
    echo 'Welkom '.$_SESSION['gebruikersnaam'];
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
