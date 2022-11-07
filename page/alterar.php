<?php
//conexão com o banco 
include_once("../config/db_con.php");

//select
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($con, $_GET['id']);

    $slq = "SELECT 
    c.id as id, 
    e.nome as nome, 
    e.vl_venda as vl_venda, 
    c.qtd as qtd, 
    e.ipi as  ipi,
    e.desconto AS desconto,
    c.vl_total as vl_total,
    e.img as img,
    e.id as id_pd
    FROM carrinho c JOIN estoque e on  e.id = c.id_estoque;";
    $resultado = mysqli_query($con, $slq);
    $dados = mysqli_fetch_array($resultado);
    $arquivo = "../img/";

}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="public/css/style.css">
    <title>Alterar</title>
</head>

<body class="bg-primary" style="--bs-bg-opacity: .5;">

    <div class="container mt-5">
        <div class="row justify-content-center">


            <div class="col-3 border mx-2 rounded-3 border border-dark bg-primary text-white" style="--bs-bg-opacity: .5;">

                <img src="<?php echo $arquivo . $dados['img'] ?>" alt="" class="mt-5  mb-5 mx-5">

                <h5 class="card-title">
                    <?php echo "R$ " . number_format($dados['vl_venda'], 2, ',', '.') ?>
                </h5>
                <p class="card-text">
                    <?php echo $dados['nome']; ?>
                </p>

                <form action="../crud/update.php" method="post" class="row g-3">


                    <input type="hidden" name="id_pd" value="<?php echo $dados['id_pd']; ?>">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <input type="hidden" name="vl_venda" value="<?php echo $dados['vl_venda']; ?>">
                    <input type="hidden" name="ipi" value="<?php echo $dados['ipi']; ?>">
                    <input type="hidden" name="desconto" value="<?php echo $dados['desconto']; ?>">
                    <div class="col-md">
                        <input type="number" name="qtd" class="form-control" id="floatingInputGrid" id="qtd"
                            placeholder=<?php echo $dados['qtd']; ?>>

                    </div>
                    <div class="col-md">
                        <input type="submit" value="Alterar" name="alterar"
                            style="background-color: green;margin-bottom: 15px; border-radius: 12px; color: white;">

                    </div>




                </form>

            </div>
        </div>

    </div>

    </div>
    </div>

    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/menu.js"></script>

</body>

</html>