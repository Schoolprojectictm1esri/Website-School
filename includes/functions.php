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

function hashpasswordrecovery($id){
    //toevoegen voornaam
    $hash = md5($id.date().'asdfasdkkdjj');
    //return
    return $hash;
}
?>
