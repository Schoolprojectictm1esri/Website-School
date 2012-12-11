/* 
    Document   : Danielstyle
    Created on : 13-nov-2012, 20:43:32
    Author     : Daniel
    Description:
        Purpose of this page follows.
*/

<?php   
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt           = $db->query("SELECT * FROM behandelingen WHERE ID = ".$id." ");
        $result         = $stmt->fetchall();
        
        
            
        
        $img = $db->query("SELECT productencol FROM producten WHERE ID= ".$id."");
           //  Afbeelding uit de database halen
?>
<?php

if (!isset($_POST['wijzig'])) {
    
?>              <!-- Formulier om productgegevens te wijzigen -->
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
    if (isset($_POST['wijzig'])) {
    

         if   ($_POST['omschrijving'] != "");

         else {
            echo 'Vul alstublieft een omschrijving in';
        }
        $img            = $_POST['img'];
        $omschrijving   = $_POST['huisnummer'];
        $sql            = ("
                        UPDATE `klanten` 
                        SET 
                        `img`            = '$img', 
                        `omschrijving`   = '$omschrijving'
                        WHERE id         = '$id'");
        $stmt = $db->prepare($sql);
        $stmt->execute();
       
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

<?php
    echo 'Productgegevens zijn gewijzigd.';
    
?>

<?php
                    }
?>

<?php
        if (isset($_POST['verwijderen'])) {
            $sql = ("DELETE FROM `producten` 
                    Where 
                    `id`	= '$id';
                    ");
            $stmt = $db->prepare($sql);
            $stmt->execute();
}
echo 'Productgegevens zijn succesvol verwijderd.';
?>


<?php
} 
Else
{
    Echo 'Geen product ingevoerd.<br><br>';
    echo "<a href='index.php?page=producteninzien'>";
    Echo 'Klik hier';
    Echo "</a>";
}
?>