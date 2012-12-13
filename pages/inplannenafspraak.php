
<!DOCTYPE html>
<html>
    <head>       
        <title>Inplannen afspraak</title>
    </head>
    <body>
        <?php
        
        if(isset($_GET['date']))
            {
              $date = $_GET['date'];
              
              print ("U heeft de volgende datum geselecteerd: $date <br>");          
              print ("Op deze dag zijn de volgende tijden mogelijk: <br>");
              
             
              $tijdenLijst=$db->query("SELECT * from AFSPRAKEN where datum LIKE '$date%'");
              if($tijdenLijst != FALSE){
               
              $result = $tijdenLijst->fetchall();
              
                                   
              foreach ($result as $tijden)
              {
                   
                
 
                  print ("<br>");
                  print ("{$tijden['datum']} <br> ");
                  
                                   
                  $time = date('H:i:s', strtotime($tijden['datum']));
                  print ($time);
              }
             
              }
             
              
              else{
                  print ("Er zijn op de door u gekozen dag geen afspraken");
              }
              
              
              }
              else {
                  print ("<br>");
                   print ("Let op! Er is geen datum geselecteed <br>");
              }
              
     
        
              
        
          
        
       
     
        ?>
    </body>   
</html>
