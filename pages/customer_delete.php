<?php

include('../script/customer.php');

$result = delete_data_customer($_GET['id']);

if($result) {
    header('location: ./customer_data.php');
}

?>