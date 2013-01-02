<?
/**
 * document by Thomas Vermeulen.
 * Created on 7-12-2012.
 * Version 1.0
 */
?>

<?php
//kijken of er een (afspraak)id is meegegeven
if(isset($_GET['afspraak_id'])){
    $afspraakid = $_GET['afspraak_id'];
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
                    $stmt = $db->prepare("SELECT `afspraak_id`, `behandeling_id` FROM `afspraakbehandelingen` WHERE `afspraak_id` = :afspraakid");
                    $stmt->bindParam(':afspraakid', $afspraakid);
                    $stmt->execute();
                    $result3 = $stmt->fetchall();
                    $behandelingen = array();
                    foreach($result3 as $key => $val){
                        //query om behandeling soort op te halen
                        $stmt = $db->prepare('SELECT `naam`,`lengte` FROM behandelingen WHERE id = :behandelingid');
                        $stmt->bindParam(':behandelingid', $val['behandeling_id']);
                        $stmt->execute();
                        $result4 = $stmt->fetchObject();                       
                        $behandelingen[$val['behandeling_id']]['lengte']=$result4->lengte;
                        $behandelingen[$val['behandeling_id']]['naam']=$result4->naam;
                    
                    }
                    //formulier waarbij afspraak al bevestigd is
                    if($result1->bevestigd == TRUE){
                        //print formulier om te bekijken
?>
                        <form action="index.php?page=bevestigen_afspraak&afspraak_id=<?php echo "$afspraakid"; ?> " method="POST">
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
                                    <td>Behandeling: 
                                        <?php
                                     foreach ($behandelingen as $row2 => $row3){
                                        echo "
                                            <tr>
                                                <td> ".$row3['naam']." </td>
                                                <td> ".$row3['lengte']." minuten. </td>
                                            </tr> ";
                                            } 
                                      ?>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>Datum: <?php echo $result1->datum; ?></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit1" value="afzeggen" /></td>
                                </tr>
                                <tr>
                                    <td><a href="index.php?page=bevestigen_afspraak">Annuleren</a></td>
                                </tr>
                            </table>
                        </form>
<?php
                    }
                    else{
                        //print formulier + bevestigen
?>
                        <form action="index.php?page=bevestigen_afspraak&afspraak_id=<?php echo "$afspraakid"; ?> " method="POST">
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
                                    <td>Behandeling:                                        
                                     <?php
                                     foreach ($behandelingen as $row2 => $row3){
                                        echo "
                                            <tr>
                                                <td> ".$row3['naam']." </td>
                                                <td> ".$row3['lengte']." minuten. </td>
                                            </tr> ";
                                            } 
                                      ?></td>
                                </tr>
                                <tr>
                                    <td>Datum: <?php echo $result1->datum; ?></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit2" value="bevestigen" /></td>
                                    <td><input type="submit" name="submit3" value="afwijzen" /></td>
                                </tr>
                                <tr>
                                    <td><a href="index.php?page=bevestigen_afspraak">Annuleren</a></td>
                                </tr>
                            </table>
                        </form>
<?php
                    }
                }
                else{
                    $stmt = $db->prepare("SELECT `voorletters`,`achternaam`,`email` FROM `klanten` WHERE `klant_id` = :resultklantid");
                    $stmt->bindParam(':resultklantid', $result1->klant_id);
                    $stmt->execute();
                    $result2 = $stmt->fetchObject();
                    //query voor update bij afwijzing
                    $stmt = $db->prepare("delete FROM `afspraken` WHERE `id` = :afspraakid");
                    $stmt->bindParam(':afspraakid', $afspraakid);
                    $stmt->execute();
                    echo "Afspraak is afgewezen,";
                    //email naar klant na annulering
                    $to = $result2->email;
                    $subject = "Bevestiging afspraak: $result1->datum";
                    $headers = "MIME-Version: 1.0". "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1". "\r\n";
                    $headers .= "From: <noreply@pedicurepraktijkdesiree.nl>"."\r\n";
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
                                        <td>.$result1->datum.</td>
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
                    mail($to, $subject, $message, $headers);
?>
                    <a href="index.php?page=bevestigen_afspraak">Terug naar afspraken</a>
<?php
                }
            } 
            else{
                $stmt = $db->prepare("SELECT `voorletters`,`achternaam`,`email` FROM `klanten` WHERE `klant_id` = :resultklantid");
                $stmt->bindParam(':resultklantid', $result1->klant_id);
                $stmt->execute();
                $result2 = $stmt->fetchObject();
                //query met update bevestigen van afspraak
                $stmt = $db->prepare("UPDATE `afspraken` SET `bevestigd` = TRUE WHERE `id` = :afspraakid");
                $stmt->bindParam(':afspraakid', $afspraakid);
                $stmt->execute();
                echo "Afspraak is bevestigd,";
                //email naar klant na bevestiging
                $to = $result2->email;
                $subject = "Bevestiging afspraak: $result1->datum";
                $headers = "MIME-Version: 1.0". "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1". "\r\n";
                $headers .= "From: <noreply@pedicurepraktijkdesiree.nl>"."\r\n";
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
                                    <td>.$result1->datum.</td>
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
                mail($to, $subject, $message, $headers);
?>
                <a href="index.php?page=bevestigen_afspraak">Terug naar afspraken</a>
<?php
            }
        }
        else{
            $stmt = $db->prepare("SELECT `voorletters`,`achternaam`,`email` FROM `klanten` WHERE `klant_id` = :resultklantid");
            $stmt->bindParam(':resultklantid', $result1->klant_id);
            $stmt->execute();
            $result2 = $stmt->fetchObject();
            //query met update annuleren van de afspraak
            $stmt = $db->prepare("delete FROM `afspraken` WHERE `id` = :afspraakid");
            $stmt->bindParam(':afspraakid', $afspraakid);
            $stmt->execute();
            echo "Afspraak is geannuleerd,";
            //email naar klant na annulering
            $to = $result2->email;
            $subject = "Bevestiging afspraak: $result1->datum";
            $headers = "MIME-Version: 1.0". "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1". "\r\n";
            $headers .= "From: <noreply@pedicurepraktijkdesiree.nl>"."\r\n";
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
                                <td>.$result1->datum.</td>
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
            mail($to, $subject, $message, $headers);
?>
            <a href="index.php?page=bevestigen_afspraak">Terug naar afspraken</a>
<?php
        }
    }
    else{
        //redirect bij foutmelding(onbekent afspraakID)
        ?>
            Onbekende afspraak. <br />
            Ga terug naar alle afspraken, <br />
            <a href="index.php?page=bevestigen_afspraak">Klik hier</a>
        <?php
    }
}
else{
    //laat overzicht zien van afspraken
?>
    <div class="inzienklantgegevens">
    <table>
        <tr>
            <th>Klant ID</th>
            <th>Voorletters</th>
            <th>Achternaam</th>
            <th>Afspraak datum</th>
        </tr>
<?php
        $stmt = $db->prepare("SELECT k.klant_id, k.voorletters, k.achternaam, a.datum, a.id FROM klanten AS k JOIN afspraken AS a ON k.klant_id = a.klant_id WHERE a.datum >= :datum ORDER BY a.datum");
        $datum=date('Y-m-d');
        $stmt->bindParam(':datum', $datum);
        $stmt->execute();
        $result2 = $stmt->fetchall();
        if(empty($result2)){
        print("Er zijn geen afspraken ");
        }
        else{
        foreach ($result2 as $row => $row2){
            print "
                <tr>
                    <td> ".$row2['klant_id']." </td>
                    <td> ".$row2['voorletters']." </td>
                    <td> ".$row2['achternaam']." </td>
                    <td> ".$row2['datum']." </td>
                    <td> <a href='index.php?page=bevestigen_afspraak&afspraak_id=".$row2['id']."'>Bevestigen/afwijzen</a> </td>
                </tr>
" ;
                }
            }
    echo "</table></div>";
}
?>

