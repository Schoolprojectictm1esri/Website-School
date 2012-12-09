<?
/**
 * document by Thomas Vermeulen.
 * Created on 7-12-2012.
 * Version 1.0
 */
?>

<?php
//deze php set uiteindelijk datumafspraak en afspraakid.
// controleer of er een value is
$afspraakid = '';
$datumafspraak = '';
if(isset($_GET['value'])){
    $afspraakid = $_GET['value'];
    $stmt = $db->query("SELECT `datum`,`klant_id`,`id` FROM `afspraken` WHERE `id` = '".$afspraakid."'"); 
    $result = $stmt->fetchObject();
        //controleer of value in db bekent is
        if(!empty($result)){
            $datumafspraak = $result->datum;
            $afspraakid = $result->id;
        }
        else{
            header('location: index.php');
        }
}
else {
    header('location: index.php');
}

//kijkt of ingelogd is
if(isset($_COOKIE['klanten_id']) && $_COOKIE['klanten_id'] != '' && is_numeric($_COOKIE['klanten_id'])){
    $_SESSION['klanten_id'] = $_COOKIE['klanten_id'];
    //query uitvoeren
    $stmt = $db->query("SELECT `bevestigd` FROM `afspraken` JOIN `klanten` ON `klant_id` = `klant_id` WHERE `id` = '".$_GET['value']."'");
    $result = $stmt->fetchObject();
    $bevestigd = $result->bevestigd;
    $voornaam = $result->voornaam;
    $achternaam = $result->achternaam;
    $datum = $result->datum;
    //check query
    if($bevestigd == TRUE){
        
    }
    else {
        //formulier voor accepteren/afwijzen
?>
        <form action="index.php?page=bevestigen_afsrpaak" method="POST">
            <table>
                <tr>
                    <th>Afspraak gegevens:</th>
                </tr>
                <tr>
                    <td>Naam: .$voornaam. .$achternaam. </td>
                </tr>
                <tr>
                    <td>Datum: .$datum.</td>
                </tr>
                <tr>
                    <td><input type="submit1" name="accepterenafspraak" value="accepteren" /></td>
                    <td><input type="submit2" name="afwijzenafspraak" value="afwijzen" /></td>
                </tr>
                <tr>
                    <td><a href='agenda.php'>Annuleren</a></td>
                </tr>
            </table>
        </form>
<?php
        //bevestigen afspraak (in db zetten)
        if(isset($_POST['submit1'])){
            $sql= $db->query("INSERT INTO `afspraken` (`id`) VALUES (`TRUE`)");
            $stmt = $db->prepare($sql);
            $stmt->execute(); 
            //automatische mail voor bevestiging
                //email naar klant na bevestiging
                $to = $_POST['emailadres'];
                $subject = "Bevestiging afspraak:.$datum.";
                $from = "noreply@pedicurepraktijkdesiree.nl";
                $message = "
                    <html>
                        <head>
                            <title>Bevestiging afspraak</title>
                        </head>
                    <body>
                        <table>
                            <tr>
                                <th>Beste,<th>
                            </tr>
                            <tr>
                                <td>Bij deze wil ik u meedelen dat de afspraak gemaakt voor</td>
                            </tr>
                            <tr>
                                <td>.$datum.</td>
                            </tr>
                            <tr>
                                <td>is bevestigd.</td>
                            </tr>
                            <tr>
                                <td>Met vriendelijke groet PedicurePraktijk Desiree.
                            </tr>
                        </table>
                    </body>
                    </html>
                    ";
        }
        //afwijzing afspraak (in db zetten)
        elseif(isset($_POST['submit2'])){
            $sql= $db->query("INSERT INTO `afspraken` (`id`) VALUES (`FALSE`)");
            $stmt = $db->prepare($sql);
            $stmt->execute();  
            //automatische mail voor afwijzing afspraak
                $to = $_POST['emailadres'];
                $subject = "Annulering afspraak:.$datum.";
                $from = "noreply@pedicurepraktijkdesiree.nl";
                $message = "
                    <html>
                        <head>
                            <title>Annulering afspraak</title>
                        </head>
                    <body>
                        <table>
                            <tr>
                                <th>Beste,<th>
                            </tr>
                            <tr>
                                <td>Bij deze moet ik u helaas meedelen dat de afspraak gemaakt voor</td>
                            </tr>
                            <tr>
                                <td>.$datum.</td>
                            </tr>
                            <tr>
                                <td>is geannuleerd.</td>
                            </tr>
                            <tr>
                                <td>Met vriendelijke groet PedicurePraktijk Desiree.
                            </tr>
                        </table>
                    </body>
                    </html>
                    ";
        }
    }
}
else {
    //standaard formulier nog voor bevestigen
    header('location: inloggen_bij_agenda');
}
?>


<!-- 
<?php
/*

<?php
//formulier voor accepteren/afwijzen
?>
<form action="index.php?page=bevestigen_afsrpaak" method="POST">
    <table>
        <tr>
            <th>Afspraak gegevens:</th>
        </tr>
        <tr>
            <td>Afspraak: .$afspraakid. </td>
        </tr>
        <tr>
            <td>Datum: .$datum. </td>
        </tr>
        <tr>
            <td><input type="submit" name="accepterenafspraak" value="accepteren" /></td>
            <td><input type="submit" name="afwijzenafspraak" value="afwijzen" /></td>
        </tr>
        <tr>
            <td><a href='agenda.php'>Annuleren</a></td>
        </tr>
    </table>
</form>


<?php
//formulier voor verwijderenafspraak
?>
<form action="index.php?page=bevestigen_afsrpaak" method="POST">
    <table>
        <tr>
            <th>Afspraak gegevens:</th>
        </tr>
        <tr>
            <td>Afspraak: .$afspraakid. </td>
        </tr>
        <tr>
            <td>Datum: .$datum. </td>
        </tr>
        <tr>
            <td><input type="submit" name="accepterenafspraak" value="accepteren" /></td>
            <td><input type="submit" name="afwijzenafspraak" value="afwijzen" /></td>
        </tr>
        <tr>
            <td><a href='agenda.php'>Annuleren</a></td>
        </tr>
    </table>
</form>
<?php
 * 
 */

?>
