<?
/**
 * document by Thomas Vermeulen.
 * Created on 7-12-2012.
 * Version 1.0
 */
?>
<?php
// controleer of hash bestaat
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
//link nog goed maken
        header('location: index.php');
    }
}

//kijkt of submit is
if(isset($_POST['submit'])){
    if(isset($_POST['bevestigd'])){
        
    }
    else {

    }
}
else {
    
}

?>


<?php
//email naar klant na bevestiging
    //tijdelijk
    $afspraakID = '';
    $datumafspraak = '';
    $to = $_POST['emailadres'];
    $subject = "Bevestiging afspraak:.$afspraakID.";
    $from = "noreply@pedicurepraktijkdesiree.nl";
    $message = "
        <html>
            <head>
                <title>Bevestiging afspraak</title>
            </head>
        <body>
            <table>
                <tr>
                    <th>Beste,<th>
                </tr>
                <tr>
                    <td>Bij deze wil ik u meedelen dat de afspraak gemaakt voor</td>
                </tr>
                <tr>
                    <td>.$datumafspraak.</td>
                </tr>
                <tr>
                    <td>is bevestigd.</td>
                </tr>
                <tr>
                    <td>Met vriendelijke groet PedicurePraktijk Desiree.
                </tr>
            </table>
        </body>
        </html>
        "
?>
<?php
//email naar klant na afwijzing
    //tijdelijk
    $afspraakID = '';
    $datumafspraak = '';
    $to = $_POST['emailadres'];
    $subject = "Annulering afspraak:.$afspraakID.";
    $from = "noreply@pedicurepraktijkdesiree.nl";
    $message = "
        <html>
            <head>
                <title>Annulering afspraak</title>
            </head>
        <body>
            <table>
                <tr>
                    <th>Beste,<th>
                </tr>
                <tr>
                    <td>Bij deze moet ik u helaas meedelen dat de afspraak gemaakt voor</td>
                </tr>
                <tr>
                    <td>.$datumafspraak.</td>
                </tr>
                <tr>
                    <td>is geannuleerd.</td>
                </tr>
                <tr>
                    <td>Met vriendelijke groet PedicurePraktijk Desiree.
                </tr>
            </table>
        </body>
        </html>
        "
?>