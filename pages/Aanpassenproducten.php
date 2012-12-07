<?php   
        $id = $_GET['id'];
        $stmt           = $db->query("SELECT * FROM behandelingen WHERE ID = ".$id." ");
        $result         = $stmt->fetchall();
        
        
            
        
        $img = $db->query("SELECT productencol FROM producten WHERE ID= ".$id."");
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
                        <td><?php echo '<img src="'.$img.'">'?></td>
                        <td><input type="text" name="wVoornaam" value="<?php echo $result[0]['omschrijvingen']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
                <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
                <input type="submit" name="annuleren" value="Annuleren">
            </form>