<?php
/**
 * @author Jelle Smeets
 */
if(isset($_GET['hash'])){
    $hash = mysql_real_escape_string($_GET['hash']);
    $activate = $db->query('select * from hash where hash = "'.$hash.'"');
    $hashobj =  $activate->fetchObject();
    //als hash in de database staat
    if(!empty($hashobj)){
        //als de hash geldig is.
       if($hashobj->geldig >= date('Y-m-d H:m:s')){
           //update de boel
          $db->query("update hash set actief = 0 WHERE hash = '$hash'");
          $db->query('update klanten set actief = 1 WHERE klanten_id = "'.$hashobj->klant_id.'"');
          //link om in te loggen.
           echo 'Uw account is geactiveerd. <a href="index.php?page=inloggen_bij_agenda">Klik hier</a> om in te loggen.';
           //hash is niet meer geldig.
       }else{
           echo '<div class="error">De activeerlink is verlopen.</div>';
       }
       //de hash is al in gebruik.
    }else{
        echo '<div class="error">De activeerlink is al gebruikt.</div>';
    }
    //geen hash ingevuld toon activatie tekst.
}else{
   ?>
    <div>
        <h1> Account activatie </h1>
        <p> Er is een e-mail naar uw account gestuurd. Klik op die link om uw account te activeren. </p>
    </div>
   <?php
}
?>
