<?php include_once("../config/db_con.php"); ?>

<?php
//Calcula o preço x quantidade
function quantidade($vl_qtd, $valor)
{
    return $valor * $vl_qtd;
}
//Calcula o valor do desconto
function descontos($vl_desconto, $valor)
{
    return ($valor * $vl_desconto) / 100;
}
//Calcula o valor do IPI
function calc_IPI($vl_ipi, $valor)
{
    return ($valor * $vl_ipi) / 100;
}

//Calcula o valor do deconto + ipi
function soma_desconto_ipi($calc_desconto, $calc_ipi)
{
    return $calc_desconto + $calc_ipi;
}

//Calcular Preço * Quantidade - Desconto (%) + IPI (%)
function calc_total($vl_preco_quantidade, $vl_ipi_desconto)
{
    return $vl_preco_quantidade - $vl_ipi_desconto;
}

if (isset($_POST['carrinho'])) {
    $id = mysqli_escape_string($con, $_POST['id']);
    $venda = $_POST['vl_venda'];
    $ipi = $_POST['ipi'];
    $desconto = $_POST['desconto'];
    $qtd = mysqli_escape_string($con, $_POST['qtd']);
   
       
    $valor = (quantidade($qtd, $venda) - (descontos($desconto, $venda) + calc_IPI($ipi, $venda)));
    $_vl_total = mysqli_escape_string($con, $valor);

    $sql = "INSERT INTO carrinho(id_estoque, qtd, vl_total) VALUES ('$id', '$qtd','$_vl_total')";




    if (mysqli_query($con, $sql)) {

        header('Location: ../page/carrinho.php');
    } else {
        header('Location: index.php?ERRO');
    }

}


?>