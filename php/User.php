<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'DatabaseConnection.php';
include 'DatabaseUtil.php';

class User
{
    protected $fullName;
    protected $email;
    protected $password;

    public function __construct($fullName, $email, $password)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
    }
    // Register method
    public function register(): bool
    {
        try {
            $sql = "INSERT INTO users (full_name, email, password, created_at, updated_at)
            VALUES (:name, :email, :password, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

            $values = [
                ':name' => $this->fullName,
                ':email' => $this->email,
                ':password' => $this->password
            ];

            $dbConnection = new DatabaseConnection();
            $dbConnection->connect();
            pdo($dbConnection->getPDO(), $sql, $values);
        } catch (Exception $e) {
            throw $e;
        }
        return true;
    }

    /* public function login(): bool
    {
        try {
            $sql = "SELECT password, email, full_name
            FROM users
            WHERE email = :email";
        } catch (Exception $e) {
            throw $e;
        }
        return $authenticated;
    } */


    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
