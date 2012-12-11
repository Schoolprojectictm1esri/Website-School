<?php
/**
 * document by Jelle Smeets.
 * Created on 13-11-2012.
 * Version 1.0
 */

/**
 * @author Jelle Smeets
 * @created 16-11-2012
 * @description Creeert een gesalte versie van het wachtwoord.
 * @param type $password
 * @return String
 */
function hashPassword($password){
    //Random Salt
    $salt ='asdfDIAuuDFHhdjadfiiaa';
    //Random Pepper
    $pepper = 'DYYDIAAAJJDUuuiidaaaddj';
    //hash het wachtwoord
    $hashpass = md5($password);
    //maak complete hash van peper en zout.
    $saltedpass = md5(md5($salt).$hashpass.md5($pepper));
    //return het gesalte wachtwoord.
    return $saltedpass;
}

/**
 * @author Jelle Smeets
 * @created 29-11-2012
 * @description Get the Role of the current visitor 0 is anoniem, 1 is klant, 2 is beheerder
 * @return Int with role level.
 */
function getRole(){  
    if(isset($_COOKIE['beheerder_id']) && is_numeric($_COOKIE['beheerder_id'])){
        $_SESSION['beheerder_id'] = $_COOKIE['beheerder_id'];   
        return 2;
    }elseif(isset($_SESSION['beheerder_id'])&& is_numeric($_SESSION['beheerder_id'])){
        return 2;
    }
    
    if(isset($_COOKIE['klanten_id']) && is_numeric($_COOKIE['klanten_id'])){
        $_SESSION['klanten_id'] = $_COOKIE['klanten_id'];   
        return 1;
    }elseif(isset($_SESSION['klanten_id'])&& is_numeric($_SESSION['klanten_id'])){
        return 1;
    }
    
    return 0;
}

/**
 * @author Thomas Vermeulen
 * @created 23-11-2012
 * @description Creeert een hash voor password recovery link
 * @param type $hash
 * @return String
 */
function hashpasswordrecovery($date){
    //toevoegen voornaam
    $hash = md5($date.date().'asdfasdkkdjj');
    //return
    return $hash;
}
/**
 * @author Thomas Vermeulen
 * @created 23-11-2012
 * @description Creeert een hash voor password recovery link
 * @param type $hash
 * @return String
 */
function hashpasswordrecovery2($string){
    //toevoegen voornaam
    $hash = md5($string.'asdfasdkkdjj');
    //return
    return $hash;
}
/*
 * @author Jelle Smeets
 * @created 11-12-2012
 * @description Set spam lvl voor de naam van het formulier.
 * @return -
 */
function setSpam($name){
    if(isset($_SESSION[$name])){
        $_SESSION[$name] ++;
    }else{
        $_SESSION[$name] =1;
    }
}
/*
 * @author Jelle Smeets
 * @created 11-12-2012
 * @description Controleerd spamaantal.
 * @return true of false
 */
function checkSpam($name){
    if(isset($_SESSION[$name])){
        if($_SESSION[$name] >= 3){
            return true;
        }
    }else{
        return false;
    }
}
?>

