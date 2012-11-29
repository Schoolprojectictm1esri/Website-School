<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" type="text/css" href="danielstyle.css" />
            <title>Aanpassen klantgegevens</title>
            </head>
    <body>
    
    

<?php
            if(isset($details['wijzigen']))
            {
                if($details['e-mail'] != "" 
                || $details['achternaam'] != "" 
                || $details['naam'] != "" 
                || $details['woonplaats'] != "" 
                || $details['telnr'] != "" 
                || $details['postcode'] != "" );
            
                
            else{
                   echo 'Alles moet ingevuld zijn .$leegvakje. is niet ingevuld';
                }
            }

?>
<?php   
 
            
    
            $stmt           = $db->query("SELECT * FROM behandelingen WHERE ID IS NOT NULL ");
            $result         = $stmt->fetchall();
            
            foreach ($result as $details)
            //print_r($result);
        
        
?>
        
    <form action="" method ="post">
                
        <table border="1">
            
            <td colspan="3">Klant gegevens</td>
            <tr></tr>
            
            <td>Email:</td>
            <td><input type="text" name="wEmail" value="<?php echo $details['email']; ?>"<td>
            <tr></tr>
            
            <td>Voornaam:</td>
            <td><input type="text" name="wVoornaam" value="<?php echo $details['naam']; ?>"></td>
            <tr></tr>
            
            <td>Achternaam:</td>
            <td><input type="text" name="wAchternaam" value="<?php echo $details['achternaam']; ?>"></td>
            <tr></tr>
            
            <td>Adres:</td>
            <td><input type="text" name="wAdres" value="<?php echo $details['registratiedatum']; ?>"</td>
            <tr></tr>
            
            <td>Woonplaats:</td>
            <td><input type="text" name="wWoonplaats" value="<?php echo $details['woonplaats']; ?>"</td>
            <tr></tr>
            
            <td>Postcode:</td>
            <td><input type="text" name="wPostcode" value="<?php echo $details['postcode']; ?>"</td>
            <tr></tr>
            
            <td>Telnr:</td> 
            <td><input type="text" name="wTelnr" value="<?php echo $details['telnr']; ?>"</td>
                       
            
            
        </table>
     <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
        <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
        <input type="submit" name="annuleren" value="Annuleren">
    </form>
    
    </body>
</html>
