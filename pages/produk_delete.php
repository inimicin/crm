<?php

include('../script/produk.php');

$result = delete_data_produk($_GET['id']);

if($result) {
    header('location: ./produk_data.php');
}

?>