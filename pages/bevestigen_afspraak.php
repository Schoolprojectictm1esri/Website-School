<?
/**
 * document by Thomas Vermeulen.
 * Created on 7-12-2012.
 * Version 1.0
 */
?>

<?php
//kijken of er een (afspraak)id is meegegeven
if(isset($_GET['id'])){
    $afspraakid = $_GET['id'];
    //query om te kijken of (afspraak)id bestaat, rest gegevens ophalen
    $stmt = $db->prepare("SELECT `datum`,`klant_id`,`id`,`bevestigd` FROM `afspraken` WHERE `id` = :afspraakid");
    $stmt->bindParam(':afspraakid', $afspraakid);
    $stmt->execute();
    $result1 = $stmt->fetchObject();
    //check of re resultaat is
    if(!empty($result1)){
        //check of formulier gesubmit is op:Afzeggen
        if(!isset($_POST['submit1'])){
            //check of formulier gesubmit is op:Bevestigen
            if(!isset($_POST['submit2'])){
                //check of formulier gesubmit is op:Afwijzen
                if(!isset($_POST['submit3'])){
                    //query om meer gegevens op te halen
                    $stmt = $db->prepare("SELECT `voorletters`,`achternaam`,`email` FROM `klanten` WHERE `klant_id` = :resultklantid");
                    $stmt->bindParam(':resultklantid', $result1->klant_id);
                    $stmt->execute();
                    $result2 = $stmt->fetchObject();
                    //query om behandeling op te halen
                    $stmt = $db->prepare("SELECT `afspraak_id` FROM `afspraakbehandelingen` WHERE `afspraak_id` = :afspraakid");
                    $stmt->bindParam(':afspraakid', $afspraakid);
                    $stmt->execute();
                    $result3 = $stmt->fetchObject();
                    //formulier waarbij afspraak al bevestigd is
                    if($result1->bevestigd == TRUE){
                        //print formulier om te bekijken
?>
                        <form action="index.php?page=bevestigen_afspraak&id=<?php echo "$afspraakid"; ?> " method="POST">
                            <table>
                                <tr>
                                    <td><b>Afspraak gegevens:</b></td>
                                </tr>
                                <tr>
                                    <td>Klant ID: <?php echo $afspraakid ?></td>
                                </tr>                                
                                <tr>
                                    <td>Naam: <?php echo $result2->voorletters;?>. <?php echo $result2->achternaam;?> </td>
                                </tr>
                                <tr>
                                    <td>Behandeling: <?php echo $result3->behandeling_id;?>.</td>
                                </tr>                                
                                <tr>
                                    <td>Datum: <?php echo $result1->datum; ?></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit1" value="afzeggen" /></td>
                                </tr>
                                <tr>
                                    <td><a href="index.php?page=agenda">Annuleren</a></td>
                                </tr>
                            </table>
                        </form>
<?php
                    }
                    else{
                        //print formulier + bevestigen
?>
                        <form action="index.php?page=bevestigen_afspraak&id=<?php echo "$afspraakid"; ?> " method="POST">
                            <table>
                                <tr>
                                    <td><b>Afspraak gegevens:</b></td>
                                </tr>
                                <tr>
                                    <td>Klant ID: <?php echo $afspraakid ?></td>
                                </tr>                                
                                <tr>
                                    <td>Naam: <?php echo $result2->voorletters;?>. <?php echo $result2->achternaam;?> </td>
                                </tr>
                                <tr>
                                    <td>Behandeling: <?php echo $result3->behandeling_id;?>.</td>
                                </tr>
                                <tr>
                                    <td>Datum: <?php echo $result1->datum; ?></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit2" value="bevestigen" /></td>
                                    <td><input type="submit" name="submit3" value="afwijzen" /></td>
                                </tr>
                                <tr>
                                    <td><a href="index.php?page=agenda">Annuleren</a></td>
                                </tr>
                            </table>
                        </form>
<?php
                    }
                }
                else{
                    //query voor update bij afwijzing
                    $stmt = $db->prepare("UPDATE `afspraken` SET `bevestigd` = false WHERE `id` = :afspraakid");
                    $stmt->bindParam(':afspraakid', $afspraakid);
                    $stmt->execute();
                    echo "Afspraak is afgewezen,";
                    //email naar klant na annulering
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
                                        <td>alsnog is geannuleerd.</td>
                                    </tr>
                                    <tr>
                                        <td>Voor meer informatie mail
                                    </tr>
                                    <tr>
                                        <td>Met vriendelijke groet PedicurePraktijk Desiree.
                                    </tr>
                                </table>
                            </body>
                            </html>
                      ";
                    //automatische mail
                    mail($to, $subject, $message, $from);
?>
                    <a href="index.php?page=agenda">Terug naar agenda</a>
<?php
                }
            } 
            else{
                //query met update bevestigen van afspraak
                $stmt = $db->prepare("UPDATE `afspraken` SET `bevestigd` = TRUE WHERE `id` = :afspraakid");
                $stmt->bindParam(':afspraakid', $afspraakid);
                $stmt->execute();
                echo "Afspraak is bevestigd,";
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
                                    <td>alsnog is bevestigd.</td>
                                </tr>
                                <tr>
                                    <td>Voor meer informatie mail
                                </tr>
                                <tr>
                                    <td>Met vriendelijke groet PedicurePraktijk Desiree.
                                </tr>
                            </table>
                        </body>
                        </html>
                  ";
                //automatische mail
                mail($to, $subject, $message, $from);
?>
                <a href="index.php?page=agenda">Terug naar agenda</a>
<?php
            }
        }
        else{
            //query met update annuleren van de afspraak
            $stmt = $db->prepare("UPDATE `afspraken` SET `bevestigd` = FALSE WHERE `id` = :afspraakid");
            $stmt->bindParam(':afspraakid', $afspraakid);
            $stmt->execute();
            echo "Afspraak is geannuleerd,";
            //email naar klant na annulering
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
                                <td>alsnog is geannuleerd.</td>
                            </tr>
                            <tr>
                                <td>Voor meer informatie mail
                            </tr>
                            <tr>
                                <td>Met vriendelijke groet PedicurePraktijk Desiree.
                            </tr>
                        </table>
                    </body>
                    </html>
              ";
            //automatische mail
            mail($to, $subject, $message, $from);
?>
            <a href="index.php?page=agenda">Terug naar agenda</a>
<?php
        }
    }
    else{
        //redirect bij foutmelding(onbekent afspraakID)
        header ('location: index.php');
    }
}
else{
    //rederiect bij foutmelding(niet ingelogd)
    header ('location: index.php?page=inloggen_beheer');
}
?>

