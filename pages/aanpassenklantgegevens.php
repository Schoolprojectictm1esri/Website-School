<?php

/* 
    Document   : Aanpassenklantgegevens.php
    Created on : 11-12-2012
    Author     : Daniel
    Description:
        Aanpassen van de klantgegevens.
*/


   // Klant uit database verwijderen
        if(isset($_POST['klant_id'],$_POST['verwijderen']))
                
            { 
            $sql = $db->query("
                    DELETE FROM `klanten` WHERE `klant_id` = '".(INT)$_POST['klant_id']."'
                    ");           
            Redirect("/index.php?page=inzienklantgegevens");
            }
            
            
      if (isset($_GET['klant_id']))
          {
                $stmt = $db->query("
                SELECT *
                FROM `klanten`
                WHERE `klant_id` = '".(INT)$_GET['klant_id']."'
                ");
                $details = $stmt->fetchAll();
                
                
    
?>    

<?php

    if (!isset($_POST['wijzig'])) {
    
        ?>      <!-- formulier dat gegevens van de klant weergeeft -->
                <form action="index.php?page=aanpassenklantgegevens&klant_id=<?php echo $details[0]['klant_id']; ?>" method ="post">

                    <table>

                        <td>Klant gegevens</td>
                    <tr></tr>

                    <td>Klant nummer: </td>
                    <td> <input type="text" name ="klant_id" value="<?php echo $details[0]['klant_id']; ?>"READONLY></td>
                    
                    <td>Klantenkaartnummer:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['klant_nummer']; ?>"><td>
                    <tr></tr>
                    
                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['email']; ?>"><td>
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
                    
                    <tr></tr>

                    <td>Allergie:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['allergie']; ?>"></td>
                    
                    <td>Huidconditie:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['huidconditie']; ?>"></td>
                    <tr></tr>

                    <td>Beroep:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['beroep']; ?>"></td>
                    
                    
                    <td>Gewicht:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['gewicht']; ?>"></td>
                    <tr></tr>
                    
                    <td>Hart/Vaat ziekte:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['hart_vaat']; ?>"></td>
                    
                    
                    <td>Diabetis:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['diabetis_melitus']; ?>"></td>
                    <tr></tr>

                    <td>Antistollingsmiddelen:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['anti_stol']; ?>"></td>
                    

                    <td>Phema:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['phema']; ?>"></td>
                    
                    
                    <tr></tr>
                    <td>HIV:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['hiv']; ?>"></td>
                                        
                    <td>Hepatitis:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['hepatitis']; ?>"><td>
                    <tr></tr>

                    <td>Hemofilie:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['hemofilie']; ?>"></td>
                    
                    
                    <td>Steunkousen:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['steunkousen']; ?>"></td>
                    <tr></tr>

                    <td>Voettype:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['voettype']; ?>"></td>
                    

                    <td>Orthopedische Afwijking:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['orthopedische_afwijking']; ?>"></td>
                    <tr></tr>

                    
                    <td>Nagelconditie:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['nagelconditie']; ?>"></td>
                    

                    <td>Nagelaandoening:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['nagelaandoening']; ?>"></td>
                    <tr></tr>

                    <td>Voetplantair rechts:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['plantaire_rechts']; ?>"></td>
                    

                    <td>Voetplantair links:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['plantaire_links']; ?>"></td>
                    <tr></tr>

                    <td>Voetdorsaal rechts:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['dorsale_rechts']; ?>"></td>
                    

                    <td>Voetdorsaal links:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['dorsale_links']; ?>"></td>


                    </table>

                    <input type="submit" name="verwijderen" value="Verwijder deze klant">
                    <input type="submit" name="wijzig" value="Wijzigingen opslaan">
                    <input type="submit" name="annuleren" value="Annuleren">
                </form>

<?php
} 
?>
    

        <?php // Wijzigd de gegevens van de klant.
            if (isset($_POST['wijzig'])) 
{


                    if (   empty($_POST['email'])
                          || empty($_POST['voorletters'])
                          || empty($_POST['tussenvoegsel'])
                          || empty($_POST['achternaam'])
                          || empty($_POST['woonplaats'])
                          || empty($_POST['postcode'])
                          || empty($_POST['adres'])
                          || empty($_POST['klantenkaartnummer'])
                          //|| empty($_POST[''])
                          //|| empty($_POST[''])
                          
                         ){
                         echo 'Alles moet ingevuld zijn';
                         } 
                         
                            $details[0]['klant_id']                 = $_POST['klant_id'];
                            $details[0]['email']                    = $_POST['email'];
                            $details[0]['voorletters']              = $_POST['voorletters'];
                            $details[0]['tussenvoegsel']            = $_POST['tussenvoegsel'];
                            $details[0]['achternaam']               = $_POST['achternaam'];
                            $details[0]['woonplaats']               = $_POST['woonplaats'];
                            $details[0]['telefoonnr']               = $_POST['telefoonnr'];
                            $details[0]['postcode']                 = $_POST['postcode'];
                            $details[0]['adres']                    = $_POST['adres'];
                            $details[0]['klantenkaartnummer']       = $_POST['klantenkaartnummer'];
                            $details[0]['beroep']                   = $_POST['beroep'];
                            $details[0]['gewicht']                  = $_POST['gewicht'];
                            $details[0]['hart/vaat_ziekte']         = $_POST['hart/vaat_ziekte'];
                            $details[0]['antistollingsmiddelen']    = $_POST['antistollingsmiddelen'];
                            $details[0]['phema']                    = $_POST['phema'];
                            $details[0]['allergie']                 = $_POST['allergie'];
                            $details[0]['hiv']                      = $_POST['hiv'];
                            $details[0]['hepatites']                = $_POST['hepatites'];
                            $details[0]['hemofilie']                = $_POST['hemofilie'];
                            $details[0]['steunkousen']              = $_POST['steunkousen'];
                            $details[0]['voettype']                 = $_POST['voettype'];
                            $details[0]['orthopedische_afwijking']  = $_POST['orthopedische_afwijking'];
                            $details[0]['huidconditie']             = $_POST['huidconditie'];
                            $details[0]['nagelconditie']            = $_POST['nagelconditie'];
                            $details[0]['nagelaandoening']          = $_POST['nagelaandoening'];
                            $details[0]['voetplantair_rechts']      = $_POST['voetplantair_rechts'];
                            $details[0]['voetplantair_links']       = $_POST['voetplantair_links'];
                            $details[0]['voetdorsaal_rechts']       = $_POST['voetdorsaal_rechts'];
                            $details[0]['voetdorsaal_links']        = $_POST['voetdorsaal_links'];
                            
                            $sql            =$db->query("
                                UPDATE `klanten` 
                                SET
                                `voorletters`               = '".mysql_real_escape_string($_POST['voorletters'])."',
                                `tussenvoegsel`             = '".mysql_real_escape_string($_POST['tussenvoegsel'])."',
                                `achternaam`                = '".mysql_real_escape_string($_POST['achternaam'])."',
                                `woonplaats`                = '".mysql_real_escape_string($_POST['woonplaats'])."',
                                `postcode`                  = '".mysql_real_escape_string($_POST['postcode'])."',
                                `adres`                     = '".mysql_real_escape_string($_POST['adres'])."',
                                `telefoonnr`                = '".mysql_real_escape_string($_POST['telefoonnr'])."',
                                `email`                     = '".mysql_real_escape_string($_POST['email'])."'
                                `Klantenkaartnummer`        = '".mysql_real_escape_string($_POST['Klantenkaartnummer'])."',
                                `Beroep`                    = '".mysql_real_escape_string($_POST['Beroep'])."',
                                `Gewicht`                   = '".mysql_real_escape_string($_POST['Gewicht'])."',
                                `Diabetis`                  = '".mysql_real_escape_string($_POST['Diabetis'])."',
                                `hart/vaat_ziekte`          = '".mysql_real_escape_string($_POST['hart/vaat_ziekte'])."',
                                `antistollingsmiddelen`     = '".mysql_real_escape_string($_POST['antistollingsmiddelen'])."',
                                `phema`                     = '".mysql_real_escape_string($_POST['phema'])."',
                                `allergie`                  = '".mysql_real_escape_string($_POST['allergie'])."'
                                `hiv`                       = '".mysql_real_escape_string($_POST['hiv'])."',
                                `hepatites`                 = '".mysql_real_escape_string($_POST['hepatites'])."',
                                `hemofilie`                 = '".mysql_real_escape_string($_POST['hemofilie'])."',
                                `steunkousen`               = '".mysql_real_escape_string($_POST['steunkousen'])."',
                                `voettype`                  = '".mysql_real_escape_string($_POST['voettype'])."',
                                `orthopedische_afwijking`   = '".mysql_real_escape_string($_POST['orthopedische_afwijking'])."',
                                `huidconditie`              = '".mysql_real_escape_string($_POST['huidconditie'])."',
                                `nagelconditie`             = '".mysql_real_escape_string($_POST['nagelconditie'])."'
                                `nagelaandoening`           = '".mysql_real_escape_string($_POST['nagelaandoening'])."'
                                `voetplantair_rechts`       = '".mysql_real_escape_string($_POST['voetplantair_rechts'])."'
                                `voetplantair_links`        = '".mysql_real_escape_string($_POST['voetplantair_links'])."'
                                `voetdorsaal_rechts`        = '".mysql_real_escape_string($_POST['voetdorsaal_rechts'])."'
                                `voetdorsaal_links`         = '".mysql_real_escape_string($_POST['voetdorsaal_links'])."'
                                
                                WHERE `klant_id` =  '".(INT)$_POST['klant_id']."'");
                               
?>

                        <!--Formulier dat weergeeft waar de gegevens naar toe gewijzigd zijn. -->
            <form action="index.php?page=aanpassenklantgegevens&klant_id=<?php echo $details[0]['klant_id']; ?>" method ="post">

                <table>

                    <td>Klant gegevens</td>
                    <tr></tr>

                    <td>Klant nummer: </td>
                    <td> <input type="text" name ="klant_id" value="<?php echo $details[0]['klant_id']; ?>"READONLY></td>
                    <td></tr>
                    
                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['email']; ?>"><td>
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
                    <td><input type="text" name="email" value="<?php echo $details[0]['klant_nummer']; ?>"><td>
                    <tr></tr>

                    <td>Beroep:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['beroep']; ?>"></td>
                    <tr></tr>
                    
                    <td>Gewicht:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['gewicht']; ?>"></td>
                    <tr></tr>
                    
                    <td>Hart/Vaat ziekte:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['hart_vaat']; ?>"></td>
                    <tr></tr>
                    
                    <td>Diabetus:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['diabetus_melitus']; ?>"></td>
                    <tr></tr>

                    <td>Antistollingsmiddelen:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['anti_stol']; ?>"></td>
                    <tr></tr>

                    <td>Phema:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['phema']; ?>"></td>
                    <tr></tr>

                    <td>Allergie:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['allergie']; ?>"></td>
                    <tr></tr>

                    <td>HIV:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['hiv']; ?>"></td>
                    <tr></tr>
                    
                    <td>Hepatites:</td>
                    <td><input type="text" name="email" value="<?php echo $details[0]['hepatites']; ?>"><td>
                    <tr></tr>

                    <td>Hemofilie:</td>
                    <td><input type="text" name="voorletters" value="<?php echo $details[0]['hemofilie']; ?>"></td>
                    <tr></tr>
                    
                    <td>Steunkousen:</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php echo $details[0]['steunkousen']; ?>"></td>
                    <tr></tr>

                    <td>Voettype:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $details[0]['voettype']; ?>"></td>
                    <tr></tr>

                    <td>Orthopedische Afwijking:</td>
                    <td><input type="text" name="adres" value="<?php echo $details[0]['orthopedische_afwijking']; ?>"></td>
                    <tr></tr>

                    <td>Huidconditie:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $details[0]['huidconditie']; ?>"></td>
                    <tr></tr>

                    <td>Nagelconditie:</td>
                    <td><input type="text" name="postcode" value="<?php echo $details[0]['nagelconditie']; ?>"></td>
                    <tr></tr>

                    <td>Nagelaandoening:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['nagelaandoening']; ?>"></td>
                    <tr></tr>

                    <td>Voetplantair rechts:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['plantaire_rechts']; ?>"></td>
                    <tr></tr>

                    <td>Voetplantair links:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['plantaire_links']; ?>"></td>
                    <tr></tr>

                    <td>Voetdorsaal rechts:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['dorsale_rechts']; ?>"></td>
                    <tr></tr>

                    <td>Voetdorsaal links:</td> 
                    <td><input type="text" name="telefoonnr" value="<?php echo $details[0]['dorsale_links']; ?>"></td>



                </table>

                <input type="submit" name="verwijderen" value="Verwijder deze klant">
                <input type="submit" name="wijzig" value="Wijzigingen opslaan">
                <input type="submit" name="annuleren" value="Annuleren">
            </form>

<?php
   
            echo 'Gegevens zijn gewijzigd.';
}
      




            
          }

                if (!isset($_GET['klant_id']))
                    {       // melding weergeven als er geen klant id is ingevoerd
                    Echo 'Geen klantgegevens ingevoerd.<br><br>';
                    echo "<a href='index.php?page=inzienklantgegevens'>";
                    Echo 'Klik hier';
                    Echo "</a>";
                    
                    }

?>