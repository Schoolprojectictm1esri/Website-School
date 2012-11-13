<?php
/**
 * document by Jelle Smeets.
 * Created on 13-11-2012.
 * Version 1.0
 */
//maak globale variabele met instellingen.
global $data;
$data['develop'] = true;
//regelt database connectie. standaard connectie voor sql in samenwerking met xampp.
// laad de database pedicure.
try{
 $db = new PDO('mysql:host=localhost;dbname=pedicure', 'root', '');
}catch(Exception $e){
    //als develop mode ingesteld is laat foutmelding zien.
    if($data['develop'] == true){
        echo 'Data base connection failed: '.$e->getMessage();
    }else{
        echo 'Problemen met het verbinden met de database.';
    }
}
require_once('functions.php');
?>
