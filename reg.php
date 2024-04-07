<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social";
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка подключения
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button-reg'])) {
// Получаем данные из формы
$us_name = $_POST['login'];
$email = $_POST['email'];
// $age = $_POST['age'];
$pass_first = $_POST['pass-first'];
$pass_second = $_POST['pass-second'];
$error .= '<p class="error">Password did not match.</p>';
if (empty($error) ) {
    $query = $conn->prepare("INSERT INTO users(login,email,pass-first   ) VALUES (?, ?, ?)");
    $query->bindParam("login", $us_name, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->bindParam("password", $pass_first, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        echo '<p class="success">Регистрация прошла успешно!</p>';
    } else {
        echo '<p class="error">Неверные данные!</p>';
    }
}
// if (empty($error) ) {
//     $insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
//     $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
//     $result = $insertQuery->execute();
//     if ($result) {
//         $error .= '<p class="success">Your registration was successful!</p>';
//     } else {
//         $error .= '<p class="error">Something went wrong!</p>';
//     }
// }