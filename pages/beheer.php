<?php
/**
 * @author Jelle
 */
// als er gebruik gemaakt wordt van cookies is de gebruikersnaam niet geset. Deze even controleren om netjes de naam te tonen bij inloggen.
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
?>
