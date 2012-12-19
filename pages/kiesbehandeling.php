<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
       <form action="" method="POST">
        <?php
       if(isset($_GET['date']) && $_GET['tijd']){
           
           $datum = $_GET['date'];
           $tijd = $_GET['tijd'];
           
           print ("U heeft de volgende datum gekozen : $datum om $tijd <br>");
           
           $behandeling = $db->prepare("SELECT * FROM behandelingen ORDER BY id ASC");
           $behandeling->execute();
           $Behandelnaam = $behandeling->fetchall();
               
           echo '<select>';   
           foreach ($Behandelnaam as $BehNaam){
               
               
               echo '<option value='.$BehNaam['id'].'>'.$BehNaam['naam'].'</option>';
              
               
             
               
          
      
               
        
                   
       
        ?>     
        <?php
        
           }
          
           echo '</select>';
            
           
       }
       ?>
           <input type="submit" value="Kies">
           
           <?php
           
           if (isset($submit))
           
           ?>
       </form>
    </body>
</html>
