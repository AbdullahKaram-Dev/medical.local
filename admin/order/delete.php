<?php

require_once "../../app.php";

if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])){

    $order_id = $_GET['order_id'];
    $order = getOne("orders","order_id = '$order_id'");

    if (empty($order)){

        abort();
        die();
    }

    delete("orders","order_id = '$order_id'");
}

aredirect("order/view.php");