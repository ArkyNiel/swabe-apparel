<?php
session_start();
include '../../connection/connection.php';

session_destroy();

header('Location: ../../user-side/links/home.php');
exit;
?>
