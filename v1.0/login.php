<?php require_once ('header.php'); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-displaymiddle">
    <?php
        session_start();
        
        $nome = $_POST['txtNome'];
        $senha = $_POST['txtSenha'];

        require_once 'connectDB.php';

        /*

        $sql = "SELECT * FROM acesso WHERE username = '" . $nome . "';";
        $resultado = $conexao->query($sql);
        
        $linha = mysqli_fetch_array($resultado);
        */
        if (1) //if($linha != null)
        {
            //if($linha['password'] == $senha)
            if($senha == teste)
            {
                
                echo '
                    <a href="listagem.php">
                        <h1 class="w3-center w3-button w3-teal">Controle de Tutorias</h1>
                    </a>
                ';
                $_SESSION['logado'] = $nome;
            }
            else
            {
                echo '
                    <a href="index.php">
                        <h1 class="w3-button w3-teal">Login Inválido! </h1>
                    </a>
                ';
            }
        }
        else
        {
            echo '
                <a href="index.php">
                    <h1 class="w3-button w3-teal">Login Inválido! </h1>
                </a>
            ';
        }
        
        $conexao->close();
    ?>
</div>
<?php require_once ('footer.php'); ?>