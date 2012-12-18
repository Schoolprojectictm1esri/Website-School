<?php
/*
  Document   : Aanpassenklantgegevens.php
  Created on : 11-12-2012
  Author     : Daniel
  Description:
  Aanpassen van de klantgegevens.
 */


    // Klant uit database verwijderen
    if (isset($_POST['klant_id'], $_POST['verwijderen'])) {
            $stmt = $db->prepare("DELETE FROM `klanten` WHERE klant_id = :klant_id");
            $stmt->bindParam(':klant_id', $_POST['klant_id']);
            $stmt->execute();
        Redirect("/index.php?page=inzienklantgegevens");
    }

    // klant gegevens uit de database halen.
    if (isset($_GET['klant_id'])) {
        $stmt = $db->prepare("
                    SELECT *
                    FROM `klanten` WHERE klant_id = :klant_id
                        ");
                        $stmt->bindParam(':klant_id', $_POST['klant_id']);
                        $stmt->execute();
                        $details = $stmt->fetchAll();
?>    

<?php
    if (!isset($_POST['wijzig'])) {
        ?>      <!-- formulier dat gegevens van de klant weergeeft -->
        <div class="inzienklantgegevens">
            <form action="index.php?page=aanpassenklantgegevens&klant_id=<?php echo $details[0]['klant_id']; ?>" method ="post">
                <table>
                    <th>Klant gegevens</th>
                    <tr></tr>

                    <td>Klant nummer: </td>
                    <td> <input type="text" name ="klant_id" value="<?php echo $details[0]['klant_id']; ?>" READONLY ></td>
                    <tr></tr>

                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['email']; ?>"></td>
                    <tr></tr>

                    <td>Voorletters:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['voorletters']; ?>"></td>
                    <tr></tr>

                    <td>Tussenvoegsel:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['tussenvoegsel']; ?>"></td>
                    <tr></tr>

                    <td>Achternaam:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['achternaam']; ?>"></td>
                    <tr></tr>

                    <td>Adres:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['adres']; ?>"></td>
                    <tr></tr>

                    <td>Woonplaats:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['woonplaats']; ?>"></td>
                    <tr></tr>

                    <td>Postcode:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['postcode']; ?>"></td>
                    <tr></tr>

                    <td>Telnr:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['telefoonnr']; ?>"></td>

                    <td>Klantenkaartnummer:</td>
                    <td><input type="text" name="klant_nummer" value="<?php echo $details[0]['klant_nummer']; ?>"></td>
                    <tr></tr>

                    <td>Beroep:</td>
                    <td><input type="text" name="beroep" value="<?php echo $details[0]['beroep']; ?>"></td>
                    

                    <td>Gewicht:</td>
                    <td><input type="text" name="gewicht" value="<?php echo $details[0]['gewicht']; ?>"></td>
                    <tr></tr>

                     <td>Diabetis:</td>
                    <td><input type="text" name="diabetis_melitus" value="<?php echo $details[0]['diabetis_melitus']; ?>"></td>
                   

                    <td>Antistollingsmiddelen:</td>
                    <td><input type="text" name="anti_stol" value="<?php echo $details[0]['anti_stol']; ?>"></td>
                    <tr></tr>

                    <td>Phema:</td>
                    <td><input type="text" name="phema" value="<?php echo $details[0]['phema']; ?>"></td>
                    
                    <td>Hart/Vaat ziekte:</td>
                    <td><input type="text" name="hart_vaat" value="<?php echo $details[0]['hart_vaat']; ?>"></td>
                      <tr></tr>
                    
                    <td>Allergie:</td>
                    <td><input type="text" name="allergie" value="<?php echo $details[0]['allergie']; ?>"></td>
                   

                    <td>HIV:</td> 
                    <td><input type="text" name="hiv" value="<?php echo $details[0]['hiv']; ?>"></td>
                    <tr></tr>

                    <td>Hepatites:</td>
                    <td><input type="text" name="hepatites" value="<?php echo $details[0]['hepatites']; ?>"></td>
                    
                    <td>Hemofilie:</td>
                    <td><input type="text" name="hemofilie" value="<?php echo $details[0]['hemofilie']; ?>"></td>
                    <tr></tr>

                    <td>Steunkousen:</td>
                    <td><input type="text" name="steunkousen" value="<?php echo $details[0]['steunkousen']; ?>"></td>
                   

                    <td>Voettype:</td>
                    <td><input type="text" name="voettype" value="<?php echo $details[0]['voettype']; ?>"></td>
                    <tr></tr>

                    <td>Orthopedische Afwijking:</td>
                    <td><input type="text" name="orthopedische_afwijking" value="<?php echo $details[0]['orthopedische_afwijking']; ?>"></td>
                    

                    <td>Huidconditie:</td>
                    <td><input type="text" name="huidconditie" value="<?php echo $details[0]['huidconditie']; ?>"></td>
                    <tr></tr>

                    <td>Nagelconditie:</td>
                    <td><input type="text" name="nagelconditie" value="<?php echo $details[0]['nagelconditie']; ?>"></td>
                    

                    <td>Nagelaandoening:</td> 
                    <td><input type="text" name="nagelaandoening" value="<?php echo $details[0]['nagelaandoening']; ?>"></td>
                    <tr></tr>

                    <td>Voetplantair rechts:</td> 
                    <td><input type="text" name="plantaire_rechts" value="<?php echo $details[0]['plantaire_rechts']; ?>"></td>
                    

                    <td>Voetplantair links:</td> 
                    <td><input type="text" name="plantaire_links" value="<?php echo $details[0]['plantaire_links']; ?>"></td>
                    <tr></tr>

                    <td>Voetdorsaal rechts:</td> 
                    <td><input type="text" name="dorsale_rechts" value="<?php echo $details[0]['dorsale_rechts']; ?>"></td>
                    

                    <td>Voetdorsaal links:</td> 
                    <td><input type="text" name="dorsale_links" value="<?php echo $details[0]['dorsale_links']; ?>"></td>
                   
                    



                </table>

                <input type="submit" name="verwijderen" value="Verwijder deze klant">
                <input type="submit" name="wijzig" value="Wijzigingen opslaan">
               
            </form>
        </div>
<?php
    }
?>


<?php
    // Wijzigd de gegevens van de klant.
    if (isset($_POST['wijzig'])) {


        if (empty($_POST['email'])
                || empty($_POST['voorletters'])
                || empty($_POST['tussenvoegsel'])
                || empty($_POST['achternaam'])
                || empty($_POST['woonplaats'])
                || empty($_POST['postcode'])
                || empty($_POST['adres'])
                || empty($_POST['klantenkaartnummer'])
        )
        {
            echo 'Alles moet ingevuld zijn';
        }

                $details[0]['klant_id'] = $_POST['klant_id'];
                $details[0]['email'] = $_POST['email'];
                $details[0]['voorletters'] = $_POST['voorletters'];
                $details[0]['tussenvoegsel'] = $_POST['tussenvoegsel'];
                $details[0]['achternaam'] = $_POST['achternaam'];
                $details[0]['woonplaats'] = $_POST['woonplaats'];
                $details[0]['telefoonnr'] = $_POST['telefoonnr'];
                $details[0]['postcode'] = $_POST['postcode'];
                $details[0]['adres'] = $_POST['adres'];
                $details[0]['klantenkaartnummer'] = $_POST['klant_nummer'];
                $details[0]['beroep'] = $_POST['beroep'];
                $details[0]['gewicht'] = $_POST['gewicht'];
                $details[0]['hart_vaat'] = $_POST['hart_vaat'];
                $details[0]['anti_stol'] = $_POST['anti_stol'];
                $details[0]['phema'] = $_POST['phema'];
                $details[0]['allergie'] = $_POST['allergie'];
                $details[0]['hiv'] = $_POST['hiv'];
                $details[0]['hepatites'] = $_POST['hepatites'];
                $details[0]['hemofilie'] = $_POST['hemofilie'];
                $details[0]['steunkousen'] = $_POST['steunkousen'];
                $details[0]['voettype'] = $_POST['voettype'];
                $details[0]['orthopedische_afwijking'] = $_POST['orthopedische_afwijking'];
                $details[0]['huidconditie'] = $_POST['huidconditie'];
                $details[0]['nagelconditie'] = $_POST['nagelconditie'];
                $details[0]['nagelaandoening'] = $_POST['nagelaandoening'];
                $details[0]['voetplantair_rechts'] = $_POST['plantaire_rechts'];
                $details[0]['voetplantair_links'] = $_POST['plantaire_links'];
                $details[0]['voetdorsaal_rechts'] = $_POST['dorsale_rechts'];
                $details[0]['voetdorsaal_links'] = $_POST['dorsale_links'];

        $stmt = $db->prepare("
                                UPDATE `klanten` 
                                SET
                                `voorletters`                                     =:voorletters
                                `tussenvoegsel`                              =:tussenvoegsel
                                `achternaam`                                   =:achternaam
                                `woonplaats`                                   =:woonplaats
                                `postcode`                                       =:postcode
                                `adres`                                          =:adres
                                `telefoonnr`                                    =:telefoonnr
                                `email`                                            =:email
                                `Klantenkaartnummer`               =:Klantenkaartnummer
                                `Beroep`                                        =:Beroep
                                `Gewicht`                                        =:Gewicht
                                `Diabetis`                                       =:Diabetis
                                `hart_vaat`                                        =:hart_vaat
                                `anti_stol`                                       =:anti_stol
                                `phema`                                          =:phema
                                `allergie`                                           =:allergie
                                `hiv`                                                    =:hiv
                                `hepatites`                                      =:hepatites
                                `hemofilie`                                     =:hemofilie
                                `steunkousen`                               =:steunkousen
                                `voettype`                                         =:voettype
                                `orthopedische_afwijking`           =:orthopedische_afwijking
                                `huidconditie`                                  =:huidconditie
                                `nagelconditie`                                =:nagelconditie
                                `nagelaandoening`                        =:nagelaandoening
                                `voetplantair_rechts`                      =:voetplantair_rechts
                                `voetplantair_links`                         =:voetplantair_links
                                `voetdorsaal_rechts`                      =:voetdorsaal_rechts
                                `voetdorsaal_links`                         =:voetdorsaal_links
                                
                                 WHERE klant_id = :klant_id
                        ");
                        $stmt->bindParam(':klant_id', $_POST['klant_id']);
                        $stmt->bindParam(':voorletters', $_POST['voorletters']);
                        $stmt->bindParam(':tussenvoegsel', $_POST['tussenvoegsel']);
                        $stmt->bindParam(':achternaam', $_POST['achternaam']);
                        $stmt->bindParam(':woonplaats', $_POST['woonplaats']);
                        $stmt->bindParam(':postcode', $_POST['postcode']);
                        $stmt->bindParam(':adres', $_POST['adres']);
                        $stmt->bindParam(':telefoonnr', $_POST['telefoonnr']);
                        $stmt->bindParam(':email', $_POST['email']);
                        $stmt->bindParam(':Klantenkaartnummer', $_POST['Klantenkaartnummer']);
                        $stmt->bindParam(':Beroep', $_POST['Beroep']);
                        $stmt->bindParam(':Gewicht', $_POST['Gewicht']);
                        $stmt->bindParam(':Diabetis', $_POST['diabetis_melitus']);
                        $stmt->bindParam(':hart_vaat', $_POST['hart_vaat']);
                        $stmt->bindParam(':anti_stol', $_POST['anti_stol']);
                        $stmt->bindParam(':phema', $_POST['phema']);
                        $stmt->bindParam(':allergie', $_POST['allergie']);
                        $stmt->bindParam(':hiv', $_POST['hiv']);
                        $stmt->bindParam(':hepatites', $_POST['hepatites']);
                        $stmt->bindParam(':hemofilie', $_POST['hemofilie']);
                        $stmt->bindParam(':steunkousen', $_POST['steunkousen']);
                        $stmt->bindParam(':voettype', $_POST['voettype']);
                        $stmt->bindParam(':orthopedische_afwijking', $_POST['orthopedische_afwijking']);
                        $stmt->bindParam(':huidconditie', $_POST['huidconditie']);
                        $stmt->bindParam(':nagelconditie', $_POST['nagelconditie']);
                        $stmt->bindParam(':nagelaandoening', $_POST['nagelaandoening']);
                        $stmt->bindParam(':plantaire_rechts', $_POST['plantaire_rechts']);
                        $stmt->bindParam(':plantaire_links', $_POST['plantaire_links']);
                        $stmt->bindParam(':dorsale_rechts', $_POST['dorsale_rechts']);
                        $stmt->bindParam(':dorsale_links', $_POST['dorsale_links']);
                        
  ?>

        <!--Formulier dat weergeeft waar de gegevens naar toe gewijzigd zijn. -->
        <div class="inzienklantgegevens">
            <form action="index.php?page=aanpassenklantgegevens&klant_id=<?php echo $details[0]['klant_id']; ?>" method ="post">

                <table>
                    <th>Klant gegevens</th>
                    <tr></tr>

                    <td>Klant nummer: </td>
                    <td> <input type="text" name ="klant_id" value="<?php echo $details[0]['klant_id']; ?>" READONLY ></td>
                    <tr></tr>

                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['email']; ?>"></td>
                    <tr></tr>

                    <td>Voorletters:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['voorletters']; ?>"></td>
                    <tr></tr>

                    <td>Tussenvoegsel:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['tussenvoegsel']; ?>"></td>
                    <tr></tr>

                    <td>Achternaam:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['achternaam']; ?>"></td>
                    <tr></tr>

                    <td>Adres:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['adres']; ?>"></td>
                    <tr></tr>

                    <td>Woonplaats:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['woonplaats']; ?>"></td>
                    <tr></tr>

                    <td>Postcode:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['postcode']; ?>"></td>
                    <tr></tr>

                    <td>Telnr:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['telefoonnr']; ?>"></td>

                    <td>Klantenkaartnummer:</td>
                    <td><input type="text" name="klant_nummer" value="<?php echo $details[0]['klant_nummer']; ?>"></td>
                    <tr></tr>

                    <td>Beroep:</td>
                    <td><input type="text" name="beroep" value="<?php echo $details[0]['beroep']; ?>"></td>
                    

                    <td>Gewicht:</td>
                    <td><input type="text" name="gewicht" value="<?php echo $details[0]['gewicht']; ?>"></td>
                    <tr></tr>

                     <td>Diabetis:</td>
                    <td><input type="text" name="diabetis_melitus" value="<?php echo $details[0]['diabetis_melitus']; ?>"></td>
                   

                    <td>Antistollingsmiddelen:</td>
                    <td><input type="text" name="anti_stol" value="<?php echo $details[0]['anti_stol']; ?>"></td>
                    <tr></tr>

                    <td>Phema:</td>
                    <td><input type="text" name="phema" value="<?php echo $details[0]['phema']; ?>"></td>
                    
                    <td>Hart/Vaat ziekte:</td>
                    <td><input type="text" name="hart_vaat" value="<?php echo $details[0]['hart_vaat']; ?>"></td>
                      <tr></tr>
                    
                    <td>Allergie:</td>
                    <td><input type="text" name="allergie" value="<?php echo $details[0]['allergie']; ?>"></td>
                   

                    <td>HIV:</td> 
                    <td><input type="text" name="hiv" value="<?php echo $details[0]['hiv']; ?>"></td>
                    <tr></tr>

                    <td>Hepatites:</td>
                    <td><input type="text" name="hepatites" value="<?php echo $details[0]['hepatites']; ?>"></td>
                    
                    <td>Hemofilie:</td>
                    <td><input type="text" name="hemofilie" value="<?php echo $details[0]['hemofilie']; ?>"></td>
                    <tr></tr>

                    <td>Steunkousen:</td>
                    <td><input type="text" name="steunkousen" value="<?php echo $details[0]['steunkousen']; ?>"></td>
                   

                    <td>Voettype:</td>
                    <td><input type="text" name="voettype" value="<?php echo $details[0]['voettype']; ?>"></td>
                    <tr></tr>

                    <td>Orthopedische Afwijking:</td>
                    <td><input type="text" name="orthopedische_afwijking" value="<?php echo $details[0]['orthopedische_afwijking']; ?>"></td>
                    

                    <td>Huidconditie:</td>
                    <td><input type="text" name="huidconditie" value="<?php echo $details[0]['huidconditie']; ?>"></td>
                    <tr></tr>

                    <td>Nagelconditie:</td>
                    <td><input type="text" name="nagelconditie" value="<?php echo $details[0]['nagelconditie']; ?>"></td>
                    

                    <td>Nagelaandoening:</td> 
                    <td><input type="text" name="nagelaandoening" value="<?php echo $details[0]['nagelaandoening']; ?>"></td>
                    <tr></tr>

                    <td>Voetplantair rechts:</td> 
                    <td><input type="text" name="plantaire_rechts" value="<?php echo $details[0]['plantaire_rechts']; ?>"></td>
                    

                    <td>Voetplantair links:</td> 
                    <td><input type="text" name="plantaire_links" value="<?php echo $details[0]['plantaire_links']; ?>"></td>
                    <tr></tr>

                    <td>Voetdorsaal rechts:</td> 
                    <td><input type="text" name="dorsale_rechts" value="<?php echo $details[0]['dorsale_rechts']; ?>"></td>
                    

                    <td>Voetdorsaal links:</td> 
                    <td><input type="text" name="dorsale_links" value="<?php echo $details[0]['dorsale_links']; ?>"></td>
                   
                    



                </table>

                <input type="submit" name="verwijderen" value="Verwijder deze klant">
                <input type="submit" name="wijzig" value="Wijzigingen opslaan">
                
            </form>
        </div>
 <?php
        echo 'Gegevens zijn gewijzigd.';
    }
}

    if (!isset($_GET['klant_id'])) {       // melding weergeven als er geen klant id is ingevoerd
        Echo 'Geen klantgegevens ingevoerd.<br><br>';
        echo "<a href='index.php?page=inzienklantgegevens'>";
        Echo 'Klik hier';
        Echo "</a>";
    }
?>