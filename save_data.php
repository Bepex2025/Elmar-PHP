<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $organization = $_POST['organization'] ?? '';

    // Define the CSV file name
    $file = 'user_data.csv';

    // Check if the file exists and needs headers
    $headers = !file_exists($file) ? ["Name", "Email", "Organization"] : [];

    // Open the file for writing (append mode)
    $fp = fopen($file, 'a');

    // Check if file was opened successfully
    if ($fp === false) {
        die("Error opening the file");
    }

    // Write headers if file is new
    if (!empty($headers)) {
        fputcsv($fp, $headers);
    }

    // Write user data to CSV
    fputcsv($fp, [$name, $email, $organization]);

    // Close the file
    fclose($fp);

    echo "Data saved successfully!";
} else {
    echo "Invalid request!";
}
?>
