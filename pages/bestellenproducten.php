<?php
if (isset($_POST['bestel'])) {
/*$stmt = $db->query ('INSERT INTO bestelling_producten VALUES "'.$bestellingid.'","'.$productid.'",aantal'); */
}
    
else { ?> <table id="bestellenproducten">
        <tr>
            <td colspan="2"><img src=""/><!--<?php $stmt = $db->query ('SELECT foto FROM producten WHERE id="'.$productid.'"')  ?>-->
                                 <!--afbeelding product-->
            </td>
        </tr>
        <tr>
            <td><?php 
                    $productid = 0;
                    $stmt = $db->query
                        ('SELECT naam FROM producten WHERE id= "'.$productid.'"'); ?>
                <!--naam product--></td>
            <td>Aantal:
                <form action="aantal" method="POST">
                    <select name="aantalproducten">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </form>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Prijs:
                <?php 
                //$aantal= $_POST['aantal'];
                $prijs= $stmt = $db->query ('SELECT prijs FROM producten WHERE id="'.$productid.'"');
                $totaal =/*$aantal**/$prijs;
                echo "€ $totaal";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Bestel" name="bestel" /></td>
        </tr>
</table>
<?php } ?>