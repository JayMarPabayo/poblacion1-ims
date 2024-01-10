<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;



class OfficialsService
{
    public function __construct(private Database $db)
    {
    }

    public function create(array $formData)
    {
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
}
