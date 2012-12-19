<?php
$to = 'thomasvermeulen_2@hotmail.com';
$subject = 'test';
$txt = 'KBS TEST';
$headers = 'FROM: noreply@pedicurepraktijkdesiree.nl';
mail($to, $subject, $txt, $headers);
?>
