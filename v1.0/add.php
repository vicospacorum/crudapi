<?php require_once ('header.php'); ?>
        <a href="listagem.php" class="w3-display-topleft ">
            <i class="fa fa-arrow-circle-left w3-large w3-yellow w3-button w3-xxlarge"></i>
        </a>
        
        <div class="w3-padding w3-content w3-text-grey w3-third w3-margin w3-displaymiddle">
            <h1 class="w3-center w3-yellow w3-round-large w3-margin">Cadastro de Tutoria</h1>

            <form action="adding.php" class="w3-container" method='post'>
                <label class="w3-text-orange" style="fontweight: bold;">Id</label>
                <input name="txtID" class="w3-input w3-light-grey w3-border">
                <br>
                <label class="w3-text-orange" style="fontweight: bold;">Tutor</label>
                <input name="txtTutor" class="w3-input w3-light-grey w3-border">
                <br>
                <label class="w3-text-orange" style="fontweight: bold;">Aluno</label>
                <input name="txtAluno" class="w3-input w3-light-grey w3-border">
                <br>
                <label class="w3-text-orange" style="fontweight: bold;">Data</label>
                <input name="txtData" class="w3-input w3-light-grey w3-border">
                <br>
                <br>
                <label class="w3-text-orange" style="fontweight: bold;">Gravação</label>
                <input name="txtGrava" class="w3-input w3-light-grey w3-border">
                <br>
                <br>
                <label class="w3-text-orange" style="fontweight: bold;">Link</label>
                <input name="txtLink" class="w3-input w3-light-grey w3-border">
                <br>
                <button name="btnAdd" class="w3-button w3-yellow w3-cell w3-roundlarge w3-right w3-margin-right">
                    <i class="w3-xxlarge fa fa-plus-square"></i> 
                    Adicionar
                </button>
            </form>
        </div>
<?php require_once ('footer.php'); ?>