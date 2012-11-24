<?
/**
 * document by Thomas Vermeulen.
 * Created on 23-11-2012.
 * Version 1.0
 */
?>
<?php
//kijkt of submit is
if(isset($_POST['submit'])){
    //controleert of alles is ingevult
    if(($_POST['ww1'] != '') and ($_POST['ww2'] != '')){
        //controleer of wachtwoorden aan elkaar gelijk zijn
        if(($_POST['ww1']) == ($_POST['ww2'])){
            $ww1 = mysql_real_escape_string($_POST['ww1']);
            $emailadres = $_POST['emailadres'];
            $stmt = $db->query("update `klanten` SET `wachtwoord` = '".$ww1."', `emailadres` = '".$emailadres."'");
            echo 'Uw wachtwoord is gewijzigd';
        }
        else {
?> 
        <!-- formulier !-->
        <div id="wachtwoordwijzigen">
            <form action="index.php?page=wachtwoord_wijzigen" method="POST">
                <table>
                    <tr>
                        <td>Emailadres</td>
                        <td>"'".$_POST['emailadres']."'"</td>
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
                    <td>".$_POST['emailadres']."</td>
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
                <td>".$_POST['emailadres']."</td>
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