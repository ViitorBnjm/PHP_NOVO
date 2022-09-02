<?php
include 'connect.php';
if(isset($_POST['sub'])){
    $p=$_POST['prod'];
    $prc=$_POST['preco'];

    $i="insert into produto(nomeProd,precoProd)value('$p','$prc')";
    mysqli_query($con, $i, $sq);
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
                        Nome do Produto
                        <input type="text" name="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Preço do Produto
                        <input type="text" name="user">
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
