<?
/**
 * document by Thomas Vermeulen.
 * Created on 13-11-2012.
 * Version 1.0
 */
?>
<?php
session_start();
$_SESSION["emailadres"] = $email;
$_SESSION["password"] = $password;

//afkortingen//
$email = $_GET["emailadres"];
$password = $_GET["password"];
?>
<div id="email_agenda">

<!--
Zelfafhandelend formulier, controle op emailset, passoword set. Ja? verder naar controle met DB. Nee? Terug naar formulier
-->
<p />

    <form action="index.php?" method="get">
        <table>
            <tr>
                <td>E-mailadres</td>
                <td><input type="text" name="emailadres" /></td>
            </tr>
            <tr>
                <td>Wachtwoord</td> 
                <td><input type="text" name="password" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Inloggen" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a Href="index.php?page=inloggen_bij_agenda"> Wachtwoord vergeten</a>
                </td>
            </tr>
        </table>

<?php
if(isset($_SESSION['emailadres']) == TRUE );{
// actie 1
    if(isset($_SESSION['password']) == TRUE );{
        //actie 2
        else{
            //actie 3
        }
    }
}
else{ ;
}

?>
</div>