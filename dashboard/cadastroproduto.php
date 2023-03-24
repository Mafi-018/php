<?php
include("config/cabecalho.php");
?>
<div id="cad">
    <div class="signup">
        <form class="imp" method="POST">
            <label for="chk" aria-hidden="true">Cadastre-se</label>
            <input type="text" name="nome" id="nome" placeholder="Nome" required="">
            <input type="text" name="categoria" id="categoria" placeholder="categoria" required="">
            <input type="number" name="preco" id="preco" placeholder="preco" required="">
            <input type="number" name="quantidade" id="quantidade" placeholder="quantidade" required="">
            <input type="date" name="data" id="data" placeholder="data de aquisição" required="">
            <input type="text" name="fornec" id="fornec" placeholder="razão social do fornecedor" required="">
            <input type="text" name="estado" id="estato" placeholder="estado" required="">
            <button class="cads">Sign up</button>
            <a href="index.php"><button type="button">Voltar</button></a>
        </form>
    <?php
        include("config/conexao.php");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $categoria = $_POST["categoria"];
            $preco = $_POST["preco"];
            $quantidade = $_POST["quantidade"];
            $data = $_POST["data"];
            $estado = $_POST["estado"];
            $fornec = $_POST["fornec"];


            $sql ="INSERT INTO produto (nome, categoria, preco, quantidade, data, idFornec, estado) VALUES (:nome, :categoria, :preco, :quantidade, :data, :idFornec, :estado) ";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":categoria", $categoria);
            $stmt->bindValue(":preco", $preco);
            $stmt->bindValue(":quantidade", $quantidade);
            $stmt->bindValue(":data", $data);
            $stmt->bindValue(":idFornec", $fornec);
            $stmt->bindValue(":estado", $estado);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                echo"<div class='sucess'>produto cadastrado com sucesso</div>";
            }else{
                echo"<div class='error'> falha ao registrar o produto</div>";
            }

            $conexao = null;
        }
    ?>
</div>
<?php 
    include("config/rodape.php");
?>     