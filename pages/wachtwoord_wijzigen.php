<?
/**
 * document by Thomas Vermeulen.
 * Created on 23-11-2012.
 * Version 1.0
 */
?>
<?php
$hash = '';
$emailadres = '';
//controleerd of er een value is meegegeven
if(isset($_GET['value'])){
    $hash = $_GET['value'];
    $stmt = $db->prepare("SELECT `emailadres` FROM `klanten` WHERE `hash` = :hash");
    $stmt->bindParam(':hash', $hash);
    $stmt->execute();
    $result = $stmt->fetchObject();
    //controle of er result is
    if(!empty($result)){
        $emailadres = $result->emailadres;      
    }
    else{
        //redirect bij foutmelding geen result
        header('location: index.php');
    }
}
else {
    //redirect bij foutmelding geen value
    if(!isset($_POST['submit'])){
        header('location: index.php');
    }
}

//kijkt of submit is
if(isset($_POST['submit'])){
    //controleert of er een email is
    if(isset($_POST["emailadres"])){
    $emailadres = $_POST["emailadres"];
    }
    //controleert of wachtwoorden niet NULL zijn
    if(($_POST['ww1'] != '') and ($_POST['ww2'] != '')){
        //controleer of wachtwoorden aan elkaar gelijk zijn
        if(($_POST['ww1']) == ($_POST['ww2'])){
            //insert query
            $ww1 = hashPassword($_POST['ww1']);
            $stmt = $db->prepare("update `klanten` SET `wachtwoord` = :ww1, `hash` = '' WHERE `emailadres` = :emailadres");
            $stmt->bindParam(':ww1', $ww1);
            $stmt->bindParam(':emailadrs', $emailadres);
            $stmt->execute();
            echo 'Uw wachtwoord is gewijzigd <br/> <a href="'.$data['baseurl'].'index.php">Klik hier</a> om naar home te gaan.';
        }
        else {
?> 
        <!-- formulier !-->
        <div id="wachtwoordwijzigen">
            <form action="index.php?page=wachtwoord_wijzigen" method="POST">
                <table>
                    <tr>
                        <td>Emailadres</td>
                        <td>
                            <?php 
                            echo $emailadres;
                            echo "<input type='hidden' name='emailadres' value='".$emailadres."' >";
                            ?>                        
                        </td>
                    </tr>
                    <tr>
                        <td>Wachtwoord</td>
                        <td><input type="text" name="ww1"></td>
                    </tr>
                    <tr>
                        <td>Herhaal<br />
                            wachtwoord</td>
                        <td><input type="text" name="ww2"</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Aanpassen" </td>
                    </tr>
                </table>
            </form>
        </div>
<div class="error">Wachtwoorden niet gelijk aan elkaar.</div>  
<?php
        }
    }
    else{
 ?>
    <!-- formulier !-->
    <div id="wachtwoordwijzigen">
        <form action="index.php?page=wachtwoord_wijzigen" method="POST">
            <table>
                <tr>
                    <td>Emailadres</td>
                    <td>
                        <?php 
                        echo $emailadres;
                        echo "<input type='hidden' name='emailadres' value='".$emailadres."' >";
                        ?>                        
                    </td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="text" name="ww1"></td>
                </tr>
                <tr>
                    <td>Herhaal<br />
                        wachtwoord</td>
                    <td><input type="text" name="ww2"</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="aanpassen" </td>
                </tr>
            </table>
        </form>
    </div>
<div class="error">Vul alstublieft beide velden in.</div>

<?php
    }
}
else {
?>
<!-- formulier !-->
<div id="wachtwoordwijzigen">
    <form action="index.php?page=wachtwoord_wijzigen" method="POST">
        <table>
            <tr>
                <td>Emailadres</td>
                    <td>
                        <?php 
                        echo $emailadres;
                        echo "<input type='hidden' name='emailadres' value='".$emailadres."' >";
                        ?>                        
                    </td>
            </tr>
            <tr>
                <td>Wachtwoord</td>
                <td><input type="text" name="ww1"></td>
            </tr>
            <tr>
                <td>Herhaal<br />
                    wachtwoord</td>
                <td><input type="text" name="ww2"</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="aanpassen" </td>
            </tr>
        </table>
    </form>
</div>
<?php
}
?>