<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;



class ResidentsService
{
    public function __construct(private Database $db)
    {
    }

    public function create(array $formData)
    {
        $this->db->query(
            "INSERT INTO tbl_residents (
                resident_purok,
                resident_first_name,
                resident_middle_name,
                resident_last_name,
                resident_suffix,
                resident_birthdate,
                resident_gender,
                resident_email,
                resident_contact,
                resident_civil_status,
                resident_voter_status,
                resident_religion,
                resident_created_by 
            ) VALUES (
                :purok,
                :first_name,
                :middle_name,
                :last_name,
                :suffix,
                :birthdate,
                :gender,
                :email,
                :contact,
                :civil_status,
                :voter_status,
                :religion,
                :created_by 
            )",
            [
                'purok' => $formData['purok'],
                'first_name' => $formData['first-name'],
                'middle_name' => $formData['middle-name'],
                'last_name' => $formData['last-name'],
                'suffix' => $formData['suffix'],
                'birthdate' => $formData['birthdate'],
                'gender' => $formData['gender'],
                'email' => $formData['email'],
                'contact' => $formData['contact-number'],
                'civil_status' => $formData['civil-status'],
                'voter_status' => $formData['voter-status'],
                'religion' => $formData['religion'],
                'created_by'  => $_SESSION['user']
            ]

        );
    }

    public function getAllResidents(int $length, int $offset)
    {
        $search = addcslashes($_GET['search'] ?? "", '%_');
        $parameters = ['search' => "%{$search}%"];
        $residents = $this->db->query("SELECT * FROM tbl_residents LEFT JOIN tbl_purok ON resident_purok = purok_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search LIMIT {$length} OFFSET {$offset}", $parameters)->findAll();

        $residentsCount = $this->db->query("SELECT * FROM tbl_residents WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search", $parameters)->count();

        return [$residents, $residentsCount];
    }
}
