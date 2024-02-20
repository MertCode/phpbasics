<?php
session_start();
ob_end_clean();
require 'vendor/autoload.php';

/* Assignment:
Try using styling, like font names and colors
try using tables to display the data
Resize the logo
Header/footer on every page? and forced page break... do research!
Include the QR code */

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$tel = $_SESSION['tel'];
$tday_name = $_SESSION['tday_name'];

// Create a new instance of DOMPDF class and allow remote images in content
$dompdf  =  new \Dompdf\Dompdf(array('enable_remote'  =>  true));

// Define the HTML content  
$html  =  "
<!DOCTYPE html>
<html>
<head>
  <title>Thema Dag</title>
  <!-- Import Bootstrap CSS -->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      color: #333;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #007bff;
    }
    p {
      line-height: 1.6;
    }
    img {
      width: 100%;
      max-width: 200px;
      display: block;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class='container'>
    <table class='table'>
      <tbody>
        <tr>
          <td colspan='2'><h1>Hello $name</h1></td>
        </tr>
    <tr>
    <td colspan='2'><img src='phpbasics/oefthema/assets/logo.svg'></td>
</tr>

        <tr>
          <td>Thema Dag:</td>
          <td>$tday_name</td>
        </tr>
        <tr>
          <td>E-mailadres:</td>
          <td>$email</td>
        </tr>
        <tr>
          <td>Telefoonnummer:</td>
          <td>$tel</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>";

// Load the HTML content to DOMPDF
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// generate random filename
$filename = md5(microtime()) . '_themadag.pdf';
$dompdf->stream($filename,  array("Attachment"  =>  1));
