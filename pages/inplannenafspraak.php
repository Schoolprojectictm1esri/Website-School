
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
              print ("Op deze dag zijn de volgende tijden bezet: <br>");
              

             
                     
                     $tijdenLijst=$db->query("SELECT * from afspraken where datum LIKE '$date%' ORDER BY datum ASC");
             
              if($tijdenLijst != FALSE){
               
              $result = $tijdenLijst->fetchall();
              
                                     
              foreach ($result as $tijden)
              { 
                  print ("<br>");
                  
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
            
             

          
        
//SELECT *
//FROM afspraken AS a
//JOIN afspraakbehandelingen AS ab ON a.id = ab.afspraak_id
//JOIN behandelingen as b ON ab.behandeling_id = b.id    
     
       

        
     
        ?>
 
    </body>   
</html>
