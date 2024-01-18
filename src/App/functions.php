<?php

declare(strict_types=1);

function dd(mixed $value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function e(mixed $value)
{
    return htmlspecialchars((string) $value);
}


function redirectTo(string $path)
{
    header("Location: {$path}");
    http_response_code(302);
    exit;
}

function calculateAge($birthDate)
{
    $birthDate = new DateTime($birthDate);
    $currentDate = new DateTime();
    $ageInterval = $currentDate->diff($birthDate);
    return $ageInterval->y;
}

function convertToYesNo(int $value)
{
    return ($value === 1) ? 'Yes' : 'No';
}

function convertToDateFormat($sqlDatetime)
{
    $dateTime = new DateTime($sqlDatetime);
    return $dateTime->format('F j, Y');
}

function convertToTimeFormat($sqlDatetime)
{
    $dateTime = new DateTime($sqlDatetime);
    return $dateTime->format('g:i A');
}

function generateFilename($fullname, $datetime, $documentType)
{
    $cleanedFullname = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $fullname));
    $cleanedDatetime = date('mdY', strtotime($datetime));
    $cleanedDocumentType = strtolower(str_replace(' ', '-', $documentType));
    $filename = "{$cleanedFullname}-{$cleanedDocumentType}-{$cleanedDatetime}";

    return $filename;
}


function getOrdinalNumber($datetime)
{
    $dayOfMonth = date('j', strtotime($datetime));

    switch ($dayOfMonth % 10) {
        case 1:
            $suffix = 'st';
            break;
        case 2:
            $suffix = 'nd';
            break;
        case 3:
            $suffix = 'rd';
            break;
        default:
            $suffix = 'th';
            break;
    }
    if (($dayOfMonth % 100 >= 11) && ($dayOfMonth % 100 <= 13)) {
        $suffix = 'th';
    }
    $ordinalNumber = $dayOfMonth . $suffix;

    return $ordinalNumber;
}
