<?php include_once("../config/db_con.php"); ?>

<?php include_once('../models/headerCarrinho.php'); ?>
    <div class="container mt-5">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">valor de fábrica</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">IPI(%)</th>
                    <th scope="col">Desconto(%)</th>
                    <th scope="col">Valor total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
            c.id as id, 
            e.nome as nome, 
            e.vl_venda as vl_venda, 
            c.qtd as qtd, 
            e.ipi as  ipi,
            e.desconto AS desconto,
            c.vl_total as vl_total
            FROM carrinho c JOIN estoque e on  e.id = c.id_estoque";
                $resultado = mysqli_query($con, $sql);
                if (mysqli_num_rows($resultado)) {
                    while ($dados = mysqli_fetch_array($resultado)) {

                ?>
                <tr>
                    <th>
                        <?php echo $dados['nome'] ?>
                    </th>
                    <td>
                        <?php echo "R$" . $dados['vl_venda'] ?>
                    </td>
                    <td>
                        <?php echo $dados['qtd'] ?>
                    </td>
                    <td>
                        <?php echo $dados['ipi'] ?>
                    </td>
                    <td>
                        <?php echo $dados['desconto'] ?>
                    </td>
                    <td>
                        <?php echo $dados['vl_total'] ?>
                    </td>
                    <td><a href="alterar.php?id=<?php echo $dados['id'] ?>" class="btn btn-success">Alterar</a></td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Excluir
                        </button>
                    </td>

                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo excluir sua compra?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="../crud/deletar.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">


                                    <input type="submit" class="btn btn-danger" value="Sim desejo deletar"
                                        name="deletar">

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                } else { ?>
                <tr>
                    <th>---</th>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <?php
        $sql = "SELECT SUM(c.vl_total) as total FROM carrinho c JOIN estoque e on c.id_estoque = e.id;";
        $resultado = mysqli_query($con, $sql);
        while ($dados = mysqli_fetch_array($resultado)) {

        ?>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-4">
                    <p class="h4">
                        <?php echo "Soma Total - R$" . $dados['total'] . "<br>"; ?>
                    </p>
                </div>
            </div>
        </div>

        <?php } ?>

        <a href="../index.php" class="btn btn-primary"> Adicionar mais</a>

    </div>

 