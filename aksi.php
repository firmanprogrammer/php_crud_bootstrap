<?php
  include "config.php";
  if (isset($_POST['btnsimpan'])) {

    $txtname = $_POST['txtname'];
    $txtemail = $_POST['txtemail'];
    $txturl = $_POST['txturl'];
    $txtpesan = $_POST['txtpesan'];
    $query = mysqli_query($koneksi,"insert into tb_tamu (nama,email,url,pesan) values ('$txtname','$txtemail','$txturl','$txtpesan') ") or die(mysqli_error());
    echo "<script>window.location.href = 'index.php';</script>";

  }else if (isset($_POST['btnupdate'])) {

    $txtid = $_POST['txtid'];
    $txtname = $_POST['txtname'];
    $txtemail = $_POST['txtemail'];
    $txturl = $_POST['txturl'];
    $txtpesan = $_POST['txtpesan'];
    $query = mysqli_query($koneksi,"update tb_tamu set nama='$txtname',email='$txtemail',url='$txturl',pesan='$txtpesan' where id='$txtid' ") or die(mysqli_error());
    echo "<script>window.location.href = 'index.php';</script>";

  }else if (isset($_GET['btndelete'])) {

    $txtid = $_GET["btndelete"];
    mysqli_query($koneksi," DELETE FROM tb_tamu where id='$txtid' ") or die(mysqli_error());
    echo "<script>window.location.href = 'index.php';</script>";

  }else {

    echo "<script>window.location.href = 'index.php';</script>";

  }
?>
