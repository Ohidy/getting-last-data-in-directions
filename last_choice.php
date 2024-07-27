<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'directions_db';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT direction FROM user_choices ORDER BY chosen_at DESC LIMIT 1");
$last_choice = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Chosen Direction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Last Chosen Direction</h1>
        <?php if ($last_choice): ?>
            <p>Your last chosen direction is: <strong><?php echo htmlspecialchars($last_choice['direction']); ?></strong></p>
        <?php else: ?>
            <p>No direction chosen yet.</p>
        <?php endif; ?>
        <a href="index.html" class="btn btn-primary">Choose Again</a>
    </div>
</body>
</html>
