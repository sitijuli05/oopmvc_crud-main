<?php
// Susunan file: oopmvc/index.php

// Check if PATH_INFO is set and assign it, otherwise assign an empty string
$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : '';
$uri = explode('/', $request);

// Check apakah controller dan method pada segment URI
// Untuk mengarahkan ke controller dan method yang benar
$uri0 = isset($uri[0]) && $uri[0] !== '';
$uri1 = isset($uri[1]) && $uri[1] !== '';

// Memanggil semua resources yang diperlukan
require_once "lib/Database.php";
require_once "controller/anggota.php";
require_once "model/anggota_model.php";

$db = new Database();
$model = new Anggota_model($db);
$controller = new Anggota($model);

// Routing dan menjalankan method yang sesuai dengan URL
// Pada framework MVC, routing biasanya dilakukan oleh library tersendiri, biasanya router
if ($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'detail') {
    $id = $_GET['id'];
    $controller->detail($id);
} elseif ($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'edit') {
    $id = $_GET['id'];
    $controller->edit($id);
} elseif ($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'delete') {
    $id = $_GET['id'];
    $controller->delete($id);
} elseif ($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'create') {
    $controller->create();
} elseif ($uri0 && $uri[0] === 'anggota') {
    $controller->index();
} else {
    header('HTTP/1.1 404 Not found');
    echo '<h1>Halaman tidak tersedia</h1>';
}
?>
