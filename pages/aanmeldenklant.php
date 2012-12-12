<?php
/**
 * @author Sander
 * @author2 Jelle opgepakt na Sander.
 */
if(checkSpam('registratie_form')){
  echo 'U mag niet meer registreren, u heeft te vaak dit formulier gebruikt.';  
}else{
    /* */
    if(isset($_POST['registreren'])){
       if ($_POST['wachtwoord'] == $_POST['herhaalwachtwoord']){
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
                        echo '<div class="error">Dit email adres is al bekend.</div>';
                    }else{
                        $wachtwoord = hashPassword($_POST['wachtwoord']);
                        $voorletters = mysql_real_escape_string($_POST['voorletters']);
                        $achternaam = mysql_real_escape_string($_POST['achternaam']);
                        $woonplaats = mysql_real_escape_string($_POST['woonplaats']);
                        $adres = mysql_real_escape_string($_POST['adres']);
                        $postcode = mysql_real_escape_string($_POST['postcode']);
                        $telefoonnr = mysql_real_escape_string($_POST['telefoonnr']);
                        $sql="INSERT INTO klanten (email, registratiedatum, wachtwoord, voorletters, achternaam, adres, woonplaats, postcode, telefoonnr) 
                            VALUES ('$email', '".date('Y-m-d')."', '$wachtwoord', '$voorletters', '$achternaam', '$adres', '$woonplaats', '$postcode', '$telefoonnr')";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        setSpam('registratie_form');
                        header('location: index.php?page=inloggen_bij_agenda'); 
                    }
             }else{
                echo '<div class="error">Een verplicht veld is nog niet ingevuld.</div>';
             }
        }else{
            echo '<div class="error">De wachtwoorden voldoen niet aan de eisen.</div>';
        }
       }else{
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