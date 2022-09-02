<?php
include 'connect.php';
include 'checklogin.php';
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
while($=  mysqli_fetch_assoc($prc)){
    ?>
    <tr>
        <td>
            <?php echo $p['prod']?> 
        </td>
        <td>
            <?php echo $prc['preco']?> 
        </td>
    </tr>
    <?php
}
?>