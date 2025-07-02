<?php
session_start();
echo $_SESSION['qrid'];
$_SESSION['test'] = 'false';
header("Location:index.html");
?>