<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="danielstyle.css" />
        <title></title>
    </head>
    <body>
       

 <?php   
    
        $stmt           = $db->query("SELECT * FROM behandelingen WHERE ID = '13' ");
        $result         = $stmt->fetchall();
        
        foreach ($result as $details)
            
        
        
        ?>
        
            <form action="" method ="post">
            
                
            <table>
            
            <td colspan="3">Product gegevens</td>
            <tr></tr>
            
          <!-- "php echo "<img src='C:\Users\Daniel\Pictures\Images Database\nummer 1.jpeg'>"
           
           echo "<img src='this_pic.jpg'>"; -->

            <td><?php echo '<img src="imagesdatabase/nummer 1.gif">'?></td>
            <tr></tr>
            
            <td></td><td>Productbeschrijving</td><tr></tr>
             <td><?php echo '<img src="imagesdatabase/nummer 1.gif">'?></td>
            <td><input type="text" name="wVoornaam" value="<?php echo $details['omschrijvingen']; ?>"></td>
            <tr></tr>
            
            </table>
                 <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
        <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
        <input type="submit" name="annuleren" value="Annuleren">
    </form>
    </body>
</html>