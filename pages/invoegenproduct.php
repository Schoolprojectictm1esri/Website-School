<?php
/*
  Document   : invoegenproduct.php
  Created on : 20-12-2012
  Author     : Thomas
  invoeren van producten.
 */
?>
<?php

if(isset($_POST['Opslaan'])){
    $stmt = $db->prepare("INSERT INTO `producten`(`naam`, `prijs`, `omschrijving`, `actief`, `foto`, `categorieid`) 
                                       VALUES    (naam = :naam,
                                            prijs = :prijs, 
                                            omschrijving = :omschrijving,
                                            actief = :actief, 
                                            categorieid = :categorieid)");

            $stmt->bindParam(':naam', $_POST['naam']);
            $stmt->bindParam(':prijs', $_POST['prijs']);
            $stmt->bindParam(':omschrijving', $_POST['omschrijving']);
            $stmt->bindParam(':actief', $_POST['actief']);
            $stmt->bindParam(':categorieid', $_POST['categorieid']);
            $stmt->execute();
        echo 'Product is toegevoegt, <a href=index.php?page=aanpassenproducten>Klik hier </a>';
}
else {
    $stmt = $db->query("SELECT * FROM categorieen");
    $result = $stmt->fetchall();
    ?>
    <div class="inzienklantgegevens">
        <!-- Formulier om productgegevens te wijzigen -->
            <form action="index.php?page=invoegenproduct" method ="POST">
                <table>
                    <tr>
                        <th colspan="3">Product gegevens</th>
                    </tr>
                    <tr>
                        <td>Product id:</td>
                        <td>Word automatisch toegekent</td>
                    </tr>
                    <tr>
                        <td>Naam:</td>
                        <td><input type="text" name="naam"></td>
                    </tr>
                    <tr>
                        <td>Prijs:</td>
                        <td><input type="text" name="prijs"></td>
                    </tr>
                    <tr>
                        <td>Omschrijving:</td>
                        <td><textarea name="omschrijving" rows="3" cols="20"></textarea></td>
                    </tr>
                    <tr>
                        <td>Categorie ID</td>
                        <td><select name="categorieid"><?php 
                            foreach($result as $key => $val){ 
                                ?><option value=".$val[id]."><?php echo $val['naam'] ?></option> <?php
                            }?></select></td>
                    </tr>
                    <tr>
                        <td>Actief:</td>
                        <td><input type="checkbox" name="actief" value="1"> </td>
                    </tr>
                </table>
                <input type="submit" name="Opslaan" value="Opslaan">
                <br />
                <a href="index.php?page=bekijkenproducten">Annuleren</a>
            </form>
<?php 
}

?>
</div>