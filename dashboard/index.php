<?php 
    include("config/cabecalho.php");
    include("config/conexao.php")
?>    
    <div class="div-global">

        <div class="div-menu-lateral">
            <img class="logo" src="img/logo-senai.png" alt="">

            <button>
                <img src="img/Frame.png" alt="">
                Painel de controle
            </button>

            <button>
                <img src="img/agenda.png" alt="">
                Usuários
            </button>

            <button>
                <img src="img/prisma.png" alt="">
                Minha conta
            </button>

            <button>
                <img src="img/conta2.png" alt="">
                Segurança
            </button>

            <button>
                <img src="img/pastinha.png" alt="">
                Corporativo
            </button>

            <button>
                <img src="img/bola.png" alt="">
                Esportes
            </button>

            <button>
                <img src="img/monumento.png" alt="">
                Acadêmico
            </button>

            <button>
                <img src="img/graficoPizza.png" alt="">
                Relatórios
            </button>
            <button>
                <img src="img/balde.png" alt="">
                Custumozação
            </button>
            <button>
                <img src="img/sino.png" alt="">
                Alertas
            </button>
        </div>

        <div class="div-conteudo">

            <header class="topo">
                <nav>
                    <a class="dashboards" href="">Dashboards</a>
                    <a href="">Páginas</a>
                    <a href="">Aplicativos</a>
                    <a href="">Ajuda</a>
                </nav>
                <nav>
                    <a href="cadastrouser.php">Criar conta</a>
                    <a href="loginuser.php">entrar</a>
                    <a href="cadastrofornec.php">cadastrar fornecedor</a>
                    <a href="cadastroproduto.php">cadastrar produto</a>
                </nav>

                <form action="" method="POST">
                    <input type="text">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </header>

            <main class="corpo">
                <h1>E-commerce | Painel de Controle</h1>
                <div class="painel-controle">

                    <div class="vendas-mes">
                        <div>
                            <p>aqui vai ser o valor</p>
                            <p>Vendas esse mês</p>
                        </div>
                        <i class="fa-solid fa-coins"></i>
                    </div>

                    <div class="produtos-ativos">
                        <<?php        
                            $query_produtos = "SELECT COUNT(id) AS p FROM produto";
                            $result_produtos = $conexao->prepare($query_produtos);
                            $result_produtos->execute();

                            $row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC);
                            echo $row_produto['p'];
                        ?>
                        <p>Produtos ativos</p>
                        <img src="img/Vector.png" alt="">
                    </div>

                    <div class="fornecedores">
                    <?php        
                        $query_fornec= "SELECT COUNT(id) AS a FROM fornecedores";
                        $result_fornec = $conexao->prepare($query_fornec);
                        $result_fornec->execute();

                        $row_fornec = $result_fornec->fetch(PDO::FETCH_ASSOC);
                        echo $row_fornec['a'];
                    ?>
                        <p>Fornecedores</p>
                        <img src="img/predio.png" alt="">
                    </div>

                    <div class="clientes">
                    <?php        
                            $query_client = "SELECT COUNT(id) AS c FROM usuarios";
                            $result_client = $conexao->prepare($query_client);
                            $result_client->execute();

                            $row_client = $result_client->fetch(PDO::FETCH_ASSOC);
                            echo $row_client['c'];
                        ?>
                        <p>Clientes</p>
                        <img src="img/conta.png" alt="">
                    </div>

                </div>

                <div class="carrinho-ativo">
                        <h4>Carrinhos ativos</h4>

                        <div class="grid">
                            <button>
                                <div>
                                    <img src="img/camiseta.png" alt="">
                                </div>
                                Moda
                            </button>
                            <button>
                                <img src="img/jogos.png" alt="">
                                Jogos
                            </button>
                            <button>
                                <img src="img/relogio.PNG" alt="">
                                Eletrônicos
                            </button>
                            <button>
                                <img src="img/esporte.png" alt="">
                                Esporte
                            </button>
                            <button>
                                <img src="img/tenis.PNG" alt="">
                                Tênis
                            </button>
                        </div>

                        <div class="carrinho">
                            <?php
                                $query_product = "SELECT * FROM produto "; 
                                $result_product = $conexao->prepare($query_product);
                                $result_product->execute();   
                                
                                foreach ($result_product as $cliente ) : ?>
                                <table>
                                    <tr>
                                        <td><?php echo $cliente['nome']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $cliente['quantidade']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $cliente['preco']; ?></td>
                                    </tr>
                                </table>   
                            <?php endforeach; ?>           
                        </div>
                    </div>
                
                    <div class="aplicativo">
                        <h2>Novo aplicativo
                        de  E-commerce</h2>

                        <img src="img/pessoas.png" alt="">

                        <div>
                            <button>Ver Novidaes</button>
                        </div>
                        <div>
                            <button>Ver Produtos</button>
                        </div>
                    </div>
                
                    <div class="pedidos-vendas">
                        <div class="pedidos">
                            <div>
                                <p>Pedidoa</p>
                                <p>No último mês</p>
                            </div>

                            <div>
                                <button>Mais detalhes</button>
                            </div>
                        </div>

                        <div class="vendas">
                            <div>
                                <p>Vendas</p>
                                <p>Total de 3450 vendas recentes</p>
                            </div>

                            <div>
                                <table>
                                    <th>Item</th>
                                    <th>PRODUTO</th>
                                    <th>DATA</th>
                                    <th>PREÇO</th>
                                    <th>STATUS</th>
                                    <th>Qty</th>
                                </table>
                            </div>
                        </div>
                    </div>
            </main>

            <footer class="rodape">
                <p>2023© Senai Livre - Sistema de Controle</p>
            </footer>
        </div>

    </div>
<?php 
    include("config/rodape.php");
?>