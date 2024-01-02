<?php
// Step 1: Include the database configuration file
include 'config.php';

// Step 2: Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 3: Retrieve form data
    $applied_post = $_POST['applied_post'];
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $marital_status = $_POST['marital_status'];
    $husband_wife_name = $_POST['husband_wife_name'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $caste_name = $_POST['caste_name'];
    $caste_category = $_POST['caste_category'];
    $religion = $_POST['religion'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $email = $_POST['email'];
    $board_10th = $_POST['board_10th'];
    $passing_year_10th = $_POST['passing_year_10th'];
    $roll_enrollment_10th = $_POST['roll_enrollment_10th'];
    $result_division_10th = $_POST['result_division_10th'];
    $percentage_10th = $_POST['percentage_10th'];
    $marksheet_10th = uploadFile('marksheet_10th', 'uploads/marksheets/');
    $board_12th = $_POST['board_12th'];
    $passing_year_12th = $_POST['passing_year_12th'];
    $roll_enrollment_12th = $_POST['roll_enrollment_12th'];
    $result_division_12th = $_POST['result_division_12th'];
    $percentage_12th = $_POST['percentage_12th'];
    $marksheet_12th = uploadFile('marksheet_12th', 'uploads/marksheets/');
    $board_ug = $_POST['board_ug'];
    $passing_year_ug = $_POST['passing_year_ug'];
    $roll_enrollment_ug = $_POST['roll_enrollment_ug'];
    $result_division_ug = $_POST['result_division_ug'];
    $percentage_ug = $_POST['percentage_ug'];
    $marksheet_ug = uploadFile('marksheet_ug', 'uploads/marksheets/');
    $board_pg = $_POST['board_pg'];
    $passing_year_pg = $_POST['passing_year_pg'];
    $roll_enrollment_pg = $_POST['roll_enrollment_pg'];
    $result_division_pg = $_POST['result_division_pg'];
    $percentage_pg = $_POST['percentage_pg'];
    $marksheet_pg = uploadFile('marksheet_pg', 'uploads/marksheets/');
    $board_diploma = $_POST['board_diploma'];
    $passing_year_diploma = $_POST['passing_year_diploma'];
    $roll_enrollment_diploma = $_POST['roll_enrollment_diploma'];
    $result_division_diploma = $_POST['result_division_diploma'];
    $percentage_diploma = $_POST['percentage_diploma'];
    $marksheet_diploma = uploadFile('marksheet_diploma', 'uploads/marksheets/');
    $board_certificate = $_POST['board_certificate'];
    $passing_year_certificate = $_POST['passing_year_certificate'];
    $roll_enrollment_certificate = $_POST['roll_enrollment_certificate'];
    $result_division_certificate = $_POST['result_division_certificate'];
    $percentage_certificate = $_POST['percentage_certificate'];
    $marksheet_certificate = uploadFile('marksheet_certificate', 'uploads/marksheets/');
    $Caste_Certificate = isset($_FILES['Caste_Certificate']) ? uploadFile('Caste_Certificate', 'uploads/marksheets/') : null;
    // Step 4: Upload files and get file paths
    $photo_path = uploadFile('photo', 'uploads/photos/');
    $signature_path = uploadFile('signature', 'uploads/signatures/');

    // Step 5: Insert data into the database
    $sql = "INSERT INTO applications ( `applied_post`, `name`, `father_name`, `mother_name`, `marital_status`, `husband_wife_name`, `dob`, `sex`, `caste_name`, `caste_category`, `religion`, `address`, `mobile`, `whatsapp_number`, `email`, `board_10th`, `passing_year_10th`, `roll_enrollment_10th`, `result_division_10th`, `percentage_10th`, `marksheet_10th`, `board_12th`, `passing_year_12th`, `roll_enrollment_12th`, `result_division_12th`, `percentage_12th`, `marksheet_12th`, `board_ug`, `passing_year_ug`, `roll_enrollment_ug`, `result_division_ug`, `percentage_ug`, `marksheet_ug`, `board_pg`, `passing_year_pg`, `roll_enrollment_pg`, `result_division_pg`, `percentage_pg`, `marksheet_pg`, `board_diploma`, `passing_year_diploma`, `roll_enrollment_diploma`, `result_division_diploma`, `percentage_diploma`, `marksheet_diploma`, `board_certificate`, `passing_year_certificate`, `roll_enrollment_certificate`, `result_division_certificate`, `percentage_certificate`, `marksheet_certificate`, `photo_path`, `signature_path`, `Caste_Certificate`) 
            VALUES ('$applied_post', '$name', '$father_name', '$mother_name', '$marital_status', '$husband_wife_name', '$dob', '$sex', '$caste_name', '$caste_category', '$religion', '$address', '$mobile', '$whatsapp_number', '$email', '$board_10th', '$passing_year_10th', '$roll_enrollment_10th', '$result_division_10th', '$percentage_10th', '$marksheet_10th', '$board_12th', '$passing_year_12th', '$roll_enrollment_12th', '$result_division_12th', '$percentage_12th', '$marksheet_12th', '$board_ug', '$passing_year_ug', '$roll_enrollment_ug', '$result_division_ug', '$percentage_ug', '$marksheet_ug', '$board_pg', '$passing_year_pg', '$roll_enrollment_pg', '$result_division_pg', '$percentage_pg', '$marksheet_pg', '$board_diploma', '$passing_year_diploma', '$roll_enrollment_diploma', '$result_division_diploma', '$percentage_diploma', '$marksheet_diploma', '$board_certificate', '$passing_year_certificate', '$roll_enrollment_certificate', '$result_division_certificate', '$percentage_certificate', '$marksheet_certificate', '$photo_path', '$signature_path', '$Caste_Certificate')";

    // echo "SQL Query: " . $sql; // Debug statement

    if ($conn->query($sql) === TRUE) {
        // Step 6: Display success message
        $id = $conn->insert_id;
        echo "Application submitted successfully!";
        
        // Step 7: Generate PDF and display download button
        $pdfPath = generatePDF($applied_post, $_POST, $id);
        echo '<br><button onclick="downloadPDF(\'' . $pdfPath . '\')">Download PDF</button>';
    } else {
        // Step 8: Display error if the database insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Step 9: Display an error if the form is not submitted
    echo "Error: Form not submitted.";
}

// Step 10: Close the database connection
$conn->close();

// Step 11: Function to handle file upload
function uploadFile($fileInputName, $uploadDirectory)
{
    $targetFile = $uploadDirectory . basename($_FILES[$fileInputName]['name']);
    // Check if the file has been successfully uploaded
    if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
        return $targetFile;
    } else {
        echo "";
        return null;
    }
}

// Step 12: Function to generate PDF
function generatePDF($applied_post, $form_data, $id)
{
    require_once('vendor/tecnickcom/tcpdf/tcpdf.php');
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 14);
    
    // Set styles (you can customize this as needed)
    $style = array(
        'border' => 0,
        'padding' => 'auto',
        'fgcolor' => array(0, 0, 0),
        'bgcolor' => false,
        'font' => 'helvetica',
        'width' => 0,
    );

    // Add content to PDF
    $pdf->writeHTML('<h1 style="text-align:center;">Application Details</h1>');
    foreach ($form_data as $label => $value) {
        $pdf->writeHTML("<p><strong>$label:</strong> $value</p>");
    }
     // Add the Application ID to the PDF
     $pdf->writeHTML("<p><strong>ID:</strong>$id</p>");

    // Add other fields as needed

    // Step 13: Save the PDF and return the file path
    $pdfPath = 'uploads/applications/' . 'application_' . time() . '.pdf';
    $pdf->Output($pdfPath, 'F');
    return $pdfPath;
}
?>
<script>
    // Step 14: JavaScript function to download the PDF
    function downloadPDF(pdfPath) {
        var link = document.createElement('a');
        link.href = pdfPath;
        link.download = 'application.pdf';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
