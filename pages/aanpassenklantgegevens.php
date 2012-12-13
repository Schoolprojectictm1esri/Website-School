<?php

/* 
    Document   : Aanpassenklantgegevens.php
    Created on : 11-12-2012
    Author     : Daniel
    Description:
        Aanpassen van de klantgegevens.
*/
    if (isset($_GET['klant_id'])) {
        $klant_id = $_GET['klant_id'];


        $stmt = $db->query("SELECT 
                `klant_id`      = '".($_POST['klant_id'])."'
                `voornaam`      = '".($_POST['voornaam'])."'
                `achternaam`    = '".($_POST['achternaam'])."'
                `woonplaats`    = '".($_POST['woonplaats'])."'
                `postcode`      = '".($_POST['postcode'])."'
                `adres`         = '".($_POST['adres'])."'
                `telefoonnr`    = '".($_POST['telefoonnr'])."'
                `emailadres`    = '".($_POST['emailadres'])."'
                FROM `klanten` 
                WHERE `klant_id`= '".(INT)$_POST['klant_id']."'");
        $details = $stmt->fetchAll();
        
        

    
?>    

<?php

    if (!isset($_POST['wijzig'])) {
    
?>      <!-- formulier dat gegevens van de klant weergeeft -->
        <form action="index.php?page=aanpassenklantgegevens" method ="post">

            <table border="0">

                <td>Klant gegevens</td>
                <tr></tr>

                <td>Klant nummer: </td>
                <td> <input type="text" name ="klantnummer" value="<?php echo $details['klant_id']; ?>"</td>
                <td></tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $details['email']; ?>"<td>
                <tr></tr>

                <td>Voornaam:</td>
                <td><input type="text" name="voornaam" value="<?php echo $details['voornaam']; ?>"></td>
                <tr></tr>

                <td>Achternaam:</td>
                <td><input type="text" name="achternaam" value="<?php echo $details['achternaam']; ?>"></td>
                <tr></tr>

                <td>Adres:</td>
                <td><input type="text" name="adres" value="<?php echo $details['adres']; ?>"</td>
                
                       <tr></tr>

                <td>Woonplaats:</td>
                <td><input type="text" name="woonplaats" value="<?php echo $details['woonplaats']; ?>"</td>
                <tr></tr>

                <td>Postcode:</td>
                <td><input type="text" name="postcode" value="<?php echo $details['postcode']; ?>"</td>
                <tr></tr>

                <td>Telnr:</td> 
                <td><input type="text" name="telefoonnr" value="<?php echo $details['telefoonnr']; ?>"</td>



            </table>

            <input type="submit" name="verwijderen" value="Verwijder deze klant">
            <input type="submit" name="wijzig" value="Wijzigingen opslaan">
            <input type="submit" name="annuleren" value="Annuleren">
        </form>

<?php
} 
?>
    

<?php // Wijzigd de gegevens van de klant.
    if (isset($_POST['wijzig'])) {
    

         if   ($_POST['email'] != ""
            || $_POST['voornaam'] != ""
            || $_POST['achternaam'] != ""
            || $_POST['naam'] != ""
            || $_POST['woonplaats'] != ""
            || $_POST['telnr'] != ""
            || $_POST['postcode'] != ""
            || $_POST['adres'] != ""
            || $_POST['huisnummer'] != "")
        ;



        else {
            echo 'Alles moet ingevuld zijn';
        }
        $klant_id   = $_POST['klant_id'];
        $email      = $_POST['email'];
        $voornaam   = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $woonplaats = $_POST['woonplaats'];
        $telefoonnr = $_POST['telefoonnr'];
        $postcode   = $_POST['postcode'];
        $adres      = $_POST['adres'];
        $sql        = ("
                    UPDATE `klanten` 
                    SET 
                    
                    `voornaam`      = '".mysql_real_escape_string($_POST['voornaam'])."'
                    `achternaam`    = '".mysql_real_escape_string($_POST['achternaam'])."'
                    `woonplaats`    = '".mysql_real_escape_string($_POST['woonplaats'])."'
                    `postcode`      = '".mysql_real_escape_string($_POST['postcode'])."'
                    `adres`         = '".mysql_real_escape_string($_POST['adres'])."'
                    `telefoonnr`    = '".mysql_real_escape_string($_POST['telefoonnr'])."'
                    `emailadres`    = '".mysql_real_escape_string($_POST['emailadres'])."'

                    WHERE `klant_id`= '".mysql_real_escape_string($_POST['klant_id'])."'");
        
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
?>

                <!--Formulier dat weergeeft waar de gegevens naar toe gewijzigd zijn. -->
    <form action="index.php?page=aanpassenklantgegevens" method ="post">

        <table>

            <td>Klant gegevens</td>
            <tr></tr>

            <td>Klant nummer: </td>
            <td> <input type="text" name ="klant_id" value="<?php echo $details['klant_id']; ?>"</td>
            <td></tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo $details['email']; ?>"<td>
            <tr></tr>

            <td>Voornaam:</td>
            <td><input type="text" name="voornaam" value="<?php echo $details['voornaam']; ?>"></td>
            <tr></tr>

            <td>Achternaam:</td>
            <td><input type="text" name="achternaam" value="<?php echo $details['achternaam']; ?>"></td>
            <tr></tr>

            <td>Adres:</td>
            <td><input type="text" name="adres" value="<?php echo $details['adres']; ?>"</td>
            <tr></tr>

            <td>Woonplaats:</td>
            <td><input type="text" name="woonplaats" value="<?php echo $details['woonplaats']; ?>"</td>
            <tr></tr>

            <td>Postcode:</td>
            <td><input type="text" name="postcode" value="<?php echo $details['postcode']; ?>"</td>
            <tr></tr>

            <td>Telnr:</td> 
            <td><input type="text" name="telefoonnr" value="<?php echo $details['telefoonnr']; ?>"</td>



        </table>

        <input type="submit" name="verwijderen" value="Verwijder deze klant">
        <input type="submit" name="wijzig" value="Wijzigingen opslaan">
        <input type="submit" name="annuleren" value="Annuleren">
    </form>

<?php
    echo 'Gegevens zijn gewijzigd.';
?>


<?php
                    }
?>

<?php       
}



            // Klant uit database verwijderen
            elseif(isset($_POST['verwijderen'])) 
            {
            $sql = ("
                    DELETE FROM `klanten` WHERE `klant_id`= '".(INT)$_POST['klant_id']."'
                    
                    ");
            $stmt = $db->prepare($sql);
            $stmt->execute();
            echo 'Klantgegevens succesvol verwijderd.';
            }
                Else
                    {       // melding weergeven als er geen klant id is ingevoerd
                    Echo 'Geen klantgegevens ingevoerd.<br><br>';
                    echo "<a href='index.php?page=inzienklantgegevens'>";
                    Echo 'Klik hier';
                    Echo "</a>";
                    
                    }
?>