<?
/**
 * document by Thomas Vermeulen.
 * Created on 13-11-2012.
 * Version 1.0
 */
?>
<?php
session_start();

//afkortingen//
$email = $_POST["emailadres"];
$password = $_POST["password"];

$_SESSION["emailadres"] = $email;
$_SESSION["password"] = $password;

?>
<div id="email_agenda">

<!--
Zelfafhandelend formulier, controle op emailset, password set. Ja? verder naar controle met DB. Nee? Terug naar formulier
-->
<p />

<?php
if(isset ($_POST["emailadres"]) and ($_POST["password"])){
// controle e-mail en password set

}
else{
    ?>   
    <form action="index.php?page=inloggen_bij_agenda" method="POST">
        <table>
            <tr>
                <td>E-mailadres</td>
                <td><input type="text" name="emailadres" value="<?php echo $email ?>" /></td>
            </tr>
            <tr>
                <td>Wachtwoord</td> 
                <td><input type="text" name="password" value="<?php echo $password ?>"/></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Inloggen" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a Href="index.php?page=inloggen_bij_agenda"> Wachtwoord opvragen</a>
                </td>
            </tr>
        </table>
    </form>
<?php
}
?>
</div>