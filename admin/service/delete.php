<?php

require_once "../../app.php";

if(isset($_GET['service_id']) and is_numeric($_GET['service_id'])) {

    $service_id = $_GET['service_id'];
    $service = getOne("services", "service_id = '$service_id'");

    if(empty($service)) {
        abort();
        die();
    }

    delete("services", "service_id = '$service_id'");
}

aredirect("service/view.php");