<?php
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;

// Function to convert hexadecimal color to RGB
function hexToRgb($hex)
{
    // Remove the '#' symbol if present
    $hex = str_replace('#', '', $hex);

    // Split the hexadecimal color into red, green, and blue components
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Return an associative array with RGB values
    return ['r' => $r, 'g' => $g, 'b' => $b];
}

function download_qr()
{
    $qrCode = new QrCode('https://www.sojansir.com');

    // Set the color of the QR code using a hexadecimal color
    $colorHex = '#FF0000'; // Red
    $colorRgb = hexToRgb($colorHex);
    $qrCode->setForegroundColor($colorRgb);

    // Set the size of the QR code in pixels (e.g., 200x200)
    $qrCode->setSize(200);

    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="qr-code.png"');
    echo $qrCode->writeString('png');
    exit;
}

function preview_base64()
{
    $qrCode = new QrCode('https://www.sojansir.com');

    // Set the color of the QR code using a hexadecimal color
    $colorHex = '#0000FF'; // Blue
    $colorRgb = hexToRgb($colorHex);
    $qrCode->setForegroundColor($colorRgb);

    // Set the size of the QR code in pixels (e.g., 150x150)
    $qrCode->setSize(150);

    header('Content-Type: image/png');
    echo $qrCode->writeString('png');
    echo '<img src="data:image/png;base64,' . base64_encode($qrCode->writeString('png')) . '" alt="QR Code">';
}

function save_file()
{
    $qrCode = new QrCode('https://www.sojansir.com');

    // Set the color of the QR code using a hexadecimal color
    $colorHex = '#00FF00'; // Green
    $colorRgb = hexToRgb($colorHex);
    $qrCode->setForegroundColor($colorRgb);

    // Set the size of the QR code in pixels (e.g., 250x250)
    $qrCode->setSize(250);

    $imagePath = 'qr-code.png';
    $qrCode->writeFile($imagePath);
}

preview_base64();