<?php
require(__DIR__  . "/../fpdf/fpdf.php");
header('content-type:application/pdf');
$robotoBold = __DIR__  . "/../Roboto-Bold.ttf";
$robotoRegular = __DIR__  . "/../Roboto-Regular.ttf";
$filename = generateFilename($document['fullname'], $document['date'], 'certificate of indigency');

$image = imagecreatefromjpeg("assets/templates/certificate-of-indigency.jpg");
$color = imagecolorallocate($image, 19, 21, 22);
imagettftext($image, 50, 0, 1270, 1230, $color, $robotoBold, $document['fullname'] ?? '');
imagettftext($image, 36, 0, 880, 1290, $color, $robotoBold, $document['purok'] ?? '');
imagettftext($image, 36, 0, 840, 1670, $color, $robotoBold, $document['purpose'] ?? '');
imagettftext($image, 36, 0, 915, 1835, $color, $robotoBold, getOrdinalNumber($document['date']) ?? '');
imagettftext($image, 45, 0, 1260, 1830, $color, $robotoBold, date("F", strtotime($document['date'])) ?? '');
imagejpeg($image, "$filename.jpg");
imagedestroy($image);

$pdf = new FPDF();
$pdf->AddPage("P", "Letter");
$imageWidth = $pdf->GetPageWidth();
$imageHeight = $pdf->GetPageHeight();
$pdf->Image("$filename.jpg", 0, 0, $imageWidth, $imageHeight);
ob_end_clean();
$pdf->Output("D", $filename . ".pdf");

unlink("$filename.jpg");
