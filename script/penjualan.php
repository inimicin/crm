<?php

include('customer.php');
include('produk.php');

function get_data_penjualan() {
  $query = "SELECT * FROM `penjualan`";
  $sql = mysqli_query($GLOBALS['conn'], $query);

  return mysqli_fetch_all($sql);
}

function save_data_penjualan($produk, $jumlah, $nama_depan, $nama_belakang, $email, $telepon, $alamat) {
  if(get_data_customer_by_email($email) === NULL) {
    $result = mysqli_query($GLOBALS['conn'], "INSERT INTO `customer`(`id_customer`, `nama_depan`, `nama_belakang`, `email`, `no_telepon`, `alamat`) VALUES (NULL,'$nama_depan','$nama_belakang','$email','+62$telepon','$alamat');");

    if($result) {
        
    }else{
        return false;
    }
  }

  $result = mysqli_query($GLOBALS['conn'], "INSERT INTO `penjualan`(`id`, `tanggal`, `produk`, `customer`, `jumlah`) VALUES (NULL,'".date("Y-m-d")."','$produk','".get_data_customer_by_email($email)[0]."','$jumlah');");

  if($result) {
      return true;
  }else{
      return false;
  }
}

?>