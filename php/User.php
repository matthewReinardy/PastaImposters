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

    public function login($inputPassword): bool
    {
        try {
            // Validate input
            if (empty($this->email) || empty($inputPassword)) {
                return false;
            }

            $sql = "SELECT password, email, full_name
                FROM users
                WHERE email = :email";

            $dbConnection = new DatabaseConnection();
            $dbConnection->connect();
            $pdo = $dbConnection->getPDO();

            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $this->email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($inputPassword, $user['password'])) {
                // Start a secure session
                session_start();
                session_regenerate_id(true); // Prevent session fixation

                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['logged_in'] = true;

                return true;
            }
            return false;
        } catch (PDOException $e) {
            // Log the error
            error_log("Login error: " . $e->getMessage());
            return false;
        }
    }

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
