
<!DOCTYPE html>
<html>
    <head>       
        <title>Inplannen afspraak</title>
    </head>
    <body>
        <?php
        
        if(isset($_GET['datum']))
            {
              $datum = $_GET['datum'];
        }        
        else{
           print ("Let op! Er is geen datum geselecteed");
        }
        
       if($_GET['datum']){
        
        $stmt = $db->query("select * from afspraken WHERE datum = " . $_GET['datum']);
        $result = $stmt->fetchobject();
        
      
        }
       
      
  //    $tijd = 800;
      //   $tijd2 = $tijd + 15;
         //       while ($tijd <= 2000){
           //       print("$tijd - $tijd2 <br>");
           //       $tijd + 15;
                
           //     }
      
       
        ?>
    </body>
</html>
