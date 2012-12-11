/* 
    Document   : Danielstyle
    Created on : 13-nov-2012, 20:43:32
    Author     : Daniel
    Description:
        Purpose of this page follows.
*/
<?php
if (isset($_GET['klant_id'])) {
$klant_id = $_GET['klant_id'];


$stmt = $db->query("SELECT klant_id, email, voornaam, achternaam, adres, woonplaats, postcode, telefoonnr FROM klanten WHERE klant_id = '$klant_id' ");
$result = $stmt->fetchAll();


foreach ($result as $details)


    
?>    

<?php

if (!isset($_POST['wijzig'])) {
    
?>
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
        <input type="text" name="huisnummer" value="<?php //echo $details['huisnummer']; ?>"
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
    

<?php
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
            echo 'Alles moet correct ingevuld zijn';
        }
        $klant_id   = $_POST['klant_id'];
        $email      = $_POST['email'];
        $voornaam   = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $woonplaats = $_POST['woonplaats'];
        $telefoonnr = $_POST['telefoonnr'];
        $postcode   = $_POST['postcode'];
        $adres      = $_POST['adres'];
        $huisnummer = $_POST['huisnummer'];
        $sql        = ("
                    UPDATE `klanten` 
                    SET 
                    `email`      = '$email', 
                    `voornaam`   = '$voornaam', 
                    `achternaam` = '$achternaam', 
                    `woonplaats` = '$woonplaats', 
                    `telefoonnr` = '$telefoonnr', 
                    `adres`      = '$adres'

                    where klant_id = '$klant_id'");
        //print_r ($sql);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        //print_r ($stmt);
?>


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
            <input type="text" name="huisnummer" value="<?php// echo $details['huisnummer']; ?>"
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
        if (isset($_POST['verwijderen'])) {
            $sql = ("DELETE FROM `klanten` 
                    Where 
                    `klant_id`	= '$klant_id';
                    ");
            $stmt = $db->prepare($sql);
            $stmt->execute();
}
echo 'Klantgegevens succesvol verwijderd.';
?>


<?php
} 
Else
{
    Echo 'Geen klantgegevens ingevoerd.<br><br>';
    echo "<a href='index.php?page=klantgegevens'>";
    Echo 'Klik hier';
    Echo "</a>";
}
?>