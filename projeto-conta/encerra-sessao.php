<?php
session_destroy($_SESSION['ID_USUARIO']);
header("Location: index.php");
?>