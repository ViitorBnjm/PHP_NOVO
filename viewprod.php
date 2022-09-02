<?php
include 'connect.php';

?>
<table border='1'>
    <tr>
        <th>
            Produto
        </th>
        <th>
            Preço do Produto
        </th>
    </tr>

<?php
$sq="select * from produto";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['nomeProd']?> 
        </td>
        <td>
            <?php echo $f['precoProd']?> 
        </td>
    </tr>
    <?php
}
?>