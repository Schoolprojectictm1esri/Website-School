<?php   
 
            
    
            $stmt           = $db->query("SELECT * FROM behandelingen WHERE ID IS NOT NULL ");
            $result         = $stmt->fetchall();
            
            foreach ($result as $details)
            //print_r($result);
        
        
?>    

<form action="" method ="post">
                
            <table border="0">
            
            <td>Klant gegevens</td>
            <tr></tr>
            
            <td>Klant nummer: </td>
            <td> <input type="text" name ="klantnummer" value="<?php echo $details['id'];?>"</td>
            <td></tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo $details['email']; ?>"<td>
            <tr></tr>
            
            <td>Voornaam:</td>
            <td><input type="text" name="voornaam" value="<?php echo $details['naam']; ?>"></td>
            <tr></tr>
            
            <td>Achternaam:</td>
            <td><input type="text" name="achternaam" value="<?php echo $details['achternaam']; ?>"></td>
            <tr></tr>
            
            <td>Adres:</td>
            <td><input type="text" name="straat" value="<?php echo $details['straat']; ?>"</td>
            <input type="text" name="huisnummer" value="<?php echo $details['huisnummer']; ?>"
            <tr></tr>
            
            <td>Woonplaats:</td>
            <td><input type="text" name="woonplaats" value="<?php echo $details['woonplaats']; ?>"</td>
            <tr></tr>
            
            <td>Postcode:</td>
            <td><input type="text" name="postcode" value="<?php echo $details['postcode']; ?>"</td>
            <tr></tr>
            
            <td>Telnr:</td> 
            <td><input type="text" name="telnr" value="<?php echo $details['telnr']; ?>"</td>
                       
            
            
            </table>
        
            <input type="submit" name="verwijderen" value="Verwijder deze klant">
            <input type="submit" name="wijzig" value="Wijzigingen opslaan">
            <input type="submit" name="annuleren" value="Annuleren">
    </form>
<?php
            if(isset($_POST['wijzig']))
            {
                

?>

        
    <form action="index.php?page=aanpassenklantgegegevens" method ="post">
                
            <table border="0">
            
            <td>Klant gegevens</td>
            <tr></tr>
            
            <td>Klant nummer: </td>
            <td> <input type="text" name ="klantid" value="<?php echo $details['id'];?>"</td>
            <td></tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo $details['email']; ?>"<td>
            <tr></tr>
            
            <td>Voornaam:</td>
            <td><input type="text" name="voornaam" value="<?php echo $details['naam']; ?>"></td>
            <tr></tr>
            
            <td>Achternaam:</td>
            <td><input type="text" name="achternaam" value="<?php echo $details['achternaam']; ?>"></td>
            <tr></tr>
            
            <td>Adres:</td>
            <td><input type="text" name="straat" value="<?php echo $details['straat']; ?>"</td>
            <input type="text" name="huisnummer" value="<?php echo $details['huisnummer']; ?>"
            <tr></tr>
            
            <td>Woonplaats:</td>
            <td><input type="text" name="woonplaats" value="<?php echo $details['woonplaats']; ?>"</td>
            <tr></tr>
            
            <td>Postcode:</td>
            <td><input type="text" name="postcode" value="<?php echo $details['postcode']; ?>"</td>
            <tr></tr>
            
            <td>Telnr:</td> 
            <td><input type="text" name="telnr" value="<?php echo $details['telnr']; ?>"</td>
                       
            
            
            </table>
        
            <input type="submit" name="verwijderen" value="Verwijder deze klant">
            <input type="submit" name="wijzig" value="Wijzigingen opslaan">
            <input type="submit" name="annuleren" value="Annuleren">
    </form>

<?php
                if($_POST['email'] != ""  
                || $_POST['voornaam'] != "" 
                || $_POST['achternaam'] != "" 
                || $_POST['naam'] != "" 
                || $_POST['woonplaats'] != "" 
                || $_POST['telnr'] != "" 
                || $_POST['postcode'] != ""
                || $_POST['straat'] != ""
                || $_POST['huisnummer'] != "");
              
              
              
            else{
                   echo 'Alles moet correct ingevuld zijn';
                }
                $email      = $_POST['email'];
                $voornaam   = $_POST['voornaam'];
                $achternaam = $_POST['achternaam'];
                $woonplaats = $_POST['woonplaats'];
                $telnr      = $_POST['telnr'];
                $postcode   = $_POST['postcode'];
                $straat     = $_POST['straat'];
                $huisnummer = $_POST['huisnummer'];
                $sql=("UPDATE behandelingen 
                SET email = '$email', voornaam = '$voornaam', achternaam = '$achternaam', woonplaats = '$woonplaats', telnr = '$telnr', straat = '$straat', huisnummer = '$huisnummer', where id = id");
                
              
                
                $sth = $db->prepare($sql);
                $doorvoeren = $sth->execute();
                echo 'Gegevens zijn gewijzigd.';
             
            
            
            ?>
  
    
    <?php
    }
    ?>

