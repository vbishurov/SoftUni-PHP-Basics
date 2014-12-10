<?php
$pageTitle = 'Square Root Sum';
$styles = 'styles/01.styles.css';
include 'includes/header.php';
?>
<table>
    <thead>
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>
    </thead>
    <?php
    $sum = 0;
    for ($i = 0; $i <= 100; $i += 2) {
        $square = round(sqrt($i), 2);
        $sum+=$square;
        echo "<tr><td>$i</td><td>$square</td>";
    }
    ?>
    <tfoot>
    <tr>
        <td class="total">Total:</td>
        <td><?php echo $sum;?></td>
    </tr>
    </tfoot>
</table>
<?php
include 'includes/footer.php';
?>
 