<?php
/**
 * @author Jelle Smeets
 */
if(isset($_GET['hash'])){
    $hash = mysql_real_escape_string($_GET['hash']);
    $activate = $db->query('select * from hash where hash = "'.$hash.'"');
    $hashobj =  $activate->fetchObject();
    
    if(!empty($hashobj)){
       if($hashobj->geldig >= date('Y-m-d H:m:s')){
          $db->query("update hash set actief = 0 WHERE hash = '$hash'");
          $db->query('update klanten set actief = 1 WHERE klanten_id = "'.$hashobj->klant_id.'"');
           echo 'Uw account is geactiveerd. <a href="index.php?page=inloggen_bij_agenda">Klik hier</a> om in te loggen.';
       }else{
           echo '<div class="error">De activeerlink is verlopen.</div>';
       }
    }else{
        echo '<div class="error">De activeerlink is al gebruikt.</div>';
    }
}else{
   echo '<div class="error">U heeft geen activeercode in gebruik.</div>';
}
?>
