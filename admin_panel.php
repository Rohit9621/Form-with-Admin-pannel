<?php
session_start();
require_once('config.php');

// Check if the admin is not logged in, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header('Location: admin_panel.php');
    exit();
}

// Fetch all users
$query = "SELECT * FROM applications";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        input[type="text"] {
            padding: 10px;
            margin-right: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }
        .signature-image {
            max-width: 50px; /* Adjust the size as needed */
            max-height: 30px; /* Adjust the size as needed */
        }
        .edit-btn {
        padding: 8px;
        margin-right: 5px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        background-color: #2196F3;
        color: white;
        text-decoration: none; /* Remove default link underline */
        transition: background-color 0.3s ease;
    }

    .edit-btn:hover {
        background-color: #0b7dda; /* Darker color on hover */
    }

    .delete-btn {
        padding: 8px;
        margin-right: 5px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        background-color: #f44336;
        color: white;
        text-decoration: none; /* Remove default link underline */
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #d32f2f; /* Darker color on hover */
    }
    </style>
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <button onclick="redirectToLogin()">Login</button>
    <br>
    <h3>User List:</h3>
    <input type="text" id="searchInput" placeholder="Search by name">
    <button onclick="searchUsers()">Search</button>
    <table border="1">
        <thead>
            <tr>
            <th>id</th>
                <th>applied_post</th>
                <th>name</th>
                <th>father_name</th>
                <th>mother_name</th>
                <th>marital_status</th>
                <th>husband_wife_name</th>
                <th>dob</th>
                <th>sex</th>
                <th>caste_name</th>
                <th>caste_category</th>
                <th>religion</th>
                <th>address</th>
                <th>mobile</th>
                <th>whatsapp_number</th>
                <th>email</th>
                <th>board_10th</th>
                <th>passing_year_10th</th>
                <th>roll_enrollment_10th</th>
                <th>result_division_10th</th>
                <th>percentage_10th</th>
                <th>marksheet_10th</th>
                <th>board_12th</th>
                <th>passing_year_12th</th>
                <th>roll_enrollment_12th</th>
                <th>result_division_12th</th>
                <th>percentage_12th</th>
                <th>marksheet_12th</th>
                <th>board_ug</th>
                <th>passing_year_ug</th>
                <th>roll_enrollment_ug</th>
                <th>result_division_ug</th>
                <th>percentage_ug</th>
                <th>marksheet_ug</th>
                <th>board_pg</th>
                <th>passing_year_pg</th>
                <th>roll_enrollment_pg</th>
                <th>result_division_pg</th>
                <th>percentage_pg</th>
                <th>marksheet_pg</th>
                <th>board_diploma</th>
                <th>passing_year_diploma</th>
                <th>roll_enrollment_diploma</th>
                <th>result_division_diploma</th>
                <th>percentage_diploma</th>
                <th>marksheet_diploma</th>
                <th>board_certificate</th>
                <th>passing_year_certificate</th>
                <th>roll_enrollment_certificate</th>
                <th>result_division_certificate</th>
                <th>percentage_certificate</th>
                <th>marksheet_certificate</th>
                <th>Caste_Certificate</th>
                <th>photo_path</th>
                <th>signature_path</th>
            </tr>
        </thead>
        <tbody id="userTableBody">
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                <td>
                    <?= $row['id'] ?>
                </td>
                <td>
                    <?= $row['applied_post'] ?>
                </td>
                <td>
                    <?= $row['name'] ?>
                </td>
                <td>
                    <?= $row['father_name'] ?>
                </td>
                <td>
                    <?= $row['mother_name'] ?>
                </td>
                <td>
                    <?= $row['marital_status'] ?>
                </td>
                <td>
                    <?= $row['husband_wife_name'] ?>
                </td>
                <td>
                    <?= $row['dob'] ?>
                </td>
                <td>
                    <?= $row['sex'] ?>
                </td>
                <td>
                    <?= $row['caste_name'] ?>
                </td>
                <td>
                    <?= $row['caste_category'] ?>
                </td>
                <td>
                    <?= $row['religion'] ?>
                </td>
                <td>
                    <?= $row['address'] ?>
                </td>
                <td>
                    <?= $row['mobile'] ?>
                </td>
                <td>
                    <?= $row['whatsapp_number'] ?>
                </td>
                <td>
                    <?= $row['email'] ?>
                </td>
                <td>
                    <?= $row['board_10th'] ?>
                </td>
                <td>
                    <?= $row['passing_year_10th'] ?>
                </td>
                <td>
                    <?= $row['roll_enrollment_10th'] ?>
                </td>
                <td>
                    <?= $row['result_division_10th'] ?>
                </td>
                <td>
                    <?= $row['percentage_10th'] ?>
                </td>
                <td>
                    <?= $row['marksheet_10th'] ?>
                </td>
                <td>
                    <?= $row['board_12th'] ?>
                </td>
                <td>
                    <?= $row['passing_year_12th'] ?>
                </td>
                <td>
                    <?= $row['roll_enrollment_12th'] ?>
                </td>
                <td>
                    <?= $row['result_division_12th'] ?>
                </td>
                <td>
                    <?= $row['percentage_12th'] ?>
                </td>
                <td>
                    <?= $row['marksheet_12th'] ?>
                </td>
                <td>
                    <?= $row['board_ug'] ?>
                </td>
                <td>
                    <?= $row['passing_year_ug'] ?>
                </td>
                <td>
                    <?= $row['roll_enrollment_ug'] ?>
                </td>
                <td>
                    <?= $row['result_division_ug'] ?>
                </td>
                <td>
                    <?= $row['percentage_ug'] ?>
                </td>
                <td>
                    <?= $row['marksheet_ug'] ?>
                </td>
                <td>
                    <?= $row['board_pg'] ?>
                </td>
                <td>
                    <?= $row['passing_year_pg'] ?>
                </td>
                <td>
                    <?= $row['roll_enrollment_pg'] ?>
                </td>
                <td>
                    <?= $row['result_division_pg'] ?>
                </td>
                <td>
                    <?= $row['percentage_pg'] ?>
                </td>
                <td>
                    <?= $row['marksheet_pg'] ?>
                </td>
                <td>
                    <?= $row['board_diploma'] ?>
                </td>
                <td>
                    <?= $row['passing_year_diploma'] ?>
                </td>
                <td>
                    <?= $row['roll_enrollment_diploma'] ?>
                </td>
                <td>
                    <?= $row['result_division_diploma'] ?>
                </td>
                <td>
                    <?= $row['percentage_diploma'] ?>
                </td>
                <td>
                    <?= $row['marksheet_diploma'] ?>
                </td>
                <td>
                    <?= $row['board_certificate'] ?>
                </td>
                <td>
                    <?= $row['passing_year_certificate'] ?>
                </td>
                <td>
                    <?= $row['roll_enrollment_certificate'] ?>
                </td>
                <td>
                    <?= $row['result_division_certificate'] ?>
                </td>
                <td>
                    <?= $row['percentage_certificate'] ?>
                </td>
                <td>
                    <?= $row['marksheet_certificate'] ?>
                </td>
                <td>
                    <?= $row['photo_path'] ?>
                </td>
                <td>
                    <?= $row['signature_path'] ?>
                </td>
                <td>
                    <?= $row['Caste_Certificate'] ?>
                </td>
                <td>
                  
                    <button onclick="deleteUser(<?= $row['id'] ?>)">Delete</button>
                    <button onclick="edituser(<?= $row['id'] ?>)">EDIT</button>         
                       </td>
                </tr>
            <?php endwhile; ?>
       </tbody>
    </table>
    <script>
    // AJAX function to fetch user data
    function fetchUsers() {
        $.ajax({
            url: 'fetch_users.php',
            type: 'GET',
            success: function (data) {
                $('#userTableBody').html(data);
            },
            error: function () {
                console.log('Error fetching users');
            }
        });
    }

    // Function to search users
    function searchUsers() {
        var searchTerm = $('#searchInput').val();
        $.ajax({
            url: 'search_users.php',
            type: 'GET',
            data: { term: searchTerm },
            success: function (data) {
                $('#userTableBody').html(data);
            },
            error: function () {
                console.log('Error searching users');
            }
        });
    }

    // Function to delete user
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: 'delete_user.php',
                type: 'GET',
                data: { id: userId },
                success: function (data) {
                    fetchUsers(); // Refresh the user list after deletion
                },
                error: function () {
                    console.log('Error deleting user');
                }
            });
        }
    }

    // Function to edit user (you can redirect to the edit_user.php page)
    function edituser(userId) {
        window.location.href = 'edit_user.php?id=' + userId;
    }


</script>
</body>
</html>