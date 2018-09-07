<?php session_start();

unset($_SESSION["autenticado"]);
unset($_SESSION["nivelE"]);

session_destroy();

echo "<script languaje='javascript'>";
        echo "location.href='../index.php';";
           echo "</script>";
?>