<?php

$dsn = "mysql:host=localhost;dbname=discounts";
$username = 'root';
$password = null;
$conn = new PDO ($dsn, $username, $password);

function getOne($query, array $binds = [], $conn)
{
    $statement = $conn->prepare($query);
    foreach($binds as $key => $value) {
        $statement->bindValue($key, $value);
    }
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
}

function getMany($query, $conn)
{
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
}
