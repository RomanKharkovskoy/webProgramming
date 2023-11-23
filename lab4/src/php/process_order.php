<?php
require("database.php");
createOrdersTable($conn);

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$product = $_POST['product'];
$comments = $_POST['comments'];

$newOrder = addOrder($conn, $first_name, $last_name, $middle_name, $address, $phone, $email, $product, $comments);

if ($conn->query($sql) === TRUE) {
    echo "Заказ успешно оформлен!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
