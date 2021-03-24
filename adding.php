<?php require_once ('header.php'); ?>
        <div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
            <?php
                require_once 'connectDB.php';

                $sql = "INSERT INTO tutorias (id, Tutor, Aluno, Data, Gravacao, Link) VALUES ('" . $_POST['txtID'] . "', '" . $_POST['txtTutor'] . "', '" . $_POST['txtAluno'] . "', '" . $_POST['txtData'] . "', '" . $_POST['txtGrava'] . "', '" . $_POST ['txtLink'] . "');";
                
                try{
                    $resultado = $conecta->query($sql);
                    
                    echo '<a href="listagem.php">
                            <h1 class="w3-button w3-blue">Tutoria Salva com sucesso! </h1>
                        </a>';
                }catch(PDOException $e){
                    echo '<a href="index.php">
                            <h1 class="w3-button w3-blue">ERRO! </h1>
                        </a>';
                }
            ?>
        </div>
        <?php require_once ('footer.php'); ?>