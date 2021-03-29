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
                        <th>
                            Tutor
                            <a href="listing.php?tutor=1">
                                <i class="fa fa-arrow-circle-up w3-small w3-button" style="padding: 0px 0px 0px 3px"></i>
                            </a>
                            <a href="listing.php?tutor=0">
                                <i class="fa fa-arrow-circle-down w3-small w3-button"  style="padding: 0px"></i>
                            </a>
                        </th>
                        <th>
                            Aluno
                            <a href="listing.php?aluno=1">
                                <i class="fa fa-arrow-circle-up w3-small w3-button" style="padding: 0px 0px 0px 3px"></i>
                            </a>
                            <a href="listing.php?aluno=0">
                                <i class="fa fa-arrow-circle-down w3-small w3-button"  style="padding: 0px"></i>
                            </a>
                        </th>
                        <th>
                            Data
                            <a href="listing.php?data=1">
                                <i class="fa fa-arrow-circle-up w3-small w3-button" style="padding: 0px 0px 0px 3px"></i>
                            </a>
                            <a href="listing.php?data=0">
                                <i class="fa fa-arrow-circle-down w3-small w3-button"  style="padding: 0px"></i>
                            </a>
                        </th>
                        <th>
                            Duração
                        </th>
                        <th>Gravação</th>
                        <!-- th>Relatório (Excel)</th -->
                        <!-- th>Atualizar</th -->
                    </tr>
                <thead>
    ';
    
    $sql = "SELECT * FROM tutorias WHERE Atualizado = 1" ;

    if (isset($_GET['tutor']))
    {   
        if ($_GET['tutor'] == 1)
        {
            $sql = "SELECT * FROM tutorias WHERE Atualizado = 1 ORDER BY Tutor ASC";
        }
        elseif ($_GET['tutor'] == 0)
        {
            $sql = "SELECT * FROM tutorias WHERE Atualizado = 1 ORDER BY Tutor DESC";
        }
    }
    elseif (isset($_GET['aluno']))
    {
        if ($_GET['aluno'] == 1)
        {
            $sql = "SELECT * FROM tutorias WHERE Atualizado = 1 ORDER BY Aluno ASC";
        }
        elseif ($_GET['Aluno'] == 0)
        {
            $sql = "SELECT * FROM tutorias WHERE Atualizado = 1 ORDER BY Aluno DESC";
        }
    }
    elseif (isset($_GET['data']))
    {
        if ($_GET['data'] == 1)
        {
            $sql = "SELECT * FROM tutorias WHERE Atualizado = 1 ORDER BY Data ASC";
        }
        elseif ($_GET['data'] == 0)
        {
            $sql = "SELECT * FROM tutorias WHERE Atualizado = 1 ORDER BY Data DESC";
        }
    }

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