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