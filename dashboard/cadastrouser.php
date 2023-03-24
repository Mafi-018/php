<?php
include("config/cabecalho.php");
?>
<div id="cad">
    <div class="signup">
        <form class="imp" method="POST">
            <label for="chk" aria-hidden="true">Cadastre-se</label>
            <input type="text" name="nome" id="nome" placeholder="Nome" required="">
            <input type="number" name="cpf" id="cpf" placeholder="CPF" required="">
            <input type="email" name="email" id="email" placeholder="E-mail" required="">
            <input type="text" name="login" id="login" placeholder="Login" required="">
            <input type="password" name="senha" id="senha" placeholder="Senha" required="">
            <button class="cads" type="submit">Sign up</button>
            <a href="index.php"><button type="button">Voltar</button></a>
        </form>
<?php
    include("config/conexao.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql ="INSERT INTO usuarios (nome, cpf, email, login, senha) VALUES (:nome, :cpf, :email, :login, :senha) ";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            echo"<div class='sucess'>usuario cadastrado com sucesso</div>";
        }else{
            echo"<div class='error'> falha ao registrar o usuario</div>";
        }

        $conexao = null;
    }
?>