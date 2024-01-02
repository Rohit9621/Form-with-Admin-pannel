<?php
require_once('config.php');
$query = "SELECT * FROM applications";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    // Echo each row as table rows
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    // ... (repeat for other columns)
    echo "<td><button onclick='editUser({$row['id']})'>edit</button> <button onclick='deleteUser({$row['id']})'>Delete</button></td>";
    echo "</tr>";
    
}
?>
