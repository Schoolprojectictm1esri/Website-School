<?php
/**
 * @author Jelle Smeets
 */
//controleer of waardes geset zijn.
echo '<div class="content" id="kiesbehandeling">';
if(isset($_GET['datum']) && isset($_GET['tijd'])){
    //controleer of de datum en tijd nog beschikbaar is.
    if(checktijd($_GET['tijd'], $_GET['datum'])){
        //datum en tijd combinatie is al bezet.
        echo '<div class="error">Deze datum en tijd is niet meer beschikbaar. Klik <a href="index.php?page=agenda">hier</a> om terug te gaan naar de agenda.</div>';
    }else{
        //alles is goed. Tijd om een behandeling te plannen.
        
        //is post geset
        if(isset($_POST['submit'])){
            //verwerk formulier
            
            //controleer of er een behandeling is.
            if($_POST['behandeling1'] != ''){
                //er is tenmiste een waarde geset.
                if($_POST['behandeling2'] != ''){
                    //2e behandeling ook geset. Insert 2x.
                   if(checkinsertbehandelingen($_GET['tijd'], $_GET['datum'], $_POST)){
                        echo '<div class="error">De afspraak duurt te lang. De praktijk is tijdens de in te plannen behandeling al ingepland.</div>';
                   }else{ 
                        //insert 2x. 
                        $stmt = $db->prepare('INSERT INTO afspraken set datum = :datum, klant_id = :klant_id, betaald = 0, bevestigd = 0');
                        $datum = date('Y-m-d G:i', strtotime($_GET['datum'].' '.$_GET['tijd']));
                        $stmt->bindParam(':datum', $datum);
                        $stmt->bindParam(':klant_id', $_SESSION['klanten_id']);
                        $res1 = $stmt->execute();
                        if($res1 != false){
                            //goed gegaan op naar query 2.
                            //haal id van vorige query op.
                            $previd = $db->lastInsertId();
                            $stmt2 = $db->prepare('INSERT into afspraakbehandelingen set afspraak_id = :afspraak_id, behandeling_id = :behandeling_id');
                            $stmt2->bindParam(':afspraak_id', $previd);
                            $stmt2->bindParam(':behandeling_id', $_POST['behandeling1']);
                            $res2 = $stmt2->execute();
                            $stmt2->bindParam(':behandeling_id', $_POST['behandeling2']);
                            $res2 = $stmt2->execute();
                            if($res2 != false){
                                //query is gelukt, stuur mail naar beheerder.

                                echo '<div class="message">Uw afspraak is naar de pedicurepraktijk gestuurd. U krijgt een mailtje als deze geaccepteerd is.</div>';
                            }else{
                                echo '<div class="error">Er is iets fout gegaan bij het opslaan van uw afspraak.</div>';
                            }
                        }else{
                            echo '<div class="error">Er is iets fout gegaan bij het opslaan van uw afspraak.</div>';
                        }
                       
                   }
                }else{
                    
                    if(checkinsertbehandelingen($_GET['tijd'], $_GET['datum'], $_POST)){
                        //controleer of het mag.
                        echo '<div class="error">De afspraak duurt te lang. De praktijk is tijdens de in te plannen behandeling al ingepland.</div>';
                    }else{
                        //insert 1x. 2e behandeling niet geset.
                    $stmt = $db->prepare('INSERT INTO afspraken set datum = :datum, klant_id = :klant_id, betaald = 0, bevestigd = 0');
                        $datum = date('Y-m-d G:i', strtotime($_GET['datum'].' '.$_GET['tijd']));
                        $stmt->bindParam(':datum', $datum);
                        $stmt->bindParam(':klant_id', $_SESSION['klanten_id']);
                        $res1 = $stmt->execute();
                        if($res1 != false){
                            //goed gegaan op naar query 2.
                            //haal id van vorige query op.
                            $previd = $db->lastInsertId();
                            $stmt2 = $db->prepare('INSERT into afspraakbehandelingen set afspraak_id = :afspraak_id, behandeling_id = :behandeling_id');
                            $stmt2->bindParam(':afspraak_id', $previd);
                            $stmt2->bindParam(':behandeling_id', $_POST['behandeling1']);
                            $res2 = $stmt2->execute();
                            if($res2 != false){
                                //query is gelukt, stuur mail naar beheerder.

                                echo '<div class="message">Uw afspraak is naar de pedicurepraktijk gestuurd. U krijgt een mailtje als deze geaccepteerd is.</div>';
                            }else{
                                echo '<div class="error">Er is iets fout gegaan bij het opslaan van uw afspraak.</div>';
                            }
                        }else{
                            echo '<div class="error">Er is iets fout gegaan bij het opslaan van uw afspraak.</div>';
                        }
                    }
                }
                
                
            }else{
                echo '<div class="error">Selecteer tenminste een behandeling.</div>';
            
                ?>
                <form class="kiesbehandeling" action="index.php?page=kiesbehandeling&tijd=<?php echo $_GET['tijd'];?>&datum=<?php echo $_GET['datum'];?>" method="POST">
                <table class="behandeling">
                    <tr>
                        <td>
                            Datum:
                        </td>
                        <td>
                            <?php echo $_GET['datum']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tijd:
                        </td>
                        <td>
                            <?php echo $_GET['tijd']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Behandelingen:
                        </td>
                        <td>
                            <select class="behandeling" name="behandeling1">
                                <option value="">Selecteer een behandeling</option>
                                <?php
                                foreach(getbehandelingen() as $key => $val){
                                    echo '<option  value="'.$val['id'].'">'.$val['naam'].'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Eventuele extra behandeling
                        </td>
                        <td>
                            <select class="behandeling" name="behandeling2">
                                <option value="">Selecteer eventueel een extra behandeling</option>
                                <?php
                                foreach(getbehandelingen() as $key => $val){
                                    echo '<option value="'.$val['id'].'">'.$val['naam'].'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Kies behandeling" />
                        </td>
                    </tr>
                </table>    
            </form>
            <?php
            }
        }else{
                    ?>
        <form class="kiesbehandeling" action="index.php?page=kiesbehandeling&tijd=<?php echo $_GET['tijd'];?>&datum=<?php echo $_GET['datum'];?>" method="POST">
            <table class="behandeling">
                <tr>
                    <td>
                        Datum:
                    </td>
                    <td>
                        <?php echo $_GET['datum']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tijd:
                    </td>
                    <td>
                        <?php echo $_GET['tijd']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Behandelingen:
                    </td>
                    <td>
                        <select class="behandeling" name="behandeling1">
                            <option value="">Selecteer een behandeling</option>
                            <?php
                            foreach(getbehandelingen() as $key => $val){
                                echo '<option  value="'.$val['id'].'">'.$val['naam'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Eventuele extra behandeling
                    </td>
                    <td>
                        <select class="behandeling" name="behandeling2">
                            <option value="">Selecteer eventueel een extra behandeling</option>
                            <?php
                            foreach(getbehandelingen() as $key => $val){
                                echo '<option value="'.$val['id'].'">'.$val['naam'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Kies behandeling" />
                    </td>
                </tr>
            </table>    
        </form>
        <?php
        }

    }
}else{
    //Foutmelding op datum en tijd
    echo '<div class="error">Er zijn geen datum en tijd ingevuld. Klik <a href="index.php?page=agenda">hier</a> om terug te gaan naar de agenda.</div>';
}
echo '</div>';