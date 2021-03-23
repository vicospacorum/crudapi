<?php require_once ('verify.php'); ?>
<?php
    unset( $_SESSION['logado'] );
    header("location:index.php");
?>