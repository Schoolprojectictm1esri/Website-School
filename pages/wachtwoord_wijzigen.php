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
if(isset($_GET['value'])){
    $hash = $_GET['value'];
    $stmt = $db->query("SELECT `emailadres` FROM `klanten` WHERE `hash` = '".$hash."'");
    
    $result = $stmt->fetchObject();
    
    if(!empty($result)){
        $emailadres = $result->emailadres;      
    }
    else{
        header('location: index.php');
    }
}
else {
    if(!isset($_POST['submit'])){
        header('location: index.php');
    }
}
// controleer of hash bestaat
// hash van voorbeeld account :65dcf551912dbd829eea17885cf14e88
//kijkt of submit is
if(isset($_POST['submit'])){
    if(isset($_POST["emailadres"]))
    {
        $emailadres = $_POST["emailadres"];
    }
    //controleert of alles is ingevult
    if(($_POST['ww1'] != '') and ($_POST['ww2'] != '')){
        //controleer of wachtwoorden aan elkaar gelijk zijn
        if(($_POST['ww1']) == ($_POST['ww2'])){
            $ww1 = mysql_real_escape_string($_POST['ww1']);
            $stmt = $db->query("update `klanten` SET `wachtwoord` = '".$ww1."', `hash` = '' WHERE `emailadres` = '".$emailadres."'");
            echo 'Uw wachtwoord is gewijzigd <br/> <a href="http://localhost/Website-School/index.php">Klik hier</a> om naar home te gaan.';
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