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
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
}

    // id uit de database ophalen
    if (isset($_GET['id'])) {

        $stmt = $db->prepare("SELECT * FROM producten WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $result = $stmt->fetchObject();    
        // update query
        if (isset($_POST['wijzig'])) {
            $stmt = $db->prepare("UPDATE    `producten` set 
                                            naam = :naam,
                                            prijs = :prijs, 
                                            omschrijving = :omschrijving,
                                            actief = :actief, 
                                            categorieid = :categorieid 
                                            WHERE id = :id");
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->bindParam(':naam', $_POST['naam']);
            $stmt->bindParam(':prijs', $_POST['prijs']);
            $stmt->bindParam(':omschrijving', $_POST['omschrijving']);
            $stmt->bindParam(':actief', $_POST['actief']);
            $stmt->bindParam(':categorieid', $_POST['categorieid']);
            $stmt->execute();
                echo 'Productgegevens zijn gewijzigd.';
                echo "<a href='index.php?page=bekijkenproducten'>Klik hier</a>";
                //  geeft foutmelding als er geen gegevens zijn ingevoerd.
        }
        // query om alle categorieen op teh alen
        else{
        $stmt = $db->query("SELECT * FROM categorieen");
        $result10 = $stmt->fetchall();
?>
<div class="inzienklantgegevens">
        <!-- Formulier om productgegevens te wijzigen -->
            <form action="" method ="POST">
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
                        <td><input type="text" name="naam" value="<?php echo $result->naam; ?>"></td>
                    </tr>
                    <tr>
                        <td>Prijs:</td>
                        <td><input type="text" name="prijs" value="<?php echo $result->prijs; ?>"></td>
                    </tr>
                    <tr>
                        <td>Omschrijving:</td>
                        <td><textarea name="omschrijving" rows="3" cols="20"><?php echo $result->omschrijving; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Categorie ID</td>
                        <td><select name="categorieid"><?php 
                            foreach($result10 as $key => $val){ 
                                ?><option><?php echo $val['id'] ?></option> <?php
                            }?></select></td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td><?php echo '<img width=200px height=200px src="'.$result->foto.'">' ?></td>
                        <td><input type="submit" name="uploaden" value="upload foto"</td>
                    </tr>
                    <tr>
                        <td>Actief:</td>
                        <td><input type="checkbox" name="actief" value="1" <?php echo (isset($result->actief) ? 'checked="TRUE"' : ''); ?>> </td>
                    </tr>
                </table>
                <input type="submit" name="wijzig" value="Wijzigingen opslaan">
                <input type="submit" name="verwijderen" value="Verwijder dit product">
                <br />
                <a href="index.php?page=invoegenproduct">Nieuw product toevoegen</a>
                <br />
                <a href="index.php?page=bekijkenproducten">Annuleren</a>
            </form>
<?php
        }
    } 
    else {
        // als er een categorie is laat alle producten en namen zien.
        if(isset($_GET['categorieid'])){
            $stmt = $db->prepare("SELECT * FROM producten WHERE categorieid = :cate");
            $stmt->bindParam(':cate', $_GET['categorieid']);
            $stmt->execute();
            $result5 = $stmt->fetchall();
?>
            <table>
                <tr>
                    <th>Product ID:</th>
                    <th>Naam:</th>
                </tr>
<?php                
            foreach($result5 as $aa => $ab){
                ?>
                    <tr>
                        <td>
                            <?php echo $ab['id'] ?>
                        </td>
                        <td>
                            <?php echo $ab['naam'] ?>
                        </td>
                        <td>
                            <a href="index.php?page=aanpassenproducten&id=<?php echo $ab['id'] ?>">Aanpassen</a>
                        </td>
                    </tr>
<?php
            }
?>
            </table>
<?php
        }
        //eerste formulier om categorieen te kiezen
        else{
        $stmt = $db->query("SELECT * FROM categorieen");
        $result10 = $stmt->fetchall();
        ?>
                <table>
                    <th colspan="2">
                        Selecteer een categorie:
                    </th>
                <?php
                foreach($result10 as $keys => $vals){
                ?>
                    <tr>
                        <td>
                            <?php echo $vals['naam'] ?>
                        </td>
                        <td>
                            <a href="index.php?page=aanpassenproducten&categorieid=<?php echo $vals['id'] ?>">Aanpassen</a>
                        </td>
                    </tr>
        <?php
        }
?> 
                </table>
<?php
        }
    }
?>
</div>