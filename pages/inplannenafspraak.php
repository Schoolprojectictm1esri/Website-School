
<!DOCTYPE html>
<html>
    <head>       
        <title>Inplannen afspraak</title>
    </head>
    <body> 
      <?php
        
        if(isset($_GET['date']))
            // controleert of er een 'date' is meegegeven
            {
              $date = $_GET['date'];              
              print ("U heeft de volgende datum geselecteerd: $date <br>");          
              print ("Op deze dag zijn de volgende tijden bezet: <br>");
              

             
                     
              $tijdenLijst=$db->query("SELECT * from afspraken where datum LIKE '$date%' ORDER BY datum ASC");
             // query om de afspraken op de desbetreffende dag op te halen
              if($tijdenLijst != FALSE){
               
            
                                                             
              }     // als 'date' geen waarde is meegegeven , print het volgende                    
              
               
              
              
              // als er geen resultaten zijn, print dan het volgende;
                                
             else {
                   print ("<br>");
                   print ("Let op! Er is geen datum geselecteed <br>");
              }
            
             

          

     
 $joins=$db->query("SELECT lengte, datum, actief FROM afspraken AS a JOIN afspraakbehandelingen AS ab ON a.id = ab.afspraak_id JOIN behandelingen as b ON ab.behandeling_id = b.id WHERE datum LIKE '$date%' AND actief = 1 ORDER BY datum ASC");  
 $min =$joins->fetchall();
 //query om de behandelingen aan de afspraken te koppelen en zodanig de afspraaktijd + behandeltijd te printen
 foreach ($min as $duur){
               print ("<br>");  
                  
                  
                  $time = date('H:i:s', strtotime($duur['datum']));
                  $lengteMin = date('i', strtotime($duur['lengte']));
     // variabelen vastzetten aan 'datum' en 'lengte'             
                  
                 
                 
  $nieuweTijd = date ('H:i:s',strtotime ("$time +$lengteMin minutes+15minutes"));
  print("$time - $nieuweTijd <br>");
// geef de tijd weer en de tijd waarop de afspraak verloopt
 
  
  
  echo "<a href=index.php?page=inplannenafspraak&date={$_GET['date']}&tijd=$nieuweTijd>$nieuweTijd</a><br>";

  
 }
 
 
 if(isset($_GET['date']) && ($_GET['tijd'])){
      
     print ("Hoi");
 
 
  
 }
 
 else("Geen tijd");


            }





        
        ?>
 
    </body>   
</html>
