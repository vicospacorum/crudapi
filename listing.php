<?php require_once ('header.php'); ?>
<a href="listagem.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-yellow w3-button w3-xxlarge"></i>
</a>

<?php 
    require_once 'connectDB.php';
                
    echo '
        <div class="w3-paddingw3-content w3-half w3-displaytopmiddle w3-margin">
            <h1 class="w3-center w3-yellow w3-round-large w3-margin">Lista de Tutorias</h1>

            <table class="w3-table-all w3-centered w3-text-black">
                <thead>
                    <tr class="w3-center w3-yellow">
                        <th>Tutor</th>
                        <th>Aluno</th>
                        <th>Data</th>
                        <th>Duração</th>
                        <th>Gravação</th>
                        <!-- th>Relatório (Excel)</th -->
                        <!-- th>Atualizar</th -->
                    </tr>
                <thead>
    ';
                
    $sql = "SELECT * FROM tutorias WHERE Atualizado = 1" ;
    try {
        
        $resultado = $conecta->query($sql);
                
        if($resultado != null) {
            foreach($resultado as $linha) {
                echo '<tr>';
                echo '<td>'.$linha['Tutor'].'</td>';
                echo '<td>'.$linha['Aluno'].'</td>';
                echo '<td>'.$linha['Data'].'</td>';
                echo '<td>'.$linha['Duracao'].'</td>';
                echo '<td><a href="'.$linha['Link'].'"  target="_blank">Gravação</a></td>';
                //echo '<td><a href="excluir.php?id='.$linha['idproduto'].'&nome='.$linha['nome'].'&preco='.$linha['preco'].'&quantidade='.$linha['quantidade'].'"><i class="fa fa-user-times w3-large w3-text-orange"></i> </a></td>';
                //echo '<td><a href="atualizar.php?id='.$linha['idproduto'].'&nome='.$linha['nome'].'&preco='.$linha['preco'].'&quantidade='.$linha['quantidade'].'"><i class="fa fa-refresh w3-large w3-text-orange"></i> </a></td>';
                echo '</tr>';
            }
        }

        echo '
                </table>
            </div>';
    }
    catch(PDOException $e){
        echo "falha ao conectar: ". $e->getMessage();
    }
?>
</div>
<?php require_once ('footer.php'); ?>