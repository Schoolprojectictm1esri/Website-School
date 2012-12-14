<?php
/**
 * @author Jelle Smeets
 */
//controleer spam niveau
if(checkSpam('registratie_form')){
  echo 'U mag niet meer registreren, u heeft te vaak dit formulier gebruikt.';  
}else{
    //controleer registratie
    if(isset($_POST['registreren'])){
        //controleer wachtwoorden.
       if ($_POST['wachtwoord'] == $_POST['herhaalwachtwoord']){
           //contreel alles + voorwaarden wachtwoord.
        if(checkPassword($_POST['wachtwoord'])){
            if (checkEmail($_POST['email']) || $_POST['voorletters']!='' || $_POST['achternaam']!=''
                || $_POST['woonplaats']!='' || $_POST['adres']!=''
                || $_POST['postcode']!='' || $_POST['telefoonnr']!=''
                || $_POST['wachtwoord']!=''|| $_POST['herhaalwachtwoord']!=''){
                //controleren email.
                    $email = mysql_real_escape_string($_POST['email']);
                    $checkmail = $db->query('SELECT email FROM Klanten where email = "'.$email.'"');
                    $objemail = $checkmail->fetchObject();
                    if(!empty($objemail)){
                        //kan niet registreren emails is al bekend.
                        echo '<div class="error">Dit email adres is al bekend.</div>';
                    }else{
                        //voeg maar in db.
                        $wachtwoord = hashPassword($_POST['wachtwoord']);
                        $voorletters = mysql_real_escape_string($_POST['voorletters']);
                        $achternaam = mysql_real_escape_string($_POST['achternaam']);
                        $woonplaats = mysql_real_escape_string($_POST['woonplaats']);
                        $adres = mysql_real_escape_string($_POST['adres']);
                        $postcode = mysql_real_escape_string($_POST['postcode']);
                        $telefoonnr = mysql_real_escape_string($_POST['telefoonnr']);
                        //insert de klant.
                        $sql="INSERT INTO klanten (email, registratiedatum, wachtwoord, voorletters, achternaam, adres, woonplaats, postcode, telefoonnr) 
                            VALUES ('$email', '".date('Y-m-d')."', '$wachtwoord', '$voorletters', '$achternaam', '$adres', '$woonplaats', '$postcode', '$telefoonnr')";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        //set mail for activation.
                        $select = $db->query("select * from klanten where email = '$email'");
                        $objid = $select->fetchObject();
                        //maak activatie hash voor klant.
                        $hash = activatehash($objid->klant_id);
                        //maka geldigheids datum van + 2 weken vanaf nu.
                        $geldig = date('Y-m-d',strtotime('+2 weeks'));
                        $hshqry = $db->query("insert into hash (`hash`, `klant_id`, `geldig`, `soort`, `actief`)
                                             VALUES('$hash', '$objid->klant_id', '$geldig', 'activeren', '1')");
                        //stel email op.
                        $subject = 'Bevestigen account Pedicure Praktijk Desiree.';
                        $message = 'Beste '.$objid->voorletters.'&nbsp;'.$objid->achternaam.', /n/n Klik <a href="http://www.pedicurepraktijk.nl/index.php?page=activeer&hash='.$hash.'">hier</a> om uw account te activeren. /n/n Met vriendelijke groeten /n Pedicure praktijk Desiree. ';
                        $headers = 'From: no-reply@pedicurepraktijkdesiree.nl' . "\r\n" .
                            'Reply-To: no-reply@pedicurepraktijkdesiree.nl' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                        //mail het.
                        mail($email, $subject, $message, $headers);
                        setSpam('registratie_form');
                        //stuur door naar activatie link.
                        header('location: index.php?page=activeer'); 
                    }
             }else{
                 //een verplicht veld niet ingevuld.
                echo '<div class="error">Een verplicht veld is nog niet ingevuld.</div>';
             }
        }else{
            //wachtwoord voldoet niet aan de eisen.
            echo '<div class="error">De wachtwoorden voldoen niet aan de eisen.</div>';
        }
       }else{
           //wachtwoorden komen niet overeen.
          echo '<div class="error">Wachtwoorden komen niet overeen.</div>';
          
       }
       //toon formulier met waardes.
       ?>
        <form action="index.php?page=aanmeldenklant" method="POST">
            <div id="aanmeldenklant">
                <table id="aanmeldenklant">
                    <tr>
                        <td>Email-adres:</td>
                        <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Voorletters:</td>
                        <td><input type="text" name="voorletters" value="<?php echo $_POST['voorletters']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Achternaam:</td>
                        <td><input type="text" name="achternaam" value="<?php echo $_POST['achternaam']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Woonplaats:</td>
                        <td><input type="text" name="woonplaats" value="<?php echo $_POST['woonplaats']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Adres:</td>
                        <td><input type="text" name="adres" value="<?php echo $_POST['adres']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td><input type="text" name="postcode" value="<?php echo $_POST['postcode']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer:</td>
                        <td><input type="text" name="telefoonnr" value="<?php echo $_POST['telefoonnr']; ?>" /></td>
                   </tr>
                   <tr>
                        <td>Wachtwoord:</td>
                        <td><input type="password" name="wachtwoord" value="" /></td>
                   </tr>
                   <tr>
                        <td>Herhaal wachtwoord:</td>
                        <td><input type="password" name="herhaalwachtwoord" value="" /></td>
                   </tr>
                   <tr>
                        <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
                   </tr>
                </table>
            </div> 
        </form>
       <?php
    }else{
        //leeg inlogformulier.
       ?>
        <form action="index.php?page=aanmeldenklant" method="POST">
            <div id="aanmeldenklant"><table id="aanmeldenklant">
                    <tr>
                            <td>Email-adres:</td>
                            <td><input type="text" name="email" value="" /></td>
                        </tr>
                        <tr>
                            <td>Voorletters:</td>
                            <td><input type="text" name="voorletters" value="" /></td>
                        </tr>
                        <tr>
                            <td>Achternaam:</td>
                            <td><input type="text" name="achternaam" value="" /></td>
                        </tr>
                        <tr>
                            <td>Woonplaats:</td>
                            <td><input type="text" name="woonplaats" value="" /></td>
                        </tr>
                        <tr>
                            <td>Adres:</td>
                            <td><input type="text" name="adres" value="" /></td>
                        </tr>
                        <tr>
                            <td>Postcode:</td>
                            <td><input type="text" name="postcode" value="" /></td>
                        </tr>
                        <tr>
                            <td>Telefoonnummer:</td>
                            <td><input type="text" name="telefoonnr" value="" /></td>
                        </tr>
                        <tr>
                            <td>Wachtwoord:</td>
                            <td><input type="password" name="wachtwoord" value="" /></td>
                        </tr>
                        <tr>
                            <td>Herhaal wachtwoord:</td>
                            <td><input type="password" name="herhaalwachtwoord" value="" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
                        </tr>
                </table></div>
        </form>
       <?php
    }
}