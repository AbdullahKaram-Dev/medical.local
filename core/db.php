<?php

$conn = mysqli_connect(DB_SERVER_NAME, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);



function getOne(string $table, string $where): array
{
    global $conn;

    $sql = "SELECT * FROM $table WHERE $where LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return [];
    }
}

function getAll(string $table): array
{
    global $conn;

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function getWhere(string $table, string $where): array
{
    global $conn;

    $sql = "SELECT * FROM $table WHERE $where";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function insert(string $table, array $data): bool
{
    global $conn;
    $keys = '';
    $values = '';

    foreach ($data as $key => $value) {
        $keys .= "$key,";
        $values .= "'$value',";
    }

    $keys = substr($keys, 0, -1);
    $values = substr($values, 0, -1);

    $sql = "INSERT INTO $table ($keys) VALUES ($values)";

    return mysqli_query($conn, $sql);
}

function update(string $table, array $data, string $where): bool
{
    global $conn;
    $set = '';

    foreach ($data as $key => $value) {
        $set .= "$key = '$value',";
    }

    $set = substr($set, 0, -1);

    $sql = "UPDATE $table SET $set WHERE $where";

    return mysqli_query($conn, $sql);
}

function delete(string $table, string $where): bool
{
    global $conn;

    $sql = "DELETE FROM $table WHERE $where";

    return mysqli_query($conn, $sql);
}

function getCount(string $table): int
{
    global $conn;

    $sql = "SELECT COUNT(*) AS cnt FROM $table";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result)['cnt'];
}

function getCountWhere(string $table, string $where): int
{
    global $conn;

    $sql = "SELECT COUNT(*) AS cnt FROM $table WHERE $where";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result)['cnt'];
}

function OrdersWithJoin(string $MasterTable,string $JoinTable1,string $JoinTable2):array
{
    global $conn;

$sql = "SELECT * FROM $MasterTable INNER JOIN $JoinTable1 ON orders.city_id = cities.city_id INNER JOIN $JoinTable2 ON orders.service_id = services.service_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){

        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{

        return [];
    }
}

