<?php include_once("../config/db_con.php"); ?>

<?php


if (isset($_POST['deletar'])) {
    $id = mysqli_escape_string($con, $_POST['id']);



    $sql = "DELETE  From carrinho WHERE id= '$id'";




    if (mysqli_query($con, $sql)) {

        header('Location: ../page/carrinho.php');
    } else {

        header('Location: ../index.php?ERRO');
    }



}


?>