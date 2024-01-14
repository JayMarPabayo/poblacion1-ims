<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;



class OfficialsService
{
    public function __construct(private Database $db)
    {
    }

    public function officialDuplicateCheck(int $id,)
    {
        $officialCount = $this->db->query(
            "SELECT COUNT(*) FROM tbl_officials WHERE official_resident = :id",
            [
                'id' => $id
            ]
        )->count();

        if ($officialCount > 0) {
            $_SESSION['warning_message'] = "Duplicate Entry of Personnel";
            throw new ValidationException(['official' => 'Official Entry Duplicate.']);
        }
    }

    public function create(array $formData)
    {
        $this->officialDuplicateCheck((int) $formData['resident-id']);
        $this->db->query(
            "INSERT INTO tbl_officials (official_resident, official_position) VALUES (:resident, :position)",
            [
                'resident' => $formData['resident-id'],
                'position' => $formData['position']
            ]

        );
    }

    public function getAllOfficials()
    {
        $officials = $this->db->query("SELECT * FROM tbl_officials INNER JOIN tbl_residents ON official_resident = resident_id")->findAll();
        return $officials;
    }

    public function getOfficial(string $id)
    {
        return $this->db->query(
            "SELECT * FROM tbl_officials INNER JOIN tbl_residents ON official_resident = resident_id WHERE official_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }

    public function update(array $formData, int $id)
    {

        $this->db->query(
            "UPDATE tbl_officials SET official_resident = :resident,
            official_position = :position,
            official_updated_at = now() WHERE official_id = :id",
            [
                'id' => $id,
                'resident' => $formData['resident-id'],
                'position' => $formData['position']
            ]
        );

        $_SESSION['update_message'] = "Updated Successfully";
    }
}
