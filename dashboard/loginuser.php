<?php
include("config/cabecalho.php");
?>
<div class="login">
    <div class="menu">
        <form class="imp" method="POST">
            <div style="width: 100%;">
                <h1>Logar</h1>
                <input type="text" name="login" placeholder="login" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button class="cads" type="submit">Login</button>
                <a href="index.php"><button type="button">Voltar</button></a>
            </div>
        </form>
    </div>
<?php
        //conectar com o banco de dados
    include("config/conexao.php");

        //formulário foi enviado?
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM usuarios   WHERE login = :login and senha = :senha";
        $stmt = $conexao->prepare($sql);
        
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
            echo"<div class = 'sucess'>logou com sucesso</div>";
            session_start();
            $_SESSION['usuario'] = $result;
            header("Location: cadastrofornec.php");
        }
        else {
            echo"<div class = 'error'>falha em logar o usuário</div>";
        }$conexao = null;
    }
?>
</div>