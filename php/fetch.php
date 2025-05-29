
<?php
$conn = new mysqli("localhost", "root", "", "dsce_lostfound", 3307);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$result = $conn->query("SELECT * FROM reports ORDER BY id DESC");
$data = [];
while ($row = $result->fetch_assoc()) { $data[] = $row; }
echo json_encode($data);
$conn->close();
?>
