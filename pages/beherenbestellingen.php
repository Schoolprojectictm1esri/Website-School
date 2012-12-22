<?
/*Auteur : Thom Geertman
*  update by Thomas Vermeulen
*   21-12-2012
*/
?>
<?php
$stmt = $db->prepare("SELECT `klant_id`, `id`, `datum` FROM `bestelling` WHERE `afgerond` IS NULL");
$stmt->execute();
$result = $stmt->fetchall();

if(!empty($result)){
    if(isset($_POST['submitbestelling'])){
        $date = date("Y-m-d");
        $id = $_GET['id'];
        $stmt = $db->prepare("UPDATE `bestelling` SET `afgerond` = :datum WHERE `id`= :id");
        $stmt->bindParam(':datum', $date);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
?>
        Bestelling is afgerond <br />
        <a href="index.php?page=beherenbestellingen">Naar bestellingen</a>
<?php
    }
    else{
        if(isset($_GET['id'])){
            $stmt = $db->prepare("SELECT * FROM `bestelling` WHERE `id` = :id");
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            $result1 = $stmt->fetchobject();

            $stmt = $db->prepare("SELECT * FROM `bestelling_producten` WHERE `bestelling_id` = :id");
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            $result2 = $stmt->fetchobject();

            $stmt = $db->prepare("SELECT * FROM `klanten` WHERE `klant_id` = :klant_id");
            $stmt->bindParam(':klant_id', $result1->klant_id);
            $stmt->execute();
            $result3 = $stmt->fetchobject();

            $stmt = $db->prepare("SELECT * FROM `producten` WHERE `id` = :productid");
            $stmt->bindParam(':productid', $result2->product_id);
            $stmt->execute();
            $result4 = $stmt->fetchobject();
    ?>
                <form action="index.php?page=beherenbestellingen&id=<?php echo $_GET['id'] ?>" method="POST">
                    <table>
                    <tr>
                        <td>Klant ID:</td>
                        <td><?php echo $result1->klant_id ?></td>
                    </tr>
                        <tr>
                        <td>Voorletters:</td>
                        <td><?php echo $result3->voorletters ?></td>
                    </tr>
                    <tr>
                        <td>Achternaam:</td>
                        <td><?php echo $result3->achternaam ?></td>
                    </tr>
                    <tr>
                        <td>Product ID:</td>
                        <td><?php echo $result2->product_id ?></td>
                    </tr>
                    <tr>
                        <td>Aantal:</td>
                        <td><?php echo $result2->aantal ?></td>
                    </tr>
                    <tr>
                        <td>Besteldatum:</td>
                        <td><?php echo $result1->datum ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp</td>
                    </tr>
                    <tr>
                        <td>Bestelling afronden:</td>
                        <td><input type="submit" name="submitbestelling" value="Afronden" /></td>
                    </tr>
                    <tr>
                        <td><a href="index.php?page=beherenbestellingen">Annuleren</a></td>
                    </tr>
                    </table>
                </form>
    <?php
        }
        else{
    ?>
            <form action="index.php?page=beherenbestellingen" method="POST">
                <table>
                    <tr>
                        <th>Bestelling ID:</th>
                        <th>Klant ID:</th>
                        <th>Besteldatum:</th>
                    </tr>
    <?php
                    foreach($result as $een => $rij){        
    ?>
                    <tr>
                        <td><?php echo $rij['id'] ?></td>
                        <td><?php echo $rij['klant_id'] ?></td>
                        <td><?php echo $rij['datum'] ?></td>
                        <td><a href="index.php?page=beherenbestellingen&id=<?php echo $rij['id'] ?>">Status aanpassen</a></td>
                    </tr>
    <?php
                    }
    ?>               
                </table>
            </form>
    <?php

        }
    }
}
else{
    if(isset($_POST['submit2'])){
        $stmt = $db->prepare("SELECT `klant_id`, `id`, `datum`, `afgerond` FROM `bestelling`");
        $stmt->execute();
        $result5 = $stmt->fetchall();
?>
            <form action="index.php?page=beherenbestellingen" method="POST">
                <table>
<?php         
                    foreach ($result5 as $key => $value) {
?>
                    <tr>
                        <th>Bestelling ID:</th>
                        <th>Klant ID:</th>
                        <th>Besteldatum:</th>
                        <th>Afgerond:</th>
                    </tr>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['klant_id'] ?></td>
                        <td><?php echo $value['datum'] ?></td>
                        <td><?php echo $value['afgerond'] ?></td>
                    </tr>
<?php
                    }
?>               
                </table>
            </form>
<?php
        }

    else {
?>
        <form action="index.php?page=beherenbestellingen" method="POST">
            <table>
                <tr>
                    <td>Er zijn geen openstaande bestellingen.</td>
                </tr>
                <tr>
                    <td>Toch een lijst met alle bestellingen?</td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit2" value="Laat zien"></td>
                </tr>
            </table>
        </form>    
<?php
       }
}
?>