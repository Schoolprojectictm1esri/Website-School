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
                    <a class="menulink" href="index.php?page=bestel">Winkelwagen</a>
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
                </div>
                <div class="sidebar">
                    <div class="innersidebar">
                        <a class="submenu" href="index.php?page=aanpassenproducten">Aanpassen producten</a>
                    </div>
                </div>
                ';
        } else{
            return '';
        }
}
/**
 * @author Jelle
 * @description Functie om te bepalen of een datum in de vakantie ligt.
 * @param type $date
 * @return boolean
 */
function invakantie($date){
    //laad globale variabele $db in om gebruik van te kunnen maken.
    global $db;
    //zet datum om naar goede vorm voor db.
    $date = date('Y-m-d', strtotime($date)); 
    $vandaag = date('Y-m-d');
    $vakanties = $db->prepare('SELECT * FROM vakantie');
    $vakanties->bindParam(':vandaag', $vandaag);
    $vakanties->execute();
    $vakantiesresult = $vakanties->fetchAll();
    foreach($vakantiesresult as $key => $val){
        if($date >= $val['start'] && $date <= $val['end']){
            return true;
        }
    }
    //als er nog niks gereturnd is is er geen match met een vakantie. 
    return false;
}
/**
 * @author Jelle
 * @description Functie om de tijd te controleren in de database voor afspraken.
 * @param type $tijd
 * @param type $datum
 * @return boolean
 */
function checktijd($tijd, $datum){
    //gebruik globale database.
    global $db;
    //haal alle afspraken op deze dag op.
    $date = date('Y-m-d', strtotime($datum)); 
    $dbdate = $date.'%';
    $stmt = $db->prepare("SELECT * from afspraken where datum LIKE :dbdate order by datum ASC");
    $stmt->bindParam(':dbdate', $dbdate);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //controleer of er resultaten zijn.
    if($result != false){
        //loop door resultaten heen.
        foreach($result as $key => $val){
            //is de startdatum gelijk aan start van afspraakdatum.
            if($tijd == date('G:i',strtotime($val['datum']))){
                return true;
            }
            //loopt de afspraak dodate('G:i',strtotime($val['datum'])or tijdens deze tijd.
            $stmt = $db->prepare("SELECT SUM(lengte) as totaallengte FROM behandelingen WHERE id in(
                                        SELECT behandeling_id 
                                        FROM afspraakbehandelingen
                                        WHERE afspraak_id IN(
                                            SELECT id 
                                            FROM afspraken
                                            WHERE datum LIKE :date
                                        )
                                )");
            $stmt->bindParam(':date', $dbdate);
            $stmt->execute();
            $valres = $stmt->fetchObject();
            if($valres != false){
                //lelijke manier om einddatum te berekenen.
                $start = date('G:i',strtotime($val['datum']));
                //schoonmaakperiode duurt 15 min.
                $schoonmaakperiode = 15;
                //voeg alles samen om toe te kunnen voegen aan string to time.
                $dbduur = '+'.$valres->totaallengte+$schoonmaakperiode.' minutes';
                $eind = date('G:i', strtotime($dbduur, strtotime($val['datum']))); 
                //als tijd in deze periode valt kan er niet geboekt worden.
                if(strtotime($start) <= strtotime($tijd) && strtotime($eind) >= strtotime($tijd)){
                    return true;
                }
                //vergelijk nu om te bepalen of de huidige tijd in de behandeling valt.
            }
            
        }
    }else{
        //als er geen afspraken op deze dag zijn return false.
        return false;   
    }
}
/**
 * @author Jelle Smeets
 * @description Functie om ophalen behandelingen makkelijker te maken.
 * @global type $db
 * @return type
 */
function getbehandelingen(){
    global $db;
    $stmt = $db->query('select * from behandelingen where actief = 1');
    $result = $stmt->fetchAll();
    return $result;
}
/**
 * @author Jelle Smeets
 * @description Functie om behandelingen die geinsert worden te controleren.
 * @param type $tijd
 * @param type $datum
 * @param type $behandelingen array
 */
function checkinsertbehandelingen($tijd, $datum, $behandelingen){
    //gebruik globale database.
    global $db;
    //haal alle afspraken op deze dag op.
    $date = date('Y-m-d', strtotime($datum)); 
    $dbdate = $date.'%';
    $stmt = $db->prepare("SELECT * from afspraken where datum LIKE :dbdate order by datum ASC");
    $stmt->bindParam(':dbdate', $dbdate);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //controleer of er resultaten zijn.
    if($result != false){
        //loop door resultaten heen.
        foreach($result as $key => $val){
            //is de startdatum gelijk aan start van afspraakdatum.
            if($tijd == date('G:i',strtotime($val['datum']))){
                return true;
            }
            //als er twee behandelingen zijn. gebruik dan 2 lengtes.
            if(isset($behandelingen['behandeling2'])){
                $stmt1 = $db->prepare("SELECT SUM(lengte) as totaallengte FROM behandelingen WHERE id in(:behandeling1, :behandeling2)");
                $stmt1->bindParam(':behandeling1', $behandelingen['behandeling1']);
                $stmt1->bindParam(':behandeling2', $behandelingen['behandeling2']);
                $stmt1->execute();
                //haal totale lengte van behandelingen op en werk daarmee verder.
                $valres = $stmt1->fetchObject();
                
            }else{    
                //anders gebruik 1 lengte
                $stmt2 = $db->prepare("SELECT SUM(lengte) as totaallengte FROM behandelingen WHERE id in(:behandeling1)");
                $stmt2->bindParam(':behandeling1', $behandelingen['behandeling1']);
                $stmt2->execute();
                //haal totale lengte van behandelingen op en werk daarmee verder.
                $valres = $stmt2->fetchObject();
            }
            
            
            if($valres != false){
                //lelijke manier om einddatum te berekenen.
                $start = date('G:i',strtotime($val['datum']));
                //schoonmaakperiode duurt 15 min.
                $schoonmaakperiode = 15;
                //voeg alles samen om toe te kunnen voegen aan string to time.
                $dbduur = '+'.$valres->totaallengte+$schoonmaakperiode.' minutes';
                $eind = date('G:i', strtotime($dbduur, strtotime($val['datum']))); 
                //als tijd in deze periode valt kan er niet geboekt worden.
                if($start <= $tijd && $eind > $tijd){
                    return true;
                }elseif($start >= $tijd && $eind >= $tijd){
                    return true;
                }
                //vergelijk nu om te bepalen of de huidige tijd in de behandeling valt.
            }
            
        } 
    }
    
    //als er nog niks gevonden is mag het gebeuren
    return false;
}
/**
 * @author Jelle Smeets
 * @description Functie om winkelwagen te controleren.
 * @return boolean
 */
function check_wagentje(){
    if(isset($_SESSION['winkelwagen'])){
        return true;
    }else{
        return false;
    }
}
/**
 * @author Jelle Smeets
 * @description Functie om producten en aantallen toe te voegen in het winkelwagentje.
 * @param type $id
 * @param type $aantal
 */
function voeg_toe_winkelwagen($id, $aantal){
    //controleer winkelwagen.
    if(check_wagentje()){
        //als bestaat voeg toe.
        $counter = count($_SESSION['winkelwagen']);
        //Controleer of het product al in de winkelwagen zit.
        foreach($_SESSION['winkelwagen'] as $key => $val){
            if($val['id'] == $id){
                //update het winkelwagentje naar het nieuwe aantal.
                 $_SESSION['winkelwagen'][$key]['aantal'] = $aantal;  
            }
        }
        $_SESSION['winkelwagen'][$counter]['id'] = $id;
        $_SESSION['winkelwagen'][$counter]['aantal'] = $aantal;      
    }else{
        //creeer nieuwe winkelwagen.
        $_SESSION['winkelwagen'][0]['id'] = $id;
        $_SESSION['winkelwagen'][0]['aantal'] = $aantal;
    }
}
function leeg_wagentje(){
    if(check_wagentje()){
      unset($_SESSION['winkelwagen']);
    }
    
}
?>

