<?php
/*
  Document   : Aanpassenproducten.php
  Created on : 11-12-2012
  Author     : Daniel
  Description:
  Aanpassen van producten.
 */

/*
 * Edit By Thomas Vermeulen
 * Date: 20-12-2012
 */

// product uit database verwijderen
if (isset($_GET['id'], $_POST['verwijderen'])) {
        $stmt = $db->prepare("DELETE FROM `producten` WHERE id = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
}

    // id uit de database ophalen
    if (isset($_GET['id'])) {

        $stmt = $db->prepare("SELECT * FROM producten WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $result = $stmt->fetchObject();    

        if (!isset($_POST['wijzig'])) {
    ?>
        <!-- Formulier om productgegevens te wijzigen -->
            <form action="" method ="post">
                <table>
                    <tr>
                        <th colspan="3">Product gegevens</th>
                    </tr>
                    <tr>
                        <td>Product id:</td>
                        <td><?php echo $result->id; ?></td>
                    </tr>
                    <tr>
                        <td>Naam:</td>
                        <td><textarea rows="1" cols="10"><?php echo $result->naam; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Prijs:</td>
                        <td><textarea rows="1" cols="10"><?php echo $result->prijs; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Omschrijving:</td>
                        <td><textarea rows="3" cols="20"><?php echo $result->omschrijving; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Categorie ID:</td>
                        <td><textarea rows="1" cols="10"><?php echo $result->categorieid; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td><?php echo '<img width=200px height=200px src="'.$result->foto.'">' ?></td>
                    </tr>
                    <tr>
                        <td>Actief:</td>
                        <td><input type="checkbox" name="actief" value="1" <?php echo (isset($result->actief) ? 'checked="TRUE"' : ''); ?>> </td>
                    </tr>
                </table>
                <input type="submit" name="verwijderen" value="Verwijder dit product">
                <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
                <br />
                <a href="index.php?page=bekijkenproducten">Annuleren</a>
            </form>
<?php
        }
        //  product gegevens wijzigen.
        if (isset($_POST['wijzig'])) {      
                $stmt = $db->prepare("UPDATE `producten` SET `img` =: img `omschrijving` =:omschrijving WHERE id = :id");
                $stmt->bindParam(':img', $_POST['img']);
                $stmt->bindParam(':omschrijving', $_POST['omschrijving']);
                $stmt->execute();
        }
            else {
                echo 'Vul alstublieft een omschrijving in';
            }
?>
            <!-- formulier wat de product gegevens laat zien -->
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
                        <td><?php echo '<img src="' .$result->foto. '">' ?></td>
                        <td><input type="text" name="omschrijving" value="<?php echo $result[0]['omschrijvingen']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="verwijderen" value="Verwijder dit product">
                <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
                <br />
                <a href="index.php?page=bekijkenproducten">Annuleren</a>
            </form>

<?php
        echo 'Productgegevens zijn gewijzigd.';
    //  geeft foutmelding als er geen gegevens zijn ingevoerd.
    } 
    Else {
        Echo 'Geen product ingevoerd.<br><br>';
        Echo "<a href='index.php?page=bekijkenproducten'>Klik hier</a>";
    }
?>