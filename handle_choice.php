<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'directions_db';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['direction'])) {
    $direction = $_POST['direction'];

    $stmt = $conn->prepare("INSERT INTO user_choices (direction) VALUES (?)");
    $stmt->bind_param("s", $direction);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: last_choice.php");
exit();
?>
