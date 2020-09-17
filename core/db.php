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


function getAll(string $table) // : array معملتهاش هنا اررى عشان مش هعرف ارجع الريسولت بس ؟؟؟
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM $table");

    if (mysqli_num_rows($result) > 0) {

        return $result;
    } else {

        return [];
    }
}


function insert(string $table, string $values): bool
{
    global $conn;
    $sql = mysqli_query($conn, "INSERT INTO $table $values");
    if (isset($sql)) {

        return true;
    } else {

        return false;
    }
}


function update(string $table, string $values, $where): bool
{
    global $conn;
    $sql = mysqli_query($conn, "UPDATE $table SET $values WHERE $where");
    if (isset($sql)) {

        return true;
    } else {

        return false;
    }
}


