<?php 
if(!session_id()) {
    session_start();
}

// Memanggil semua file
require_once '../app/init.php';

// Menjalankan kelas app
$app = new App;