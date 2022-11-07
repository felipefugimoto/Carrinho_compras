<?php include_once("./config/db_con.php"); ?>

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <?php
        $sql = "SELECT * FROM estoque";
        $resultado = mysqli_query($con, $sql);
        $arquivo = "img/";
        while ($dados = mysqli_fetch_array($resultado)) {

        ?>


        <div class="col-3 border mx-2 rounded-3 border border-dark bg-primary text-white mt-3 mb-3" style="--bs-bg-opacity: .5;">

            <img src="<?php echo $arquivo . $dados['img'] ?>" alt="" class="mt-5  mb-5 mx-5">


            <h5 class="card-title">
                <?php echo "R$ " . number_format($dados['vl_venda'], 2, ',', '.') ?>
            </h5>
            <p class="card-text">
                <?php echo $dados['img'] ?>
            </p>




            <form action="./crud/addcarrinho.php" method="post" class="row g-3 ">


                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <input type="hidden" name="vl_venda" value="<?php echo $dados['vl_venda']; ?>">
                <input type="hidden" name="ipi" value="<?php echo $dados['ipi']; ?>">
                <input type="hidden" name="desconto" value="<?php echo $dados['desconto']; ?>">
                <input type="hidden" name="vl_total" value=0>
                <div class="col-md mb-2">
                    <input type="number" name="qtd" id="qtd" class="form-control" id="floatingInputGrid">
                </div>
                <div class="col-md mb-2">
                    <input type="submit" value="carrinho" name="carrinho" 
                        style="background-color: green;margin-bottom: 15px; border-radius: 12px; color: white;">
                </div>
            </form>


        </div>

        <?php } ?>

    </div>
</div>