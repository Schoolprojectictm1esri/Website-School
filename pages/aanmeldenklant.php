<?php
if(isset($_POST['registreren']))
{ ?>
<form action="index.php?page=aanmeldenklant" method="POST">
        <table border="0">
            <tr>
                    <td>Email-adres:</td>
                    <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" /></td>
                </tr>
                <tr>
                    <td>Voornaam:</td>
                    <td><input type="text" name="voornaam" value="<?php echo $_POST['voornaam']; ?>" /></td>
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
                    <td><input type="text" name="telefoonnummer" value="<?php echo $_POST['telefoonnummer']; ?>" /></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="password" name="wachtwoord" value="" /></td>
                </tr>
                <tr>
                    <td>Herhaal wachtwoord</td>
                    <td><input type="password" name="herhaalwachtwoord" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
                </tr>
        </table>
</form>
<?php
    if($_POST['email']!='' || $_POST['voornaam']!='' || $_POST['achternaam']!=''
        || $_POST['woonplaats']!='' || $_POST['adres']!=''
        || $_POST['postcode']!='' || $_POST['telefoonnummer']!=''
        || $_POST['wachtwoord']!=''|| $_POST['herhaalwachtwoord']!='')
    {
		if ($_POST['wachtwoord'] == $_POST['herhaalwachtwoord'])
		{
        $email = $_POST['email'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $woonplaats = $_POST['woonplaats'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $telefoonnr = $_POST['telefoonnummer'];
        $sql="insert into klanten (email, wachtwoord, /*registratiedatum*/, voornaam, achternaam, adres, woonplaats, postcode, telefoonnr) 
                values ('$email', '$voornaam', '$achternaam', '$woonplaats', '$adres', '$postcode', '$telefoonnr');";
        $sth = $db->prepare($sql);
        $success = $sth->execute();
        }
		else{
			print 'Wachtwoorden komen niet overeen';
			}
    }
    else{
       print 'Een veld is nog niet ingevuld';
        }
}
else{
?>
<form action="index.php?page=aanmeldenklant" method="POST">
        <table border="0">
            <tr>
                    <td>Email-adres:</td>
                    <td><input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Voornaam:</td>
                    <td><input type="text" name="voornaam" value="" /></td>
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
                    <td><input type="text" name="telefoonnummer" value="" /></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="password" name="wachtwoord" value="" /></td>
                </tr>
                <tr>
                    <td>Herhaal wachtwoord</td>
                    <td><input type="password" name="herhaalwachtwoord" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
                </tr>
        </table>
</form>
<?php } ?>