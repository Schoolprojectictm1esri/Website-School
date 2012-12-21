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
    if(isset($_GET['id'])){
        $stmt = $db->prepare("SELECT * FROM `bestelling` WHERE `id` = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $result1 = $stmt->fetchall();
        
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
<form action="index.php?page=beherenbestellingen" method="POST">
    <table>
    <tr>
        <th>Klant ID:</th>
        <th>Product ID:</th>
        <th>Besteldatum:</th>
    </tr>
<?php
?>
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
else{
    echo 'Er zijn geen onafgeronde bestellingen';
    echo 'Ook afgeronde bestellingen zien?';
    if(isset($_POST['submit2'])){
        //maken van query en alles in foreach zetten
    }
}

?>