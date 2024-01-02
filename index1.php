<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>

        <?php
        // Start the session at the beginning of the script
        session_start();

        require_once('config.php');

        // Check if the form is submitted (POST request)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin_username = $_POST['username'];
            $admin_password = $_POST['password'];

            // Use prepared statements to prevent SQL injection
            $query = "SELECT * FROM admin WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $admin_username);
            $stmt->execute();
            
            // Get the result of the query
            $result = $stmt->get_result();

            // Check if there is a matching row
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verify the password using password_verify
                if (password_verify($admin_password, $row['password'])) {
                    // Set session variable and redirect to admin_panel.php
                    $_SESSION['admin'] = true;
                    header('Location: admin_panel.php');
                    exit();
                } else {
                    $error = "Invalid credentials";
                }
            } else {
                $error = "Invalid credentials";
            }

            // Close the prepared statement
            $stmt->close();
        }
        ?>

        <!-- HTML Form -->
        <form method="post" action="">
            <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
