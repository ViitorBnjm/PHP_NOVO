<?php
    include 'connect.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<center>
    <form method="POST">
        <table>
            <input type="submit" name="cadastrar" value="cadastrar"><br>
            <form method="POST">
                <label for=""><h1>Lista de Produtos</h1></label><br>
                <table border='5'>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NomeProduto
                        </th>
                        <th>
                            Preço
                        </th>
                        <th>
                            Categoria
                        </th>
                        <th>
                            Excluir
                        </th>
                        <th>
                            Editar
                        </th>
                    </tr>
                <?php
                $sq="select * from produtos as p inner join categoria as c on c.idCategoria = p.fk_idCategoria;";
                $mq=mysqli_query($con,$sq);
                while($f = mysqli_fetch_assoc($mq)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $f['idProduto'];?>
                        </td>
                        <td>
                            <?php echo $f['nomeProduto'];?>
                        </td>
                        <td>
                            <?php echo $f['precoProduto'];?>
                        </td>
                        <td>
                            <?php echo $f['nomeCategoria'];?>
                        </td>
                        <td>
                            <a href="delete_prod.php?id=<?php echo $f['idProduto'];?>">Deletar</a>
                        </td>
                        <td>
                            <a href="edit_prod.php?id=<?php echo $f['idProduto'];?>&nomeProduto=<?php echo $f['nomeProduto']; ?>&idCategoria=<?php echo $f['idCategoria']; ?>&nomeCat=<?php echo $f['nomeCategoria']; ?>">Editar</a>
                        </td>
                    </tr>   
                <?php
                }
                ?>  
                </center>
            </form>
        </table>
    </form>
    <?php
        if(isset($_POST['cadastrar']))
        {      
    ?>
            <form method="POST">
                <input type="text" name="add_nome" placeholder="nome do produto" required><br>
                <input type="number" name="add_preco" placeholder="Preço" required><br>
                <select name="categoria">
                <?php
                    echo "<option value=$   >----Select----</option>";

                    $sqlProduto= mysqli_query($con, "select * from categoria");

                    while($item = mysqli_fetch_assoc($sqlProduto))
                    {
                        $nomeCategoria = utf8_encode($item['nomeCategoria']);
                        $idCategoria = $item['idCategoria'];
                        echo "                                
                            <option value=$idCategoria>$nomeCategoria</option>                                
                        ";
                    }
                ?>
                </select>
                <input type="submit" name="adicionar" value="adicionar">

            </form>
    <?php
        }
    ?>    

</body>
</html>

<?php

if(isset($_POST['adicionar']))
{
    $add_nome = $_POST['add_nome'];
    $add_preco = $_POST['add_preco'];
    $add_categoria = $_POST['categoria'];
    $i = "insert into produtos(nomeProduto, precoProduto, fk_idCategoria) values('$add_nome', '$add_preco', '$add_categoria');";
    mysqli_query($con, $i);
}

?>