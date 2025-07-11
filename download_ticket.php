<?php
session_start();
require('fpdf/fpdf.php'); // Make sure you uploaded this file/folder correctly
include 'db.php';

// Check user login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // optional

// Fetch latest booking for logged-in user
$sql = "SELECT * FROM bookings WHERE name = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Title
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(0, 15, 'Welcome to Village Tour', 0, 1, 'C');

    // Booking Info
    $pdf->SetFont('Arial', '', 14);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Name: ' . $row['name'], 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
    $pdf->Cell(0, 10, 'Date: ' . $row['date'], 0, 1);
    $pdf->Cell(0, 10, 'Village: ' . $row['village'], 0, 1);
    $pdf->Ln(10);
    $pdf->MultiCell(0, 10, 'Message: ' . $row['message']);

    // Download the PDF
    $pdf->Output('D', 'Village_Ticket.pdf');
} else {
    echo "<script>alert('No booking found for user'); window.location.href='user_dashboard.php';</script>";
}
?>
