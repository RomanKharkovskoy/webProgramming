<?php
$servername = "localhost";
$username = "romankharkovskoy";
$password = "111111aA";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createDatabase($conn) {
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS orders";
    if ($conn->query($sql_create_db) === TRUE) {
        echo "База данных успешно создана или уже существует.<br>";
    } else {
        echo "Ошибка при создании базы данных: " . $conn->error;
        exit();
    }
}

$conn->select_db("orders");

function createOrdersTable($conn) {
    $sql_create_table = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        middle_name VARCHAR(50),
        address VARCHAR(255) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        email VARCHAR(50) NOT NULL,
        product VARCHAR(50) NOT NULL,
        comments TEXT,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    if ($conn->query($sql_create_table) === TRUE) {
        echo "Таблица успешно создана или уже существует.";
    } else {
        echo "Ошибка при создании таблицы: " . $conn->error;
    }
}

function createAuthTable($conn) {
    $sql_create_table = "CREATE TABLE IF NOT EXISTS auth (
        id INT AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(250) NOT NULL,
        password VARCHAR(250) NOT NULL
    )";
    if ($conn->query($sql_create_table) === TRUE) {
        echo "Таблица успешно создана или уже существует.";
    } else {
        echo "Ошибка при создании таблицы: " . $conn->error;
    }
}

function addOrder($conn, $first_name, $last_name, $middle_name, $address, $phone, $email, $product, $comments) {
    $sql_add_order = "INSERT INTO orders (
        first_name, 
        last_name, 
        middle_name, 
        address, 
        phone, 
        email, 
        product, 
        comments) 
        VALUES ('$first_name', '$last_name', '$middle_name', '$address', '$phone', '$email', '$product', '$comments')";
    
    if ($conn->query($sql_add_order) === TRUE) {
        echo "Заказ успешно добавлен.<br>";
    } else {
        echo "Ошибка при добавлении заказа: " . $conn->error;
    }
}

function addUser($conn, $login, $password) {
    $sql_add_user = "INSERT INTO auth (login, password) VALUES ('$login', '$password')";
    if ($conn->query($sql_add_user) === TRUE) {
        echo "Пользователь успешно добавлен.<br>";
    } else {
        echo "Ошибка при добавлении пользователя: " . $conn->error;
    }
}

createDatabase($conn);

?>
