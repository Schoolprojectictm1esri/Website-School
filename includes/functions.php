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
/**
 * @author Jelle
 * @description check if email is email.
 * @param type $email
 * @return boolean
 */
function checkEmail($email) {
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
    return true;
  }

  return false;
}


/**
 * @author Jelle
 * @param type $password
 * @param type $errors
 * @return type
 */
function checkPassword($pwd) {

    if (strlen($pwd) < 8) {
        return false;
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
       return false;
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        return false;
    }     

    return true;
}
function activatehash($id){
    return md5(md5($id).md5(rand().md5(date('Y-m-d-HH:mm:ss'))));
}

/* 
 * @author Daniel Bottinga
 * @created 13-12-2012
 * @description Zorgt voor een redirect.
 */
// ########################
function Redirect($location) {
// ########################

  if (ob_get_length() > 0) ob_clean();
  header("Location: ".$location); exit;

}
/**
 * @author Jelle Smeets
 * @description Functie om menu op te halen aan de hand van de rol.
 * @param type $type
 * @return string
 */
function getMenu($role){
    //menu voor rol 2 oftewel beheerder.
    if($role ==2){
        return '                <div class="menuitem">
                    <a class="menulink" href="index.php?page=home">Home</a>
                </div>  
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=agenda">Agenda</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=bekijkenproducten">Kijkshop</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=inzienklantgegevens">Klantgegevens</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=routebeschrijving">Route</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=logout">Uitloggen</a>
                </div>
                ';    
        
    }elseif($role== 1){
        //menu voor rol is 1 oftewel klant.
        return '                <div class="menuitem">
                    <a class="menulink" href="index.php?page=home">Home</a>
                </div>  
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=agenda">Agenda</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=bekijkenproducten">Kijkshop</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=routebeschrijving">Route</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=logout">Uitloggen</a>
                </div>
                ';
        
    }else{
        //menu rol voor anonieme bezoeker. 
        return '                <div class="menuitem">
                    <a class="menulink" href="index.php?page=home">Home</a>
                </div>  
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=aanmeldenklant">Registreren</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=inloggen_bij_agenda">Inloggen</a>
                </div>
                <div class="menuitem">
                    <a class="menulink" href="index.php?page=routebeschrijving">Route</a>
                </div>
                ';
    }
    
}
/**
 * @author Jelle Smeets
 * @description Creer submenu voor pagina.
 * @param type $page
 * @return string
 */
function getSubmenu($role){
    //toon submenu als de ingelogde gebruiker een beheerder is. Voor makkelijkere navigatie.
        //if($page == 'beheer' || $page == 'toevoegen_klant' || $page == 'aanpassenklantgegevens' || $page == 'aanpassenproducten' || $page == 'bevestigen_afspraak' || $page == 'inzienklantgegevens' || $page == 'beherenbestellingen'){
    if($role == 2){
        return '   
                <div class="sidebar">
                    <div class="innersidebar">
                        <a class="submenu" href="index.php?page=toevoegen_klant">Toevoegen Klant</a>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="innersidebar">
                        <a class="submenu" href="index.php?page=inzienklantgegevens">Inzien Klantgegevens</a>
                    </div>

                </div>
                <div class="sidebar">
                    <div class="innersidebar">
                        <a class="submenu" href="index.php?page=beherenbestellingen">Beheren Bestellingen</a>
                    </div>

                </div>
                <div class="sidebar">
                    <div class="innersidebar">
                        <a class="submenu" href="index.php?page=bevestigen_afspraak">Bevestigen Afspraak</a>
                    </div>
                </div>';
        } else{
            return '';
        }
}
?>

