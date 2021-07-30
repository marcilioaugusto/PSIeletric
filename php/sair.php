<?php
session_start();
session_unset();//
session_destroy(); //
header("location: logar.php"); // encaminhado para o login

// unset($_SESSION['id']); destruindo a sessao

?>