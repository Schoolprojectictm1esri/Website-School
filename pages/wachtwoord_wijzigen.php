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
        echo 'ok';
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
<div class="error">Vul alstublieft alle velden in.</div>

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