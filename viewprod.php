<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>

<?php
    include 'connect.php';
    // include 'checkLogin.php';
    // include 'checkAdmin.php';



    if(isset($_POST['addShoppingCart'])){
    
        $product_id = (int)$_POST['idProduto'];
        $quantity = (int)$_POST['quantity'];
        $nomeProduto = $_POST['nomeProduto'];

        $idCompra = 1;

        $sqlGetCompra="select * from compra_produto where FK_COMPRA={$idCompra} AND FK_PRODUTO ={$product_id}";
        $queryGetCompra= mysqli_query($con, $sqlGetCompra);
        $resultCompra=mysqli_fetch_assoc($queryGetCompra);

        $ExisteCompra = isset($resultCompra);    
        if(isset($resultCompra)){
            
            $sqlAddOrUpdate = "
            UPDATE compra_produto set QTD_PRODUTO={$quantity} 
            WHERE FK_PRODUTO ={$product_id} and FK_COMPRA={$idCompra};
            ";

        }else{
            $sqlAddOrUpdate = "
            INSERT INTO compra_produto (FK_PRODUTO,FK_COMPRA,QTD_PRODUTO) 
            VALUES ({$product_id}, {$idCompra},{$quantity});
            ";

        }

        mysqli_query($con, $sqlAddOrUpdate);




        // header('location:home.php');

    }

?>

<a href="loginv2.php">Home - Login</a>

<table border='1'>
    <tr>
        <th>
            Id
        </th>
        <th>
            Nome
        </th>
        <th>
            Preço
        </th>
        <th></th>

    </tr>

<?php
$sq="

select * from produto as p
left join compra_produto as cp on cp.FK_PRODUTO = P.ID_PRODUTO

";



$qu=mysqli_query($con,$sq);
while($produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $produto['ID_PRODUTO']?>
        </td>
        <td>
            <?php echo $produto['NOME_PRODUTO']?>
        </td>
        <td>
            <?php echo $produto['price']?>
        </td>
        <td>
            <form method="POST" enctype="multipart/form-data">
                <input type="number" name="quantity" value="<?=$produto['QTD_PRODUTO']?>" min="1" placeholder="Quantity" required>
                <input type="hidden" name="idProduto" value="<?=$produto['ID_PRODUTO']?>">
                <input type="hidden" name="nomeProduto" value="<?=$produto['NOME_PRODUTO']?>">
                <input type="submit" name="addShoppingCart" value="Adicionar">
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>

<br>
<br>
<br>



<table border='1'>
    <tr>
        <th>
            Produto
        </th>
        <th>
            Preço
        </th>
        <th>
            Quantidade
        </th>
        <th>
            Total Preço
        </th>
    </tr>

<?php
$sq="

SELECT * FROM compra_produto as cp
inner join compra as c on c.ID_COMPRA = cp.FK_COMPRA
inner join produto as p on p.ID_PRODUTO = cp.FK_PRODUTO

";
$qu=mysqli_query($con,$sq);
while($compra_produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $compra_produto['NOME_PRODUTO']?>
        </td>
        <td>
            <?php echo $compra_produto['price']?>
        </td>
        <td>
            <?php echo $compra_produto['QTD_PRODUTO']?>
        </td>
        <td>
            <?php echo $compra_produto['QTD_PRODUTO']*$compra_produto['price']?>
        </td>

    </tr>
    <?php
}
?>
</table>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>