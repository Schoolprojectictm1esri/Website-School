
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
               
            
                                                  
            
              }                         
              else{
                  print ("Er zijn op de door u gekozen dag geen afspraken");
              }                            
                     }             
             else {
                   print ("<br>");
                   print ("Let op! Er is geen datum geselecteed <br>");
              }
            
             

          

     
 $joins=$db->query("SELECT lengte, datum, actief FROM afspraken AS a JOIN afspraakbehandelingen AS ab ON a.id = ab.afspraak_id JOIN behandelingen as b ON ab.behandeling_id = b.id WHERE datum LIKE '$date%' AND actief = 1 ORDER BY datum ASC");  
 $min =$joins->fetchall();
 
 foreach ($min as $duur){
               print ("<br>");  
                  
                  
                  $time = date('H:i:s', strtotime($duur['datum']));
                  $lengteMin = date('i', strtotime($duur['lengte']));
                  
                  
                 
                 
  $morgen = date ('H:i:s',strtotime ("$time +$lengteMin minutes+30minutes"));
  print("$time - $morgen");

               
 }
  








        
        ?>
 
    </body>   
</html>
