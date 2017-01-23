<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "tem_all";
	$koneksi = mysqli_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
	mysqli_select_db($koneksi, $db) or die("Tidak ada database yang dipilih!");
?>
