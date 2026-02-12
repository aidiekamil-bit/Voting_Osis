<?php
session_start();

//hapus semua session
session_unset();
session_destroy();

//arahkan halaman ke login
header("Location: login.php");
?>