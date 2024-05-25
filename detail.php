<?php
// file : oopmvc/detail.php
require_once "model/anggota_model.php";
$anggota = getAnggotabyId($_GET['Id']);

require "view/anggota/detail.php"

?>