<?php
/**
 * @author Jelle Smeets
 */ 
//include date classe.
echo '<div class="content">';
include './includes/Date.php';
if(isset($_GET['date'])){
   $objdb = new Date();
   $date = date('Y-m-d', strtotime($_GET['date'])); 
   //als datum zondag is of in vakantie valt.
   if($objdb->dayOfWeek() == 'Zondag' || invakantie($date)){
       echo '<div class="error"> De dag die u geselecteerd heeft is niet beschikbaar. Klik <a href="index.php?page=agenda">hier</a> om terug te gaan.</div>';
   }else{
       //haal afspraken op.
    $dbdate = $date.'%';
    $stmt = $db->prepare("SELECT * from afspraken where datum LIKE :dbdate order by datum ASC");
    $stmt->bindParam(':dbdate', $dbdate);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //ugly fix voor tijden. Geen idee hoe anders.
    $tijden = array();
    $tijden[0]['tijd'] = '09:00';
    $tijden[1]['tijd'] = '09:30';
    $tijden[2]['tijd'] = '10:00';
    $tijden[3]['tijd'] = '10:30';
    $tijden[4]['tijd'] = '11:00';
    $tijden[5]['tijd'] = '11:30';
    $tijden[6]['tijd'] = '12:00';
    $tijden[7]['tijd'] = '12:30';
    $tijden[8]['tijd'] = '13:00';
    $tijden[9]['tijd'] = '13:30';
    $tijden[10]['tijd'] = '14:00';
    $tijden[11]['tijd'] = '14:30';
    $tijden[12]['tijd'] = '15:00';
    $tijden[13]['tijd'] = '15:30';
    $tijden[14]['tijd'] = '16:00';
    $tijden[15]['tijd'] = '16:30';
    $tijden[16]['tijd'] = '17:00';
    $tijden[17]['tijd'] = '17:30';
    $tijden[18]['tijd'] = '18:00';
    $tijden[19]['tijd'] = '18:30';
    $tijden[20]['tijd'] = '19:00';
    $tijden[21]['tijd'] = '19:30';
    $tijden[22]['tijd'] = '20:00';
    $tijden[23]['tijd'] = '20:30';
    $tijden[24]['tijd'] = '21:00';
    
    if($result != false){
        //er zijn al dagen beschikbaar
        //loop door dagen heen en 
        echo '<table class="inplannenafspraak">
                       <tr>
               <th> Tijd:</th>
               <th>Beschikbaarheid: </th>
           </tr>';
        foreach($tijden as $key => $val){
            echo '           <tr>
               <td>
                  '.$val['tijd'].'
               </td>
               <td>';
            if(checktijd($val['tijd'], $date)){
                echo 'Bezet';
            }else{
                echo '<a href="index.php?page=kiesbehandeling&datum='.$date.'&tijd='.$val['tijd'].'">Beschikbaar</a>';
            }
               echo '</td>
           </tr>';
        }
        echo '</table>';
    }else{
       //lege dag toon lege klikbare agenda. 
      echo '<table class="inplannenafspraak">
                <tr>
                    <th> Tijd:</th>
                    <th>Beschikbaarheid: </th>
                </tr>';
      foreach($tijden as $key => $val){
      echo '<tr>
               <td>
                  '.$val['tijd'].'
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum='.$date.'<?php echo $date;?>&tijd='.$val['tijd'].'">Beschikbaar</a>
               </td>
           </tr>';
        }
        echo '</table>';
       
    }
    
   }
}else{
    echo '<div class="error">U heeft geen dag geselecteerd. Klik <a href="index.php?page=agenda">hier</a> om terug te gaan.</div>';
}
echo '</div>';