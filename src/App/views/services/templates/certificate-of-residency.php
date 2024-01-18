<?php
require(__DIR__  . "/../fpdf/fpdf.php");
header('content-type:image/jpeg');
$robotoBold = __DIR__  . "/../Roboto-Bold.ttf";
$robotoRegular = __DIR__  . "/../Roboto-Regular.ttf";
$filename = generateFilename($document['fullname'], $document['date'], 'certificate of residency');

$image = imagecreatefromjpeg("assets/templates/certificate-of-residency.jpg");
$color = imagecolorallocate($image, 19, 21, 22);
imagettftext($image, 50, 0, 1050, 1230, $color, $robotoBold, $document['fullname'] ?? '');
imagettftext($image, 45, 0, 680, 1290, $color, $robotoBold, calculateAge($document['birthdate']) ?? '');
imagettftext($image, 45, 0, 740, 1980, $color, $robotoBold, getOrdinalNumber($document['date']) ?? '');
imagettftext($image, 45, 0, 1150, 1980, $color, $robotoBold, date("F", strtotime($document['date'])) ?? '');
imagettftext($image, 34, 0, 330, 2320, $color, $robotoRegular, $document['fullname'] ?? '');
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
