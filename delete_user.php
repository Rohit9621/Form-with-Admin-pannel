<?php
require_once('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        // Perform the deletion query
        $deleteQuery = "DELETE FROM applications WHERE id = $userId";
        $result = $conn->query($deleteQuery);
        if ($result) {
            echo 'User deleted successfully';
        } else {
            echo 'Error deleting user';
        }
    } else {
        echo 'Invalid request';
    }
} else {
    echo 'Invalid request method';
}
?>
