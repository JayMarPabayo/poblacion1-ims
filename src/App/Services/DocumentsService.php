<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class DocumentsService
{
    public function __construct(private Database $db)
    {
    }


    // -- Certificate of Residency --
    public function corCreate(array $formData)
    {
        $this->db->query(
            "INSERT INTO tbl_certificates_of_residency (cor_resident, cor_age, cor_date_time, cor_brgy_captain, cor_created_by) VALUES (:resident, :age, now(), :punongbarangay, :created_by)",
            [
                'resident' => $formData['resident-id'],
                'age' => $formData['applicant-age'],
                'punongbarangay' => $formData['punong-barangay'],
                'created_by'  => $_SESSION['user']
            ]
        );

        $_SESSION['update_message'] = "Created Successfully";
    }
    public function corGetAllRecords(int $length, int $offset)
    {
        $search = addcslashes($_GET['search'] ?? "", '%_');
        $parameters = ['search' => "%{$search}%"];
        $records = $this->db->query("SELECT * FROM tbl_certificates_of_residency LEFT JOIN tbl_residents ON cor_resident = resident_id INNER JOIN tbl_users ON cor_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search ORDER BY cor_date_time DESC LIMIT {$length} OFFSET {$offset}", $parameters)->findAll();

        $recordsCount = $this->db->query("SELECT * FROM tbl_certificates_of_residency LEFT JOIN tbl_residents ON cor_resident = resident_id INNER JOIN tbl_users ON cor_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search", $parameters)->count();

        return [$records, $recordsCount];
    }
    public function getCorDocument(int $id)
    {
        return $this->db->query(
            "SELECT CONCAT(resident_first_name, ' ', resident_middle_name, ' ', resident_last_name, ' ', resident_suffix) AS fullname,
            resident_birthdate AS birthdate,
            cor_date_time AS date
            FROM tbl_certificates_of_residency LEFT JOIN tbl_residents ON cor_resident = resident_id WHERE cor_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }
    public function corDelete(int $id)
    {

        $this->db->query("DELETE FROM tbl_certificates_of_residency WHERE cor_id = :id", ['id' => $id]);

        $_SESSION['delete_message'] = "Deleted Successfully";
    }
    // -- END: Certificate of Residency --


    // -- Certificate of Indigency -- 
    public function coiCreate(array $formData)
    {
        $this->db->query(
            "INSERT INTO tbl_certificates_of_indigency (coi_applicant, coi_purpose, coi_date_time, coi_brgy_captain, coi_created_by) VALUES (:applicant, :purpose, now(), :punongbarangay, :created_by)",
            [
                'applicant' => $formData['applicant-id'],
                'purpose' => $formData['applicant-purpose'],
                'punongbarangay' => $formData['punong-barangay'],
                'created_by'  => $_SESSION['user']
            ]
        );

        $_SESSION['update_message'] = "Created Successfully";
    }
    public function coiGetAllRecords(int $length, int $offset)
    {
        $search = addcslashes($_GET['search'] ?? "", '%_');
        $parameters = ['search' => "%{$search}%"];
        $records = $this->db->query("SELECT * FROM tbl_certificates_of_indigency LEFT JOIN tbl_residents ON coi_applicant = resident_id INNER JOIN tbl_users ON coi_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search ORDER BY coi_date_time DESC LIMIT {$length} OFFSET {$offset}", $parameters)->findAll();

        $recordsCount = $this->db->query("SELECT * FROM tbl_certificates_of_indigency LEFT JOIN tbl_residents ON coi_applicant = resident_id INNER JOIN tbl_users ON coi_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search", $parameters)->count();

        return [$records, $recordsCount];
    }
    public function getCoiDocument(int $id)
    {
        return $this->db->query(
            "SELECT CONCAT(resident_first_name, ' ', resident_middle_name, ' ', resident_last_name, ' ', resident_suffix) AS fullname,
            coi_purpose AS purpose,
            coi_date_time AS date,
            purok_name as purok
            FROM tbl_certificates_of_indigency
            LEFT JOIN tbl_residents ON coi_applicant = resident_id
            LEFT JOIN tbl_purok ON resident_purok = purok_id
            WHERE coi_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }
    public function coiDelete(int $id)
    {

        $this->db->query("DELETE FROM tbl_certificates_of_indigency WHERE coi_id = :id", ['id' => $id]);

        $_SESSION['delete_message'] = "Deleted Successfully";
    }
    // -- END: Certificate of Indigency --

    // -- Barangay Clearance --
    public function BcCreate(array $formData)
    {
        $this->db->query(
            "INSERT INTO tbl_brgy_clearances (bc_applicant , bc_purpose, bc_ctc, bc_issue_place, bc_brgy_captain, bc_date_time, bc_created_by) VALUES (:applicant, :purpose, :ctc, :issueplace, :punongbarangay, now(), :createdby)",
            [
                'applicant' => $formData['applicant-id'],
                'purpose' => $formData['applicant-purpose'],
                'ctc' => $formData['ctc-no'],
                'issueplace'  => $formData['issue-place'],
                'punongbarangay'  => $formData['punong-barangay'],
                'createdby'  => $_SESSION['user']
            ]
        );

        $_SESSION['update_message'] = "Created Successfully";
    }

    public function BcGetAllRecords(int $length, int $offset)
    {
        $search = addcslashes($_GET['search'] ?? "", '%_');
        $parameters = ['search' => "%{$search}%"];
        $records = $this->db->query("SELECT * FROM tbl_brgy_clearances LEFT JOIN tbl_residents ON bc_applicant = resident_id INNER JOIN tbl_users ON bc_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search ORDER BY bc_date_time DESC LIMIT {$length} OFFSET {$offset}", $parameters)->findAll();

        $recordsCount = $this->db->query("SELECT * FROM tbl_brgy_clearances LEFT JOIN tbl_residents ON bc_applicant = resident_id INNER JOIN tbl_users ON bc_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
        OR resident_middle_name LIKE :search", $parameters)->count();

        return [$records, $recordsCount];
    }

    public function getBcDocument(int $id)
    {
        return $this->db->query(
            "SELECT CONCAT(resident_first_name, ' ', resident_middle_name, ' ', resident_last_name, ' ', resident_suffix) AS fullname,
            bc_purpose AS purpose,
            bc_ctc AS ctcno,
            bc_issue_place AS issueplace,
            bc_date_time AS date,
            purok_name as purok
            FROM tbl_brgy_clearances
            LEFT JOIN tbl_residents ON bc_applicant = resident_id
            LEFT JOIN tbl_purok ON resident_purok = purok_id
            WHERE bc_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }

    public function bcDelete(int $id)
    {

        $this->db->query("DELETE FROM tbl_brgy_clearances WHERE bc_id = :id", ['id' => $id]);

        $_SESSION['delete_message'] = "Deleted Successfully";
    }
    // -- END: Barangay Clearance --

    // -- PWD Certificate --
    public function PwdCreate(array $formData)
    {
        $this->db->query(
            "INSERT INTO tbl_pwd_certificates (pwd_applicant , pwd_condition, pwd_brgy_captain, pwd_date_time, pwd_created_by) VALUES (:applicant, :condition, :punongbarangay, now(), :createdby)",
            [
                'applicant' => $formData['applicant-id'],
                'condition' => $formData['applicant-condition'],
                'punongbarangay'  => $formData['punong-barangay'],
                'createdby'  => $_SESSION['user']
            ]
        );

        $_SESSION['update_message'] = "Created Successfully";
    }

    public function PwdGetAllRecords(int $length, int $offset)
    {
        $search = addcslashes($_GET['search'] ?? "", '%_');
        $parameters = ['search' => "%{$search}%"];
        $records = $this->db->query("SELECT * FROM tbl_pwd_certificates LEFT JOIN tbl_residents ON pwd_applicant = resident_id INNER JOIN tbl_users ON pwd_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
            OR resident_middle_name LIKE :search ORDER BY pwd_date_time DESC LIMIT {$length} OFFSET {$offset}", $parameters)->findAll();

        $recordsCount = $this->db->query("SELECT * FROM tbl_pwd_certificates LEFT JOIN tbl_residents ON pwd_applicant = resident_id INNER JOIN tbl_users ON pwd_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
            OR resident_middle_name LIKE :search", $parameters)->count();

        return [$records, $recordsCount];
    }

    public function getPwdDocument(int $id)
    {
        return $this->db->query(
            "SELECT CONCAT(resident_first_name, ' ', resident_middle_name, ' ', resident_last_name, ' ', resident_suffix) AS fullname,
                pwd_condition AS disability,
                pwd_date_time AS date,
                purok_name AS purok
                FROM tbl_pwd_certificates
                LEFT JOIN tbl_residents ON pwd_applicant = resident_id
                LEFT JOIN tbl_purok ON resident_purok = purok_id
                WHERE pwd_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }

    public function pwdDelete(int $id)
    {

        $this->db->query("DELETE FROM tbl_pwd_certificates WHERE pwd_id = :id", ['id' => $id]);

        $_SESSION['delete_message'] = "Deleted Successfully";
    }
    // -- END: PWD Certificate --

    // -- Business Clearance --
    public function bncCreate(array $formData)
    {
        $this->db->query(
            "INSERT INTO tbl_business_clearance (bnc_applicant , bnc_business, bnc_or, bnc_amount, bnc_number, bnc_brg_captain, bnc_date_time, bnc_created_by)
            VALUES (:applicant, :business, :ornumber, :amount,  :bncnumber, :punongbarangay, :date, :createdby)",
            [
                'applicant' => $formData['applicant-id'],
                'business' => $formData['applicant-business'],
                'ornumber' => $formData['issue-or'],
                'amount' => $formData['issue-amount'],
                'bncnumber' => date('Y') . '-' . $formData['issue-number'],
                'punongbarangay'  => $formData['punong-barangay'],
                'date' => $formData['issue-date'],
                'createdby'  => $_SESSION['user']
            ]
        );

        $_SESSION['update_message'] = "Created Successfully";
    }

    public function bncGetAllRecords(int $length, int $offset)
    {
        $search = addcslashes($_GET['search'] ?? "", '%_');
        $parameters = ['search' => "%{$search}%"];
        $records = $this->db->query("SELECT * FROM tbl_business_clearance LEFT JOIN tbl_residents ON bnc_applicant = resident_id INNER JOIN tbl_users ON bnc_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
                OR resident_middle_name LIKE :search ORDER BY bnc_date_time DESC LIMIT {$length} OFFSET {$offset}", $parameters)->findAll();

        $recordsCount = $this->db->query("SELECT * FROM tbl_business_clearance LEFT JOIN tbl_residents ON bnc_applicant = resident_id INNER JOIN tbl_users ON bnc_created_by = user_id WHERE resident_first_name LIKE :search OR resident_last_name LIKE :search 
                OR resident_middle_name LIKE :search", $parameters)->count();

        return [$records, $recordsCount];
    }

    public function getBncDocument(int $id)
    {
        return $this->db->query(
            "SELECT CONCAT(resident_first_name, ' ', resident_middle_name, ' ', resident_last_name, ' ', resident_suffix) AS fullname,
                    bnc_business AS business,
                    bnc_or AS ornumber,
                    bnc_amount AS amount,
                    bnc_number AS bncnumber,
                    bnc_date_time AS date,
                    purok_name AS purok
                    FROM tbl_business_clearance
                    LEFT JOIN tbl_residents ON bnc_applicant = resident_id
                    LEFT JOIN tbl_purok ON resident_purok = purok_id
                    WHERE bnc_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }

    public function bncDelete(int $id)
    {

        $this->db->query("DELETE FROM tbl_business_clearance WHERE bnc_id = :id", ['id' => $id]);

        $_SESSION['delete_message'] = "Deleted Successfully";
    }
    // -- END: Business Clearance --
}
