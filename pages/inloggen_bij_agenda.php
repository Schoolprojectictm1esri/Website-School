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
$email = '';
$password = '';
$result;
if(isset ($_POST["emailadres"])) {
	$email = $_POST["emailadres"];
}
if(isset ($_POST["password"])) {
    $password = $_POST["password"];
}

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
    
    $stmt = $db->query("SELECT * FROM klanten WHERE `e-mail` = '".$email."' AND `wachtwoord` = '".$password."'");
    $result = $stmt->fetchObject();

    //resultaat weergeven.
    if(!empty($result)){
        $_SESSION["isingelogd"] = TRUE;
      }
    else{
        print('Onjuiste inlog gegevens');
    }
}
    $show = true;
    if(isset ($_SESSION["isingelogd"])){
        if($_SESSION["isingelogd"] == TRUE){
            $show = false;
        }
    }
    if($show){
    ?>   
    <form action="index.php?page=inloggen_bij_agenda" method="POST">
        <table>
            <tr>
                <td>E-mailadres</td>
                <td><input type="text" name="emailadres" value="<?php echo $email ?>" /></td>
            </tr>
            <tr>
                <td>Wachtwoord</td> 
                <td><input type="password" name="password" value="<?php echo $password ?>"/></td>
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
else{
?>
    U bent succesvol ingelogd,<br />
    Klik op de onderstaande link om naar de homepage te gaan.<br />
    <a Href="index.php?page=home">Klik hier</a><br />
    <form action="http://localhost/Website-School/index.php?page=logout" method="GET">
    <tr>
        <td> 
            <input type="submit" name="logout" value="uitloggen">
        </td>
    </tr>
    </form>
<?php
}
//uitlog button maken
?>
</div>