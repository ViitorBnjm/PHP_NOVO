<?php
include 'connect.php';
if(isset($_POST['sub'])){
    $t=$_POST['nomeProduto'];
    $u=$_POST['precoProduto'];
    $p=$_POST['fk_idCategoria'];
    $i="insert into produtos(nomeProduto,precoProduto,fk_IdCategoria)value('$t','$u','$p')";
    mysqli_query($con, $i);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Nome
                        <input type="text" name="nomeProduto">
                    </td>
                </tr>
                <tr>
                    <td>
                        Preço
                        <input type="text" name="precoProduto">
                    </td>
                </tr>
                    <td>
                        Categoria
                        <select name="fk_idProduto">
                            <option value="">-select-</option>
                            <option value="knp"<?php if($f['categoria']=='idCategoria'){ echo "selected='selected'";}?>>Cigarro</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
    </body>
</html>
