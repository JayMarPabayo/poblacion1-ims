<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{
    public function __construct(private Database $db)
    {
    }

    public function isEmailTaken(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM tbl_users WHERE user_email = :email",
            [
                'email' => $email
            ]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'Email already taken.']);
        }
    }

    public function create(array $formData)
    {
        $password = password_hash($formData['user-password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $this->db->query(
            "INSERT INTO tbl_users(user_first_name, user_middle_name, user_last_name, user_email, user_username, user_password, user_role)
            VALUES(:firstname, :middlename, :lastname, :email, :username, :password, :role)",
            [
                'firstname' => $formData['first-name'],
                'middlename' => $formData['middle-name'],
                'lastname' => $formData['last-name'],
                'email' => $formData['email'],
                'username' => $formData['user-username'],
                'password' => $password,
                'role' => $formData['user-role']
            ]
        );
    }

    public function login(array $formData)
    {
        $user = $this->db->query("SELECT * FROM tbl_users WHERE user_username = :username", [
            'username' => $formData['user-username']
        ])->find();

        $passwordsMatch = password_verify($formData['user-password'], $user['user_password'] ?? '');

        if (!$user || !$passwordsMatch) {
            throw new ValidationException(['password' => ['Invalid credentials']]);
        }

        $this->db->query("UPDATE tbl_users SET user_last_logon = CURRENT_TIMESTAMP WHERE user_id = :userId", [
            'userId' => $user['user_id']
        ]);


        session_regenerate_id();

        $_SESSION['user'] = $user['user_id'];
        $_SESSION['user-role'] = $user['user_role'];
    }

    public function logout()
    {
        unset($_SESSION['user']);

        session_regenerate_id();
    }

    public function getAllUsers()
    {
        $users = $this->db->query("SELECT * FROM tbl_users WHERE user_role != 'Inactive'")->findAll();

        return $users;
    }


    public function getUser(int $id)
    {
        return $this->db->query(
            "SELECT * FROM tbl_users WHERE user_id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }

    public function update(array $formData, int $id)
    {

        $password = password_hash($formData['user-password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $this->db->query(
            "UPDATE tbl_users SET user_first_name = :firstname,
            user_middle_name = :middlename,
            user_last_name = :lastname,
            user_email = :email,
            user_username = :username,
            user_password = :password,
            user_role = :role,
            user_updated_at = now() WHERE user_id = :id",
            [
                'id' => $id,
                'firstname' => $formData['first-name'],
                'middlename' => $formData['middle-name'],
                'lastname' => $formData['last-name'],
                'email' => $formData['email'],
                'username' => $formData['user-username'],
                'password' => $password,
                'role' => $formData['user-role']
            ]
        );

        $_SESSION['update_message'] = "Updated Successfully";
    }


    public function delete(int $id)
    {

        $this->db->query("UPDATE tbl_users SET user_role = 'Inactive' WHERE user_id = :id", ['id' => $id]);

        $_SESSION['delete_message'] = "Removed Successfully";
    }
}
