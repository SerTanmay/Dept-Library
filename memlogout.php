<?php
session_start();
unset($_SESSION['mem_id']);
session_destroy();
header("Location: home.html");
?>