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
    $stmt = $db->query("SELECT `datum`,`klant_id`,`id`,`bevestigd` FROM `afspraken` WHERE `id` = '".$afspraakid."'");
    $result1 = $stmt->fetchObject();
    if(!empty($result1)){
        //als afspraak onbevestigd is = bekijken voor bevestiging/afwijzen
        if(!isset($_POST['submit1'])){
            if(!isset($_POST['submit2'])){
                if(!isset($_POST['submit3'])){
                    //hier nog een query uitvoeren voor gegevens
                    $stmt = $db->query("SELECT `voorletters`,`achternaam`,`email` FROM `klanten` WHERE `klant_id` = '".$result1->klant_id."'");
                    $result2 = $stmt->fetchObject();
                    if($result1->bevestigd == TRUE){
                        //print formulier om te bekijken:P
?>
                        <form action="index.php?page=bevestigen_afspraak&id=<?php echo "$afspraakid"; ?> " method="POST">
                            <table>
                                <tr>
                                    <td><b>Afspraak gegevens:</b></td>
                                </tr>
                                <tr>
                                    <td>Naam: <?php echo $result2->voorletters;?>. <?php echo $result2->achternaam;?> </td>
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
                                    <td>Naam: <?php echo $result2->voorletters;?>. <?php echo $result2->achternaam;?> </td>
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
                    //query + wat er gebeurde door submit3
                    $stmt = $db->query("UPDATE `afspraken` SET `bevestigd` = false WHERE `id` = '".$afspraakid."'");
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
?>
                    <a href="index.php?page=agenda">Terug naar agenda</a>
<?php
                }
            } 
            else{
                //query + wat er gebeurde door submit2
                $stmt = $db->query("UPDATE `afspraken` SET `bevestigd` = TRUE WHERE `id` = '".$afspraakid."'");
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
?>
                <a href="index.php?page=agenda">Terug naar agenda</a>
<?php
            }
        }
        else{
            //query + wat er gebeurde door submit1
            $stmt = $db->query("UPDATE `afspraken` SET `bevestigd` = FALSE WHERE `id` = '".$afspraakid."'");
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
?>
            <a href="index.php?page=agenda">Terug naar agenda</a>
<?php
        }
    }
    else{
        header ('location: index.php');
    }
}
else{
    header ('location: index.php?page=inloggen_beheer');
}
?>

