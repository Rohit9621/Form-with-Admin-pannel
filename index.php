<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        header img {
            max-width: 100px;
            /* Adjust the max-width as needed */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: grid;
            grid-gap: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
        }

        header p {
            text-align: center;
            margin-top: 0;
            /* Remove default margin to bring the <p> closer */
        }

        @media (max-width: 600px) {
            form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <img src="photo_6080103713541832031_x.jpg" alt="Logo">
            <h3>College Name</h3><br><br>
            <div>
                <button class="home">Home</button>

                <button class="download-button" onclick="downloadSamplePDF()">Download Sample PDF</button>
            </div>
        </header>

        <h2>Application Form for Work Assistant Vacancy Dec. 2023</h2>
        <form action="submit_form.php" method="post" enctype="multipart/form-data">
            <label for="applied_post">Applied Post For:</label>
            <input type="text" name="applied_post" required>
            <label for="name">Name of Applicant:</label>
            <input type="text" name="name" required>
            <label for="father_name">Father Name:</label>
            <input type="text" name="father_name" required>
            <label for="mother_name">Mother Name:</label>
            <input type="text" name="mother_name" required>
            <label for="marital_status">Marital Status:</label>
            <select name="marital_status" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
            </select>
            <label for="husband_wife_name">Husband/Wife Name (If Married):</label>
            <input type="text" name="husband_wife_name">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required>
            <label for="sex">Sex:</label>
            <select name="sex" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Transgender">Transgender</option>
            </select>
            <label for="caste_name">Cast Name:</label>
            <input type="text" name="caste_name">
            <label for="caste_category">Caste Category:</label>
            <select name="caste_category">
                <option value="General">General</option>
                <option value="EWS">EWS</option>
                <option value="OBC">OBC</option>
                <option value="ST">ST</option>
                <option value="SC">SC</option>
                <option value="Minority">Minority</option>
                <option value="Others">Others</option>
            </select>
            <label for="religion">Religion:</label>
            <input type="text" name="religion">
            <label for="address">Address:</label>
            <textarea name="address" rows="4"></textarea>
            <label for="mobile">Mobile:</label>
            <input type="tel" name="mobile">
            <label for="whatsapp_number">Whatsapp Number:</label>
            <input type="tel" name="whatsapp_number">
            <label for="email">Email:</label>
            <input type="email" name="email">
            <!-- Education Qualification Details -->
            <fieldset>
                <legend>Education Qualification Details</legend>
                <table>
                    <tr>
                        <th>Qualification</th>
                        <th>Board / Council / University / Institute</th>
                        <th>Passing Year</th>
                        <th>Roll No / Enrollment</th>
                        <th>Result / Division</th>
                        <th>Percentage</th>
                        <th>Upload Marksheet</th>
                    </tr>
                    <tr>
                        <td>10th</td>
                        <td><input type="text" name="board_10th"></td>
                        <td><input type="text" name="passing_year_10th"></td>
                        <td><input type="text" name="roll_enrollment_10th"></td>
                        <td><input type="text" name="result_division_10th"></td>
                        <td><input type="text" name="percentage_10th"></td>
                        <td>
                            <label for="marksheet_10th">Upload 10th Marksheet:</label>
                            <input type="file" name="marksheet_10th" id="marksheet_10th" accept="image/*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>12th</td>
                        <td><input type="text" name="board_12th"></td>
                        <td><input type="text" name="passing_year_12th"></td>
                        <td><input type="text" name="roll_enrollment_12th"></td>
                        <td><input type="text" name="result_division_12th"></td>
                        <td><input type="text" name="percentage_12th"></td>
                        <td>
                            <label for="marksheet_12th">Upload 12th Marksheet:</label>
                            <input type="file" name="marksheet_12th" id="marksheet_12th" accept="image/*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>UG</td>
                        <td><input type="text" name="board_ug"></td>
                        <td><input type="text" name="passing_year_ug"></td>
                        <td><input type="text" name="roll_enrollment_ug"></td>
                        <td><input type="text" name="result_division_ug"></td>
                        <td><input type="text" name="percentage_ug"></td>
                        <td>
                            <label for="marksheet_ug">Upload UG Marksheet:</label>
                            <input type="file" name="marksheet_ug" id="marksheet_ug" accept="image/*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>PG</td>
                        <td><input type="text" name="board_pg"></td>
                        <td><input type="text" name="passing_year_pg"></td>
                        <td><input type="text" name="roll_enrollment_pg"></td>
                        <td><input type="text" name="result_division_pg"></td>
                        <td><input type="text" name="percentage_pg"></td>
                        <td>
                            <label for="marksheet_pg">Upload PG Marksheet:</label>
                            <input type="file" name="marksheet_pg" id="marksheet_pg" accept="image/*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Diploma</td>
                        <td><input type="text" name="board_diploma"></td>
                        <td><input type="text" name="passing_year_diploma"></td>
                        <td><input type="text" name="roll_enrollment_diploma"></td>
                        <td><input type="text" name="result_division_diploma"></td>
                        <td><input type="text" name="percentage_diploma"></td>
                        <td>
                            <label for="marksheet_diploma">Upload Diploma Marksheet:</label>
                            <input type="file" name="marksheet_diploma" id="marksheet_diploma" accept="image/*"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>Certificate</td>
                        <td><input type="text" name="board_certificate"></td>
                        <td><input type="text" name="passing_year_certificate"></td>
                        <td><input type="text" name="roll_enrollment_certificate"></td>
                        <td><input type="text" name="result_division_certificate"></td>
                        <td><input type="text" name="percentage_certificate"></td>
                        <td>
                            <label for="marksheet_certificate">Upload Certificate Marksheet:</label>
                            <input type="file" name="marksheet_certificate" id="marksheet_certificate" accept="image/*"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>Caste_Certificatee</td>
                        <td><input type="text" name="Caste_Certificate"></td>
                        <td><input type="text" name="Caste_Certificate"></td>
                        <td><input type="text" name="Caste_Certificate"></td>
                        <td><input type="text" name="Caste_Certificate"></td>
                        <td><input type="text" name="Caste_Certificate"></td>
                        <td>
                            <label for="Caste Certificat">Caste_Certificate:</label>
                            <input type="file" name="Caste_Certificate" id="Caste_Certificate" accept="image/*"
                                required>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <label for="photo">Upload Photo:</label>
            <input type="file" name="photo" accept="image/*" required>
            <label for="signature">Upload Signature:</label>
            <input type="file" name="signature" accept="image/*" required>
            <div>
                <img src="photo_6300813557373188637_y.jpg" alt="" style=" width: 50%;">
                <p style="margin-left: 96px;">rishabhsaini0204@okaxis</p>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>
    <script>
        function downloadSamplePDF() {
            // Replace "path/to/sample.pdf" with the actual path to your sample PDF file
            var pdfPath = "path/to/sample.pdf";

            // Create a temporary link element
            var link = document.createElement('a');
            link.href = pdfPath;
            link.download = 'https://www.w3schools.com/SQl/sql_alter.asp.pdf';

            // Trigger the click event on the link to start the download
            link.click();
        }
    </script>
</body>

</html>