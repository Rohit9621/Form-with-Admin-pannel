<?php
// Include the configuration file and start the session
require_once('config.php');
session_start();
// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
// Check if the search term is provided
if (isset($_GET['term'])) {
    $searchTerm = $_GET['term'];
    // Use a prepared statement to prevent SQL injection
    $query = "SELECT * FROM applications WHERE name LIKE ?";
    $stmt = $conn->prepare($query);
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    // Display user information
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['applied_post']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['father_name']}</td>";
        echo "<td>{$row['mother_name']}</td>";
        echo "<td>{$row['marital_status']}</td>";
        echo "<td>{$row['husband_wife_name']}</td>";
        echo "<td>{$row['dob']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['caste_name']}</td>";
        echo "<td>{$row['caste_category']}</td>";
        echo "<td>{$row['religion']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['mobile']}</td>";
        echo "<td>{$row['whatsapp_number']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['board_10th']}</td>";
        echo "<td>{$row['passing_year_10th']}</td>";
        echo "<td>{$row['roll_enrollment_10th']}</td>";
        echo "<td>{$row['result_division_10th']}</td>";
        echo "<td>{$row['percentage_10th']}</td>";
        echo "<td>{$row['marksheet_10th']}</td>";
        echo "<td>{$row['board_12th']}</td>";
        echo "<td>{$row['passing_year_12th']}</td>";
        echo "<td>{$row['roll_enrollment_12th']}</td>";
        echo "<td>{$row['result_division_12th']}</td>";
        echo "<td>{$row['percentage_12th']}</td>";
        echo "<td>{$row['marksheet_12th']}</td>";
        echo "<td>{$row['board_ug']}</td>";
        echo "<td>{$row['passing_year_ug']}</td>";
        echo "<td>{$row['roll_enrollment_ug']}</td>";
        echo "<td>{$row['result_division_ug']}</td>";
        echo "<td>{$row['percentage_ug']}</td>";
        echo "<td>{$row['marksheet_ug']}</td>";
        echo "<td>{$row['board_pg']}</td>";
        echo "<td>{$row['passing_year_pg']}</td>";
        echo "<td>{$row['roll_enrollment_pg']}</td>";
        echo "<td>{$row['result_division_pg']}</td>";
        echo "<td>{$row['percentage_pg']}</td>";
        echo "<td>{$row['marksheet_pg']}</td>";
        echo "<td>{$row['board_diploma']}</td>";
        echo "<td>{$row['passing_year_diploma']}</td>";
        echo "<td>{$row['roll_enrollment_diploma']}</td>";
        echo "<td>{$row['result_division_diploma']}</td>";
        echo "<td>{$row['percentage_diploma']}</td>";
        echo "<td>{$row['marksheet_diploma']}</td>";
        echo "<td>{$row['board_certificate']}</td>";
        echo "<td>{$row['passing_year_certificate']}</td>";
        echo "<td>{$row['roll_enrollment_certificate']}</td>";
        echo "<td>{$row['result_division_certificate']}</td>";
        echo "<td>{$row['percentage_certificate']}</td>";
        echo "<td>{$row['marksheet_certificate']}</td>";
        echo "<td>{$row['photo_path']}</td>";
        echo "<td>{$row['signature_path']}</td>";
        // Add other columns as needed
        echo "<td><a href='edit_user.php?id={$row['id']}'>Edit</a> <button onclick='deleteUser({$row['id']})'>Delete</button></td>";
        echo "</tr>";
    }
    $stmt->close();
} else {
    // If no search term provided, fetch all users
    $query = "SELECT * FROM applications";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['applied_post']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['father_name']}</td>";
        echo "<td>{$row['mother_name']}</td>";
        echo "<td>{$row['marital_status']}</td>";
        echo "<td>{$row['husband_wife_name']}</td>";
        echo "<td>{$row['dob']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['caste_name']}</td>";
        echo "<td>{$row['caste_category']}</td>";
        echo "<td>{$row['religion']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['mobile']}</td>";
        echo "<td>{$row['whatsapp_number']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['board_10th']}</td>";
        echo "<td>{$row['passing_year_10th']}</td>";
        echo "<td>{$row['roll_enrollment_10th']}</td>";
        echo "<td>{$row['result_division_10th']}</td>";
        echo "<td>{$row['percentage_10th']}</td>";
        echo "<td>{$row['marksheet_10th']}</td>";
        echo "<td>{$row['board_12th']}</td>";
        echo "<td>{$row['passing_year_12th']}</td>";
        echo "<td>{$row['roll_enrollment_12th']}</td>";
        echo "<td>{$row['result_division_12th']}</td>";
        echo "<td>{$row['percentage_12th']}</td>";
        echo "<td>{$row['marksheet_12th']}</td>";
        echo "<td>{$row['board_ug']}</td>";
        echo "<td>{$row['passing_year_ug']}</td>";
        echo "<td>{$row['roll_enrollment_ug']}</td>";
        echo "<td>{$row['result_division_ug']}</td>";
        echo "<td>{$row['percentage_ug']}</td>";
        echo "<td>{$row['marksheet_ug']}</td>";
        echo "<td>{$row['board_pg']}</td>";
        echo "<td>{$row['passing_year_pg']}</td>";
        echo "<td>{$row['roll_enrollment_pg']}</td>";
        echo "<td>{$row['result_division_pg']}</td>";
        echo "<td>{$row['percentage_pg']}</td>";
        echo "<td>{$row['marksheet_pg']}</td>";
        echo "<td>{$row['board_diploma']}</td>";
        echo "<td>{$row['passing_year_diploma']}</td>";
        echo "<td>{$row['roll_enrollment_diploma']}</td>";
        echo "<td>{$row['result_division_diploma']}</td>";
        echo "<td>{$row['percentage_diploma']}</td>";
        echo "<td>{$row['marksheet_diploma']}</td>";
        echo "<td>{$row['board_certificate']}</td>";
        echo "<td>{$row['passing_year_certificate']}</td>";
        echo "<td>{$row['roll_enrollment_certificate']}</td>";
        echo "<td>{$row['result_division_certificate']}</td>";
        echo "<td>{$row['percentage_certificate']}</td>";
        echo "<td>{$row['marksheet_certificate']}</td>";
        echo "<td>{$row['photo_path']}</td>";
        echo "<td>{$row['signature_path']}</td>";
        // Add other columns as needed
        echo "<td><a href='edit_user.php?id={$row['id']}'>Edit</a> <button onclick='deleteUser({$row['id']})'>Delete</button></td>";
        echo "</tr>";
    }
}
$conn->close();
?>
