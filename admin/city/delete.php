<?php

require_once "../../app.php";


if(isset($_GET['city_id']) and is_numeric($_GET['city_id'])) {

    $city_id = $_GET['city_id'];
    $city = getOne("cities", "city_id = '$city_id'");

    if(empty($city)) {
        abort();
        die();
    }

    delete("cities", "city_id = '$city_id'");
}

aredirect("city/view.php");