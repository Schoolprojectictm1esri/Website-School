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
    if($result != false){
        //er zijn al dagen beschikbaar
        //loop door dagen heen en 
        echo '<table class="inplannenafspraak">';
        foreach($result as $key => $val){
            echo '';
            //var_dump($val);
        }
        echo '</table>';
    }else{
       //lege dag toon lege klikbare agenda. 
       ?>
       <table class="inplannenafspraak">
           <tr>
               <th> Tijd:</th>
               <th>Beschikbaarheid: </th>
           </tr>
           <tr>
               <td>
                   09:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=09:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   09:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=09:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   10:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=10:00">Beschikbaar</a>
               </td>
           </tr>
            <tr>
               <td>
                   10:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=10:30">Beschikbaar</a>
               </td>
          </tr>
          <tr>
               <td>
                   11:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=11:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   11:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=11:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   12:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=12:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   12:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=12:30">Beschikbaar</a>
               </td>
           </tr>
          <tr>
               <td>
                   13:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=13:00">Beschikbaar</a>
               </td>
           </tr>
          <tr>
               <td>
                   13:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=13:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   14:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=14:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   14:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=14:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   15:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=15:00">Beschikbaar</a>
               </td>
           </tr>
          <tr>
               <td>
                   15:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=15:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   16:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=16:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   16:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=16:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   17:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=17:00">Beschikbaar</a>
               </td>
           </tr>
          <tr>
               <td>
                   17:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=17:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   18:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=18:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   18:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=18:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   19:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=19:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   19:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=19:30">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   20:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=20:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   20:30
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=20:00">Beschikbaar</a>
               </td>
           </tr>
           <tr>
               <td>
                   21:00
               </td>
               <td>
                   <a href="index.php?page=kiesbehandeling&datum=<?php echo $date;?>&tijd=21:00">Beschikbaar</a>
               </td>
           </tr>
       </table>
       <?php
       
    }
    
   }
}else{
    echo '<div class="error">U heeft geen dag geselecteerd. Klik <a href="index.php?page=agenda">hier</a> om terug te gaan.</div>';
}
echo '</div>';