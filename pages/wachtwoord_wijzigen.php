<?
/**
 * document by Thomas Vermeulen.
 * Created on 23-11-2012.
 * Version 1.0
 */
?>
<?php
if(isset($_POST['submit'])){
    
}
else {
?>
    <div id="wachtwoordwijzigen">
        <form action="index.php?page=wachtwoord_wijzigen" method="POST">
            <table>
                <tr>
                    <td>Emailadres</td>
                    <td>".$_POST['emailadres']."</td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="text" value="wachtwoordwijzigen1"></td>
                </tr>
                <tr>
                    <td>Herhaal<br />
                        wachtwoord</td>
                    <td><input type="text" value="wachtwordwijzigen2"</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="aanpassen" </td>
                </tr>
            </table>
        </form>
    </div>
<?php
}

?>