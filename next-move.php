<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control-panel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT direction FROM robotdir ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$last_direction = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last_direction = $row['direction'];
} else {
    $last_direction = "No data";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="next-m-style.css">
</head>
<body>
     
    <div class="container">
        <h3> The robot should take the next step: <?php echo $last_direction; ?></h3>
        <a href="robot-control-panel.php">Try again !</a>
    </div>
</body>
</html>