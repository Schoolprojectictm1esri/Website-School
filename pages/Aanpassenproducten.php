<?php   
    
        $stmt           = $db->query("SELECT * FROM behandelingen WHERE ID = '13' ");
        $result         = $stmt->fetchall();
        
        
            
        
        
           //  Afbeelding uit de database halen
?>
            <form action="" method ="post">
                <table>
                    <tr>
                        <td colspan="3">Product gegevens</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Afbeelding</td>
                        <td>Productbeschrijving</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo '<img src="imagesdatabase/nummer 1.gif">'?></td>
                        <td><input type="text" name="wVoornaam" value="<?php echo $result[0]['omschrijvingen']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
                <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
                <input type="submit" name="annuleren" value="Annuleren">
            </form>