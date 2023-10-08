<?php
require_once('./config/dbh.php');

class User extends Database
{
    public function Register($first_name, $last_name, $email, $password)
    {
        // Check if the user already exists
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "This email is already registered. Please choose a different one.";
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        // Validate password
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            return "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character.";
        }
        // Continue with the registration process
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO users (first_name, last_name, email, pwd) VALUES (:first_name, :last_name, :email, :password)");

            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }



    // login
    public function getUserInfoByEmailAndPassword($email, $password)
{
    try {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['pwd'])) {
            return $user;
        } else {
            return null; 
        }
    } catch (PDOException $e) {
        return null; 
    }
}

    public function Login($email, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user !== null) {
                // Set up session variables
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_type'] = $user['user_type'];
        
                // Redirect based on user type
                switch ($user['user_type']) {
                    case 'baker':
                        header("Location: baker_dashboard.php");
                        exit();
                    case 'admin':
                        header("Location: admin_dashboard.php");
                        exit();
                    case 'customer':
                        header("Location: customer_dashboard.php");
                        exit();
                    case 'cashier':
                        header("Location: cashier_dashboard.php");
                        exit();
                    default:
                        header("Location: default_dashboard.php");
                        exit();
                }
            } else {
                // Handle invalid credentials
            }

            if ($user && password_verify($password, $user['password'])) {
                return true;
            } else {
                return "Invalid email or password";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
?>