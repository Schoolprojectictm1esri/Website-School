<?php
/*
  Document   : Aanpassenproducten.php
  Created on : 11-12-2012
  Author     : Daniel
  Description:
  Aanpassen van producten.
 */
// product uit database verwijderen
    if (isset($_POST['id'], $_POST['verwijderen'])) {
            $stmt = $db->query("DELETE FROM `producten` WHERE id = :id");
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
    }

    // id uit de database ophalen
    if (isset($_GET['id'])) {

        $stmt = $db->query("SELECT * FROM producten WHERE id = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
        $result = $stmt->fetchall();
        //  Afbeelding uit de database halen
        $img = $db->query("SELECT foto FROM producten WHERE id = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
        
?>

<?php
    if (!isset($_POST['wijzig'])) {
?>
    <!-- Formulier om productgegevens te wijzigen -->
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
                    <td><?php echo '<img src="' . $img . '">' ?></td>
                    <td><input type="text" name="omschrijving" value="<?php echo $result[0]['omschrijving']; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
            <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
            <input type="submit" name="annuleren" value="Annuleren">
        </form>
<?php
    }
?>

<?php
    //  product gegevens wijzigen.
    if (isset($_POST['wijzig'])) {


        if ($_POST['omschrijving'] != "")
           
        $stmt = $db->query("
                                UPDATE `producten` 
                                SET 
                                `img`                  =: img 
                                `omschrijving` =:omschrijving
                                WHERE id = :id");
            $stmt->bindParam(':img', $_POST['img']);
            $stmt->bindParam(':omschrijving', $_POST['omschrijving']);
            $stmt->execute();
            
           /*  if (isset($_POST['id'], $_POST['verwijderen'])) {
            $stmt = $db->query("DELETE FROM `producten` WHERE id = :id");
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute(); */
            
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
                    <td><?php echo '<img src="' . $img . '">' ?></td>
                    <td><input type="text" name="omschrijving" value="<?php echo $result[0]['omschrijvingen']; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
            <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
            <input type="submit" name="annuleren" value="Annuleren">
        </form>

<?php
        echo 'Productgegevens zijn gewijzigd.';
?>

<?php
    }
?>

<?php
    //  geeft foutmelding als er geen gegevens zijn ingevoerd.
    } Else {
        Echo 'Geen product ingevoerd.<br><br>';
        Echo "<a href='index.php?page=bekijkenproducten'>";
        Echo 'Klik hier';
        Echo "</a>";
    }
?>