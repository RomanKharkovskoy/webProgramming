<?php
require("database.php");
createAuthTable($conn);

$login = $_POST['login'];
$password = $_POST['password'];

function hashAndInvertBits($password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $invertedBitsPassword = '';
    for ($i = 0; $i < strlen($hashedPassword); $i++) {
        $invertedBitsPassword .= $hashedPassword[$i] === '1' ? '0' : '1';
    }

    return $invertedBitsPassword;
}

$hashedPassword = hashAndInvertBits($password);
$newUser = addUser($conn, $login, $hashedPassword);
header("Location: result/result.html");
if ($conn->query($sql) === TRUE) {
    echo "Пользователь успешно добавлен!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
