<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control-panel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $direction = $_POST['direction'];
    $sql = "INSERT INTO robotdir (direction) VALUES ('$direction')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: robot-control-panel.php");
exit();
?>