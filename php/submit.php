
<?php
$conn = new mysqli("localhost", "root", "", "dsce_lostfound", 3307);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$name = $_POST['name'];
$contact = $_POST['contact'];
$item = $_POST['item'];
$type = $_POST['type'];
$stmt = $conn->prepare("INSERT INTO reports (name, contact, item, type) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $contact, $item, $type);
$stmt->execute();
$stmt->close();
$conn->close();
?>
