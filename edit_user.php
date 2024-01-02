<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    // Fetch user details based on the ID
    $query = "SELECT * FROM applications WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $userDetails = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
    $stmt->close();
    // Process the form submission for updating user details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $updatedData = array(
            'name' => $_POST['name'],
            'applied_post' => $_POST['applied_post'],
            // Add other fields as needed
        );
        // Update the user details in the database
        $updateQuery = "UPDATE applications SET name = ?, applied_post = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssi", $updatedData['name'], $updatedData['applied_post'], $userId);
        if ($updateStmt->execute()) {
            echo "User details updated successfully.";
        } else {
            echo "Error updating user details.";
        }
        $updateStmt->close();
    }
} else {
    echo "User ID not provided.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <h2>Edit User Details</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>" required>
        <br>
        <label for="applied_post">applied_post:</label>
        <input type="text" id="applied_post" name="applied_post" value="<?php echo $userDetails['applied_post']; ?>" required>
        <br>
        <label for="father_name">father_name:</label>
        <input type="text" id="father_name" name="father_name" value="<?php echo $userDetails['father_name']; ?>" required>
        <br>
        <label for="mother_name">mother_name:</label>
        <input type="text" id="mother_name" name="mother_name" value="<?php echo $userDetails['mother_name']; ?>" required>
        <br>
        <label for="mother_name">mother_name:</label>
        <input type="text" id="mother_name" name="mother_name" value="<?php echo $userDetails['mother_name']; ?>" required>
        <br>
        <label for="husband_wife_name">husband_wife_name:</label>
        <input type="text" id="husband_wife_name" name="husband_wife_name" value="<?php echo $userDetails['husband_wife_name']; ?>" required>
        <br>
        <label for="dob">dob:</label>
        <input type="text" id="dob" name="dob" value="<?php echo $userDetails['dob']; ?>" required>
        <br>
        <label for="sex">sex:</label>
        <input type="text" id="sex" name="sex" value="<?php echo $userDetails['sex']; ?>" required>
        <br>
        <label for="caste_name">caste_name:</label>
        <input type="text" id="caste_name" name="caste_name" value="<?php echo $userDetails['caste_name']; ?>" required>
        <br>
        <label for="caste_category">caste_category:</label>
        <input type="text" id="caste_category" name="caste_category" value="<?php echo $userDetails['caste_category']; ?>" required>
        <br>
        <label for="religion">religion:</label>
        <input type="text" id="religion" name="religion" value="<?php echo $userDetails['religion']; ?>" required>
        <br>
        <label for="address">address:</label>
        <input type="text" id="address" name="address" value="<?php echo $userDetails['address']; ?>" required>
        <br>
        <label for="mobile">mobile:</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $userDetails['mobile']; ?>" required>
        <br>
        <label for="whatsapp_number">whatsapp_number:</label>
        <input type="text" id="whatsapp_number" name="whatsapp_number" value="<?php echo $userDetails['whatsapp_number']; ?>" required>
        <br>
        <label for="email">email:</label>
        <input type="text" id="email" name="email" value="<?php echo $userDetails['email']; ?>" required>
        <br>
        <label for="board_10th">board_10th:</label>
        <input type="text" id="board_10th" name="board_10th" value="<?php echo $userDetails['board_10th']; ?>" required>
        <br>
        <label for="passing_year_10th">passing_year_10th:</label>
        <input type="text" id="passing_year_10th" name="passing_year_10th" value="<?php echo $userDetails['passing_year_10th']; ?>" required>
        <br>
        <label for="roll_enrollment_10th">roll_enrollment_10th:</label>
        <input type="text" id="roll_enrollment_10th" name="roll_enrollment_10th" value="<?php echo $userDetails['roll_enrollment_10th']; ?>" required>
        <br>
        <label for="result_division_10th">result_division_10th:</label>
        <input type="text" id="result_division_10th" name="result_division_10th" value="<?php echo $userDetails['result_division_10th']; ?>" required>
        <br>
        <label for="percentage_10th">percentage_10th:</label>
        <input type="text" id="percentage_10th" name="percentage_10th" value="<?php echo $userDetails['percentage_10th']; ?>" required>
        <br>
        <label for="marksheet_10th">marksheet_10th:</label>
        <input type="text" id="marksheet_10th" name="marksheet_10th" value="<?php echo $userDetails['marksheet_10th']; ?>" required>
        <br>
        <label for="board_12th">board_12th:</label>
        <input type="text" id="board_12th" name="board_12th" value="<?php echo $userDetails['board_12th']; ?>" required>
        <br>
        <label for="passing_year_12th">passing_year_12th:</label>
        <input type="text" id="passing_year_12th" name="passing_year_12th" value="<?php echo $userDetails['passing_year_12th']; ?>" required>
        <br>
        <label for="roll_enrollment_12th">roll_enrollment_12th:</label>
        <input type="text" id="roll_enrollment_12th" name="roll_enrollment_12th" value="<?php echo $userDetails['roll_enrollment_12th']; ?>" required>
        <br>
        <label for="result_division_12th">result_division_12th:</label>
        <input type="text" id="result_division_12th" name="result_division_12th" value="<?php echo $userDetails['result_division_12th']; ?>" required>
        <br>
        <label for="percentage_12th">percentage_12th:</label>
        <input type="text" id="percentage_12th" name="percentage_12th" value="<?php echo $userDetails['percentage_12th']; ?>" required>
        <br>
        <label for="marksheet_12th">marksheet_12th:</label>
        <input type="text" id="marksheet_12th" name="marksheet_12th" value="<?php echo $userDetails['marksheet_12th']; ?>" required>
        <br>
        <label for="board_ug">board_ug:</label>
        <input type="text" id="board_ug" name="board_ug" value="<?php echo $userDetails['board_ug']; ?>" required>
        <br>
        <label for="passing_year_ug">passing_year_ug:</label>
        <input type="text" id="passing_year_ug" name="passing_year_ug" value="<?php echo $userDetails['passing_year_ug']; ?>" required>
        <br>
        <label for="roll_enrollment_ug">roll_enrollment_ug:</label>
        <input type="text" id="roll_enrollment_ug" name="roll_enrollment_ug" value="<?php echo $userDetails['roll_enrollment_ug']; ?>" required>
        <br>
        <label for="result_division_ug">result_division_ug:</label>
        <input type="text" id="result_division_ug" name="result_division_ug" value="<?php echo $userDetails['result_division_ug']; ?>" required>
        <br>
        <label for="percentage_ug">percentage_ug:</label>
        <input type="text" id="percentage_ug" name="percentage_ug" value="<?php echo $userDetails['percentage_ug']; ?>" required>
        <br>
        <label for="marksheet_ug">marksheet_ug:</label>
        <input type="text" id="marksheet_ug" name="marksheet_ug" value="<?php echo $userDetails['marksheet_ug']; ?>" required>
        <br>
        <label for="board_pg">board_pg:</label>
        <input type="text" id="board_pg" name="board_pg" value="<?php echo $userDetails['board_pg']; ?>" required>
        <br>
        <label for="passing_year_pg">passing_year_pg:</label>
        <input type="text" id="passing_year_pg" name="passing_year_pg" value="<?php echo $userDetails['passing_year_pg']; ?>" required>
        <br>
        <label for="roll_enrollment_pg">roll_enrollment_pg:</label>
        <input type="text" id="roll_enrollment_pg" name="roll_enrollment_pg" value="<?php echo $userDetails['roll_enrollment_pg']; ?>" required>
        <br>
        <label for="result_division_pg">result_division_pg:</label>
        <input type="text" id="result_division_pg" name="result_division_pg" value="<?php echo $userDetails['result_division_pg']; ?>" required>
        <br>
        <label for="percentage_pg">percentage_pg:</label>
        <input type="text" id="percentage_pg" name="percentage_pg" value="<?php echo $userDetails['percentage_pg']; ?>" required>
        <br>
        <label for="marksheet_pg">marksheet_pg:</label>
        <input type="text" id="marksheet_pg" name="marksheet_pg" value="<?php echo $userDetails['marksheet_pg']; ?>" required>
        <br>
        <label for="board_diploma">board_diploma:</label>
        <input type="text" id="board_diploma" name="board_diploma" value="<?php echo $userDetails['board_diploma']; ?>" required>
        <br>
        <label for="passing_year_diploma">passing_year_diploma:</label>
        <input type="text" id="passing_year_diploma" name="passing_year_diploma" value="<?php echo $userDetails['passing_year_diploma']; ?>" required>
        <br>
        <label for="roll_enrollment_diploma">roll_enrollment_diploma:</label>
        <input type="text" id="roll_enrollment_diploma" name="roll_enrollment_diploma" value="<?php echo $userDetails['roll_enrollment_diploma']; ?>" required>
        <br>
        <label for="result_division_diploma">result_division_diploma:</label>
        <input type="text" id="result_division_diploma" name="result_division_diploma" value="<?php echo $userDetails['result_division_diploma']; ?>" required>
        <br>
        <label for="percentage_diploma">percentage_diploma:</label>
        <input type="text" id="percentage_diploma" name="percentage_diploma" value="<?php echo $userDetails['percentage_diploma']; ?>" required>
        <br>
        <label for="marksheet_diploma">marksheet_diploma:</label>
        <input type="text" id="marksheet_diploma" name="marksheet_diploma" value="<?php echo $userDetails['marksheet_diploma']; ?>" required>
        <br>
        <label for="board_certificate">board_certificate:</label>
        <input type="text" id="board_certificate" name="board_certificate" value="<?php echo $userDetails['board_certificate']; ?>" required>
        <br>
        <label for="roll_enrollment_certificate">roll_enrollment_certificate:</label>
        <input type="text" id="roll_enrollment_certificate" name="roll_enrollment_certificate" value="<?php echo $userDetails['roll_enrollment_certificate']; ?>" required>
        <br>
        <label for="result_division_certificate">result_division_certificate:</label>
        <input type="text" id="result_division_certificate" name="result_division_certificate" value="<?php echo $userDetails['result_division_certificate']; ?>" required>
        <br>
        <label for="percentage_certificate">percentage_certificate:</label>
        <input type="text" id="percentage_certificate" name="percentage_certificate" value="<?php echo $userDetails['percentage_certificate']; ?>" required>
        <br>
        <label for="marksheet_certificate">marksheet_certificate:</label>
        <input type="text" id="marksheet_certificate" name="marksheet_certificate" value="<?php echo $userDetails['marksheet_certificate']; ?>" required>
        <br>
        <label for="photo_path">photo_path:</label>
        <input type="text" id="photo_path" name="photo_path" value="<?php echo $userDetails['photo_path']; ?>" required>
        <br>
        <label for="signature_path">signature_path:</label>
        <input type="text" id="signature_path" name="signature_path" value="<?php echo $userDetails['signature_path']; ?>" required>
        <br>
        <label for="Caste_Certificate">Caste_Certificate:</label>
        <input type="text" id="Caste_Certificate" name="Caste_Certificate" value="<?php echo $userDetails['marksheet_certificate']; ?>" required>
        <br>
        <!-- Add other input fields for additional user details -->
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
