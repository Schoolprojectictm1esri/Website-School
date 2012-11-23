<html>
Aanpassen klant gegevens.
<link rel="stylesheet" type="text/css" href="danielstyle.css" />

<head><title></title></head>
<body>
    <form method ="GET">
        <table border="1">
            <!-- w = wijzig -->
            <td>Verwijderen</td><td colspan="3">Klant gegevens:</td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Email:</td><td>actuele info hier</td>
            <td><input type="text" name="wEmail" value="$email"></td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Voornaam:</td><td>actuele info hier</td>
            <td><input type="text" name="wVoornaam" value="$voornaam"></td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Achternaam:</td><td>actuele info hier</td>
            <td><input type="text" name="wAchternaam" value="$achternaam"></td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Adres:</td><td>actuele info hier</td>
            <td><input type="text" name="wAdres" value="$adres"></td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Woonplaats:</td><td>actuele info hier</td>
            <td><input type="text" name="wWoonplaats" value="$woonplaats"></td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Postcode:</td><td>actuele info hier</td>
            <td><input type="text" name="wPostcode" value="$postcode"></td>
            <tr></tr>
            <td><input type="checkbox" name="DELETE" value="Verwijderen"></td>
            <td>Telnr:</td><td>actuele info hier</td>
            <td><input type="text" name="wTelnr" value="$telnr"></td>
            
            
            
        </table>
        <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
        <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
        <input type="submit" name="annuleren" value="Annuleren">
        
    
</body>


</html>   
<?php /*
// Querry Ophalen

$klantgegevens = $db->query(SELECT * FROM Klanten WHERE registratiedatum IS NOT NULL);
    
/*$email = $db->query()
$voornaam = $db->query()
$achternaam = $db->query()
$adres = $db->query()
$woonplaats = $db->query()
$postcode = $db->query()
$telnr = $db->query() */

// Querry Wijzigen
/*
if($_GET['update']=="y")
$email = $db->query(UPDATE klanten SET email="" WHERE $ID="")
$voornaam = $db->query(UPDATE klanten SET voornaam="" WHERE $ID="")
$achternaam = $db->query(UPDATE klanten SET $achternaam="" WHERE $ID="")
$adres = $db->query(UPDATE klanten SET adres="" WHERE $ID="")
$woonplaats = $db->query(UPDATE klanten SET woonplaats="" WHERE $ID="")
$postcode = $db->query(UPDATE klanten SET postcode="" WHERE $ID="")
$telnr = $db->query(UPDATE klanten SET telnr="" WHERE $ID="")

// Queryy Verwijderen
 //D = DELETE       
    /*
if($_GET['remove']=="y")
        $Demail = $db->query(DELETE email FROM klanten WHERE e-mail ="$email")

        $Dvoornaam = $db->query(DELETE voornaam FROM klanten WHERE voornaam ="$voornaam")

        $Dwachternaam = $db->query(DELETE achternaam FROM klanten WHERE achternaam ="$achternaam")

        $Dadres = $db->query(DELETE adres FROM klanten WHERE adres ="$adres")

        $Dwoonplaats = $db->query(DELETE woonplaats FROM klanten WHERE woonplaats ="$woonplaats")

        $Dpostcode = $db->query(DELETE postcode FROM klanten WHERE postcode ="$postcode")

        $Dtelnr = $db->query(DELETE telnr FROM klanten WHERE telnr ="$postcode") */
?>