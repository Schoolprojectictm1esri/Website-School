<?php
/**
 * document by Jelle Smeets.
 * Created on 13-11-2012.
 * Version 1.0
 */

//regelt database connectie. standaard connectie voor sql in samenwerking met xampp.
// laad de database pedicure.
 $db = new PDO('mysql:host=localhost;dbname=pedicure', 'root', '');

require_once('functions.php');
?>
