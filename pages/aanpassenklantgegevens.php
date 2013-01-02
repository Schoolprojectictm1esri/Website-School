<?php
/*
  Document   : Aanpassenklantgegevens.php
  Created on : 11-12-2012
  Author     : Daniel en Jelle
  Description:
  Aanpassen van de klantgegevens.
 */
?>
<div class="inzienklantgegevens">
<?php
    // Klant uit database verwijderen
    if (isset($_POST['klant_id'], $_POST['verwijderen'])) {
        $stmt = $db->prepare("DELETE FROM `klanten` WHERE klant_id = :klant_id");
        $stmt->bindParam(':klant_id', $_POST['klant_id']);
        $stmt->execute();
        redirect("/index.php?page=inzienklantgegevens");
    }

    // Wijzigd de gegevens van de klant.
    if (isset($_POST['wijzig'])) {
        if (empty($_POST['voorletters']) || empty($_POST['achternaam'])){
            echo 'Vul alstublieft alle verplichte velden in.';       
        }else{
            //succesfull
            $stmt = $db->prepare("UPDATE `klanten` set voorletters = :voorletters,
                                                   tussenvoegsel = :tussenvoegsel,
                                                   achternaam = :achternaam,
                                                   woonplaats = :woonplaats,
                                                   postcode = :postcode,
                                                   adres = :adres,
                                                   telefoonnr = :telefoonnr,
                                                   email = :email,
                                                   klant_nummer = :klant_nummer,
                                                   beroep = :beroep,
                                                   gewicht = :gewicht,
                                                   diabetis_melitus = :diabetis_melitus,
                                                   hart_vaat = :hart_vaat,
                                                   anti_stol = :anti_stol,
                                                   phema = :phema,
                                                   allergie = :allergie,
                                                   hiv = :hiv,
                                                   hepatitis = :hepatitis,
                                                   hemofilie = :hemofilie, 
                                                   steunkousen = :steunkousen,
                                                   steunzolen = :steunzolen,
                                                   voettype = :voettype,
                                                   orthopedische_afwijking = :orthopedische_afwijking,
                                                   huidconditie = :huidconditie,
                                                   huidaandoening = :huidaandoening,
                                                   nagelconditie = :nagelconditie,
                                                   nagelaandoening = :nagelaandoening,
                                                   plantaire_rechts = :plantaire_rechts,
                                                   plantaire_links = :plantaire_links,
                                                   dorsale_rechts = :dorsale_rechts,
                                                   dorsale_links = :dorsale_links,
                                                   geboortedatum = :geboortedatum
                                                   where klant_id = :klant_id");
           
                        
                        $stmt->bindParam(':klant_id', $_GET['klant_id']);
                        $stmt->bindParam(':voorletters', $_POST['voorletters']);
                        $stmt->bindParam(':tussenvoegsel', $_POST['tussenvoegsel']);
                        $stmt->bindParam(':achternaam', $_POST['achternaam']);
                        $stmt->bindParam(':woonplaats', $_POST['woonplaats']);
                        $stmt->bindParam(':postcode', $_POST['postcode']);
                        $stmt->bindParam(':adres', $_POST['adres']);
                        $stmt->bindParam(':telefoonnr', $_POST['telefoonnr']);
                        $stmt->bindParam(':email', $_POST['email']);
                        $stmt->bindParam(':klant_nummer', $_POST['klant_nummer']);
                        $stmt->bindParam(':beroep', $_POST['beroep']);
                        $stmt->bindParam(':gewicht', $_POST['gewicht']);
                        $stmt->bindParam(':diabetis_melitus', $_POST['diabetis_melitus']);
                        $stmt->bindParam(':hart_vaat', $_POST['hart_vaat']);
                        $stmt->bindParam(':anti_stol', $_POST['anti_stol']);
                        $stmt->bindParam(':phema', $_POST['phema']);
                        $stmt->bindParam(':allergie', $_POST['allergie']);
                        $stmt->bindParam(':hiv', $_POST['hiv']);
                        $stmt->bindParam(':hepatitis', $_POST['hepatitis']);
                        $stmt->bindParam(':hemofilie', $_POST['hemofilie']);
                        $stmt->bindParam(':steunkousen', $_POST['steunkousen']);
                        $stmt->bindParam(':steunzolen', $_POST['steunzolen']);
                        $stmt->bindParam(':voettype', $_POST['voettype']);
                        $stmt->bindParam(':orthopedische_afwijking', $_POST['orthopedische_afwijking']);
                        $stmt->bindParam(':huidconditie', $_POST['huidconditie']);
                        $stmt->bindParam(':huidaandoening', $_POST['huidaandoening']);
                        $stmt->bindParam(':nagelconditie', $_POST['nagelconditie']);
                        $stmt->bindParam(':nagelaandoening', $_POST['nagelaandoening']);
                        $stmt->bindParam(':plantaire_rechts', $_POST['plantaire_rechts']);
                        $stmt->bindParam(':plantaire_links', $_POST['plantaire_links']);
                        $stmt->bindParam(':dorsale_rechts', $_POST['dorsale_rechts']);
                        $stmt->bindParam(':dorsale_links', $_POST['dorsale_links']);
                        $stmt->bindParam(':geboortedatum', $_POST['geboortedatum']);
                        $updateresult = $stmt->execute();
                       if($updateresult != false){
                           echo '<div class="success">Het opslaan is gelukt!.</div>';
                       }else{
                           echo '<div class="error">Er is iets mis gegaan tijdens het updaten.</div>';
                       }
                        //stmt afvangen voor succes of niet.
                        }
        }
    // klant gegevens uit de database halen.
    if (isset($_GET['klant_id'])) {
        $klant_id = $_GET['klant_id'];
        $stmt = $db->prepare("SELECT * FROM `klanten` WHERE `klant_id` = :klant_id");
        $stmt->bindParam(':klant_id', $klant_id);
        $stmt->execute();
        $details = $stmt->fetchall();
    }else{
        die('Geen klantgegevens ingevoerd.<br><br><a href="index.php?page=inzienklantgegevens">Klik hier</a>');
    }
    ?>

        <!--Formulier dat weergeeft waar de gegevens naar toe gewijzigd zijn. -->
            <form name="klantgegevens" action="index.php?page=aanpassenklantgegevens&klant_id=<?php echo $klant_id ?>" method ="post">

                <table>
                    <th>Klant gegevens</th>
                    <tr><br>
                    
                    <td>Klantnummer:</td>
                    <td><input type="text" name="klant_nummer" value="<?php echo $details[0]['klant_nummer']; ?>"></td>
                    <td>Diabetis Melitus:</td>
                    <td><input type="checkbox" name="diabetis_melitus" value="1" <?php echo $details[0]['diabetis_melitus']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>
                    
                    <td>Achternaam:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['achternaam']; ?>"></td>
                    <td>Hart/Vaat ziekte:</td>
                    <td><input type="checkbox" name="hart_vaat" value="1" <?php echo $details[0]['hart_vaat']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Voorletters:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['voorletters']; ?>"></td>
                    <td>Antistollingsmiddelen:</td>
                    <td><input type="checkbox" name="anti_stol" value="1" <?php echo $details[0]['anti_stol']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Tussenvoegsel:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['tussenvoegsel']; ?>"></td>
                    <td>Phema:</td>
                    <td><input type="checkbox" name="phema" value="1" <?php echo $details[0]['phema']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['email']; ?>"></td>
                    <td>Allergie:</td>
                    <td><input type="checkbox" name="allergie" value="1" <?php echo $details[0]['allergie']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Adres:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['adres']; ?>"></td>
                    <td>HIV:</td>
                    <td><input type="checkbox" name="hiv" value="1" <?php echo $details[0]['hiv']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Woonplaats:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['woonplaats']; ?>"></td>
                    <td>Hepatitis:</td>
                    <td><input type="checkbox" name="hepatitis" value="1" <?php echo $details[0]['hepatitis']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Postcode:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['postcode']; ?>"></td>
                    <td>Hemofilie:</td>
                    <td><input type="checkbox" name="hemofilie" value="1" <?php echo $details[0]['hemofilie']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>

                    <td>Telnr:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['telefoonnr']; ?>"></td>
                    <td>Steunkousen:</td>
                    <td><input type="checkbox" name="steunkousen" value="1" <?php echo $details[0]['steunkousen']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>
                     
                    <td>Beroep:</td>
                    <td><input type="text" name="beroep" value="<?php echo $details[0]['beroep']; ?>"></td>
                    <td>Steunzolen:</td>
                    <td><input type="checkbox" name="steunzolen" value="1" <?php echo $details[0]['steunzolen']== 1 ? 'checked="checked"' : '' ; ?>></td>
                    </tr><tr>
                     
                    <td>Gewicht:</td>
                    <td><input type="text" name="gewicht" value="<?php echo $details[0]['gewicht']; ?>"></td>
                    <td> Geboortedatum: </td>
                    <td><input type="text" name="geboortedatum" value="<?php echo $details[0]['geboortedatum']; ?>"></td>
                    </tr><tr>
                   
                    <td>Voettype:</td>
                    <td><input type="text" name="voettype" value="<?php echo $details[0]['voettype']; ?>"></td>
                    </tr><tr>

                    <td>Orthopedische Afwijking:</td>
                    <td><input type="text" name="orthopedische_afwijking" value="<?php echo $details[0]['orthopedische_afwijking']; ?>"></td>
                    </tr><tr>       
                    
                    <td>Huidconditie:</td>
                    <td><input type="text" name="huidconditie" value="<?php echo $details[0]['huidconditie']; ?>"></td>
                    <td>Huidaandoening:</td>
                    <td><input type="text" name="huidaandoening" value="<?php echo $details[0]['huidaandoening']; ?>"></td>
                    </tr><tr>

                    <td>Nagelconditie:</td>
                    <td><input type="text" name="nagelconditie" value="<?php echo $details[0]['nagelconditie']; ?>"></td>
                    
                    <td>Nagelaandoening:</td> 
                    <td><input type="text" name="nagelaandoening" value="<?php echo $details[0]['nagelaandoening']; ?>"></td>
                    </tr><tr>

                    <td>Voetplantair rechts:</td> 
                    <td><input type="text" name="plantaire_rechts" value="<?php echo $details[0]['plantaire_rechts']; ?>"></td>
                    <td>Voetplantair links:</td> 
                    <td><input type="text" name="plantaire_links" value="<?php echo $details[0]['plantaire_links']; ?>"></td>
                    </tr><tr>

                    <td>Voetdorsaal rechts:</td> 
                    <td><input type="text" name="dorsale_rechts" value="<?php echo $details[0]['dorsale_rechts']; ?>"></td>
                    <td>Voetdorsaal links:</td> 
                    <td><input type="text" name="dorsale_links" value="<?php echo $details[0]['dorsale_links']; ?>"></td>
                
            </table>

                <input type="submit" name="verwijderen" value="Verwijder deze klant">
                <input type="submit" name="wijzig" value="Wijzigingen opslaan">
                
            </form>
        </div>

