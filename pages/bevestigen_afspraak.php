<?
/**
 * document by Thomas Vermeulen.
 * Created on 7-12-2012.
 * Version 1.0
 */
?>

<?php
//deze php set uiteindelijk datumafspraak en afspraakid.
//controleer of er een value is
if(isset($_GET['id'])){
    $afspraakid = $_GET['id'];
    $stmt = $db->query("SELECT `datum`, `klant_id`, `id`, `bevestigd` FROM `afspraken` WHERE `id` = '".$afspraakid."'"); 
    $result1 = $stmt->fetchObject();
        //controleer of value in db bekent is
        if(!empty($result1)){

        }
        else{
             header('location: index.php');
        }
}
else {
    header('location: index.php');
}

//kijkt of ingelogd is
if(isset($_COOKIE['beheerder_id']) && $_COOKIE['beheerder_id'] != '' && is_numeric($_COOKIE['beheerder_id'])){
    $_SESSION['beheerder_id'] = $_COOKIE['beheerder_id'];
    //query uitvoeren
    $stmt = $db->query("SELECT `voorletters`,`achternaam`,`email` FROM `klanten` WHERE `klant_id` = '".$result1->klant_id."'");
    $result2 = $stmt->fetchObject();
    if(!empty($result2)){
    }
    //check query
    if($result1->bevestigd == TRUE){
?>
        <form action="index.php?page=bevestigen_afspraak" method="POST">
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
                    <td><input type="submit" name="annuleren" value="Annuleren" /></td>
                </tr>
                <tr>
                    <td><a href='agenda.php'>Annuleren</a></td>
                </tr>
            </table>
        </form>   
<?php
        if(isset($_POST['annuleren'])){
            //email sturen voor annulering afspraak
                $sql= $db->query("UPDATE `afspraken` SET `bevestigd`= NULL WHERE `id` = '".$result1->id."'");
                $stmt = $db->prepare($sql);
                $stmt->execute(); 
                $to = $emailadres;
                $subject = "Annulering afspraak:.$datumafspraak.";
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
                                <td>.$datumafspraak.</td>
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
    else {
        //formulier voor accepteren/afwijzen
        var_dump($afspraakid);
?>
        <form action="index.php?page=bevestigen_afspraak" method="POST">
            <table>
                <tr>
                    <th>Afspraak gegevens:</th>
                </tr>
                <tr>
                    <td>Naam: <?php echo $result2->voorletters; ?>. <?php echo $result2->achternaam; ?> </td>
                </tr>
                <tr>
                    <td>Datum: <?php echo $result1->datum; ?> </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit1" value="accepteren" /></td>
                    <td><input type="submit" name="submit2" value="afwijzen" /></td>
                </tr>
                <tr>
                    <td><a href='agenda.php'>Annuleren</a></td>
                </tr>
            </table>
        </form>
<?php
    var_dump($result1->id);
        //bevestigen afspraak (in db zetten)
        if(isset($_POST['submit1'])){
            $sql= $db->query("UPDATE `afspraken` SET `bevestigd`= TRUE WHERE `id` = ".$result1->id);
            header('location: index.php?page=agenda'); 
            //automatische mail voor bevestiging
                //email naar klant na bevestiging
                $to = $result2->email;
                $subject = "Bevestiging afspraak: $result2->datum";
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
            header('location: index.php?page=agenda');
            //automatische mail voor afwijzing afspraak
                $to = $_POST['emailadres'];
                $subject = "Annulering afspraak: <?php echo $datumafspraak; ?> ";
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
    header('location: index.php?page=inloggen_beheer');
}
?>
