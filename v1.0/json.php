<?php
    require_once '../connectDB.php';

    $arquivos = scandir('naoProcessados');

    $num = count($arquivos);

    for($i = 2; $i < $num; $i++)
    {
        $meetingId = substr($arquivos[$i], 0, 54);
        echo $meetingId;
        echo "<br><br>";
        $string = file_get_contents('naoProcessados/' . $arquivos[$i]);
        print_r($string);
        $json = json_decode($string, true);

        echo "<br><br>";
        echo "Duração: " . $json[duration];
        echo "<br><br>";

        $nomeAluno = "";
        $nomeTutor = "";
        foreach($json[attendees] as $pessoa)
        {
            echo $pessoa[name];
            echo "<br>";
            
            if (stripos('a' . $pessoa[name], 'alu'))
            {
                $nomeAluno = $pessoa[name];
                echo "<br><br>";
                print_r($pessoa);
            }
            elseif (stripos('a' . $pessoa[name], 'tut'))
            {
                $nomeTutor = $pessoa[name];
                echo "<br><br>";
                print_r($pessoa);
            }            
        }

        if(!empty($nomeTutor) && !empty($nomeAluno))
        {
            $sql = "UPDATE tutorias SET Tutor = '" .  $nomeTutor . "', Aluno = '" . $nomeAluno . "', Duracao = " . $json[duration] . ", Atualizado = 1 WHERE IdInterno = '" . $meetingId . "';";
                
            echo $sql;
            echo "<hr>";

            try    
            {
                $resultado = $conecta->query($sql);
                    
                echo 'Id inserido com sucesso!';
            }
            catch(PDOException $e)
            {
                echo 'ERRO!';
                echo $e;
            }
        }

        echo "<hr>";
    }
?>