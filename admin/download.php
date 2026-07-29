
<?php 
include("../connection.php"); // Including a connection file, possibly for database connectivity

if (isset($_GET['file'])) {
    $filepath = $_GET['file']; // Get the file path from the GET parameter
    $filename = basename($filepath); // Extract the filename from the path

    // Set appropriate headers for download
    header('Content-Type: application/pdf'); // Set content type to PDF
    header('Content-Disposition: attachment; filename="' .basename($filename) . '"'); // Suggest download with the original filename
    header('Content-Length: ' . filesize($filepath)); // Set content length

    // Read and output the file content
    readfile($filepath); // Output the file content to the browser
    exit; // Terminate the script after sending the file
}
?>
