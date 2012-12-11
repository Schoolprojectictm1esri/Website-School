<?php
/**
 * @author Sander
 * @author2 Jelle opgepakt na Sander.
 */
if(checkSpam('registratie_form')){
  echo 'U mag niet meer registreren, u heeft te vaak dit formulier gebruikt.';  
}else{

if(isset($_POST['registreren']))
{ ?> 
<!--Controleert of er op registreer is geklikt-->
<form action="index.php?page=aanmeldenklant" method="POST">
    <div id="aanmeldenklant">
        <table id="aanmeldenklant">
            <tr>
                <td>Email-adres:</td>
                <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" /></td>
            </tr> <!-- Invulveld voor email -->
            <tr>
                <td>Voorletters:</td>
                <td><input type="text" name="voorletters" value="<?php echo $_POST['voorletters']; ?>" /></td>
            </tr> <!-- Invulveld voor voornaam -->
            <tr>
                <td>Achternaam:</td>
                <td><input type="text" name="achternaam" value="<?php echo $_POST['achternaam']; ?>" /></td>
            </tr> <!-- Invulveld voor achternaam -->
            <tr>
                <td>Woonplaats:</td>
                <td><input type="text" name="woonplaats" value="<?php echo $_POST['woonplaats']; ?>" /></td>
            </tr> <!-- Invulveld voor woonplaats -->
            <tr>
                <td>Adres:</td>
                <td><input type="text" name="adres" value="<?php echo $_POST['adres']; ?>" /></td>
            </tr> <!-- Invulveld voor adres -->
            <tr>
                <td>Postcode:</td>
                <td><input type="text" name="postcode" value="<?php echo $_POST['postcode']; ?>" /></td>
            </tr> <!-- Invulveld voor postcode -->
            <tr>
                <td>Telefoonnummer:</td>
                <td><input type="text" name="telefoonnr" value="<?php echo $_POST['telefoonnr']; ?>" /></td>
           </tr> <!-- Invulveld voor telefoonnummer -->
           <tr>
                <td>Wachtwoord:</td>
                <td><input type="password" name="wachtwoord" value="" /></td>
           </tr> <!-- Invulveld voor wachtwoord -->
           <tr>
                <td>Herhaal wachtwoord:</td>
                <td><input type="password" name="herhaalwachtwoord" value="" /></td>
           </tr> <!-- Invulveld voor herhaling wachtwoord -->
           <tr>
                <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
           </tr> <!-- Submitknop voor het versturen van de formulier -->
        </table>
    </div> 
    <!-- Formulier waar de velden ingevuld blijven als er iets fout gaat
        tijdens het invullen zoals leeg veld of niet overeenkomend wachtwoord -->
</form>
<!--Het aanmeld formulier waarbij ingevulde waarden blijven staan-->
<?php
    if ($_POST['wachtwoord'] == $_POST['herhaalwachtwoord'])
    //Controleert of de wachtwoorden overeen komen
        {
		if ($_POST['email']!='' || $_POST['voorletters']!='' || $_POST['achternaam']!=''
                    || $_POST['woonplaats']!='' || $_POST['adres']!=''
                    || $_POST['postcode']!='' || $_POST['telefoonnr']!=''
                    || $_POST['wachtwoord']!=''|| $_POST['herhaalwachtwoord']!='')
                //Controleert of er velden leeg zijn
                    {
        $email = mysql_real_escape_string($_POST['email']);
        $wachtwoord = mysql_real_escape_string($_POST['wachtwoord']);
        $voorletters = mysql_real_escape_string($_POST['voorletters']);
        $achternaam = mysql_real_escape_string($_POST['achternaam']);
        $woonplaats = mysql_real_escape_string($_POST['woonplaats']);
        $adres = mysql_real_escape_string($_POST['adres']);
        $postcode = mysql_real_escape_string($_POST['postcode']);
        $telefoonnr = mysql_real_escape_string($_POST['telefoonnr']);
        $sql="INSERT INTO klanten (email, wachtwoord, voorletters, achternaam, adres, woonplaats, postcode, telefoonnr) 
                VALUES ('.$email.', '.$wachtwoord.', '.$voorletters.', '.$achternaam.', '.$adres.', '.$woonplaats.', '.$postcode.', '.$telefoonnr.')";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        setSpam('registratie_form');
                    }
		else{
			print 'Een verplicht veld is nog niet ingevuld.';
                                setSpam('registratie_form');
                    }
    }
    else{
            print 'Wachtwoorden komen niet overeen.';
                    setSpam('registratie_form');
        }
}
else{
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
<!--Het lege aanmeld formulier-->
<?php }
}?>