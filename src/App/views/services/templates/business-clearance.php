<?php
require(__DIR__  . "/../fpdf/fpdf.php");
header('content-type:application/pdf');
$robotoBold = __DIR__  . "/../Roboto-Bold.ttf";
$robotoRegular = __DIR__  . "/../Roboto-Regular.ttf";
$filename = generateFilename($document['fullname'], $document['date'], 'business clearance');

$image = imagecreatefromjpeg("assets/templates/business-clearance.jpg");
$color = imagecolorallocate($image, 19, 21, 22);

imagettftext($image, 36, 0, 890, 1090, $color, $robotoBold, strtoupper($document['business']) ?? '');
imagettftext($image, 36, 0, 890, 1240, $color, $robotoBold, strtoupper($document['fullname']) ?? '');
imagettftext($image, 36, 0, 680, 2150, $color, $robotoBold, convertToDateFormat($document['date']) ?? '');
imagettftext($image, 27, 0, 490, 2260, $color, $robotoBold, $document['ornumber'] ?? '');
imagettftext($image, 27, 0, 490, 2315, $color, $robotoBold, date("m/d/y", strtotime($document['date'])) ?? '');
imagettftext($image, 27, 0, 490, 2380, $color, $robotoBold, number_format($document['amount'], 2) ?? '');
imagettftext($image, 27, 0, 490, 2435, $color, $robotoBold, $document['bncnumber'] ?? '');

// -- GUIDE GRID -- 
// imagettftext($image, 24, 0, 100, 100, $color, $robotoBold, '100 x 100');
// imagettftext($image, 24, 0, 200, 200, $color, $robotoBold, '200 x 200');
// imagettftext($image, 24, 0, 300, 300, $color, $robotoBold, '300 x 300');
// imagettftext($image, 24, 0, 400, 400, $color, $robotoBold, '400 x 400');
// imagettftext($image, 24, 0, 500, 500, $color, $robotoBold, '500 x 500');
// imagettftext($image, 24, 0, 600, 600, $color, $robotoBold, '600 x 600');
// imagettftext($image, 24, 0, 700, 700, $color, $robotoBold, '700 x 700');
// imagettftext($image, 24, 0, 800, 800, $color, $robotoBold, '800 x 800');
// imagettftext($image, 24, 0, 900, 900, $color, $robotoBold, '900 x 900');
// imagettftext($image, 24, 0, 1000, 1000, $color, $robotoBold, '1000 x 1000');
// imagettftext($image, 24, 0, 1100, 1100, $color, $robotoBold, '1100 x 1100');
// imagettftext($image, 24, 0, 1200, 1200, $color, $robotoBold, '1200 x 1200');
// imagettftext($image, 24, 0, 1300, 1300, $color, $robotoBold, '1300 x 1300');
// imagettftext($image, 24, 0, 1400, 1400, $color, $robotoBold, '1400 x 1400');
// imagettftext($image, 24, 0, 1500, 1500, $color, $robotoBold, '1500 x 1500');
// imagettftext($image, 24, 0, 1600, 1600, $color, $robotoBold, '1600 x 1600');
// imagettftext($image, 24, 0, 1700, 1700, $color, $robotoBold, '1700 x 1700');
// imagettftext($image, 24, 0, 1800, 1800, $color, $robotoBold, '1800 x 1800');
// imagettftext($image, 24, 0, 1900, 1900, $color, $robotoBold, '1900 x 1900');
// imagettftext($image, 24, 0, 2000, 2000, $color, $robotoBold, '2000 x 2000');
// imagettftext($image, 24, 0, 1900, 2100, $color, $robotoBold, '1900 x 2100');
// imagettftext($image, 24, 0, 1800, 2200, $color, $robotoBold, '1800 x 2200');
// imagettftext($image, 24, 0, 1700, 2300, $color, $robotoBold, '1700 x 2300');
// imagettftext($image, 24, 0, 1600, 2400, $color, $robotoBold, '1600 x 2400');
// imagettftext($image, 24, 0, 1500, 2500, $color, $robotoBold, '1500 x 2500');
// imagettftext($image, 24, 0, 1400, 2600, $color, $robotoBold, '1400 x 2600');
// -- END: GUIDE GRID -- 


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
