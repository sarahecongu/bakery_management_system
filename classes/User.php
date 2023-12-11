<?php
class User extends Model
{
    protected $table = "users";
    public $first_name;
    public $last_name;
    public $email;
    public $user_type_id;
    public $pwd;
    public $image;
    public $address;
    public $tel;
    




    public function userLogout()
    {
        if (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
            session_destroy();
            header('Location:login.php');
            die();
        }

    }


    public function checkIsEmailRegistered()
    {
        $sql = 'SELECT email FROM users WHERE email = :email ';
        $query = $this->connection->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->execute();

        $results = $query->fetchAll();

        return count($results) > 0 ? 1 : 0;

    }


    public function Register()
    {
        $errors = [];

        if (empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->pwd)) {
            $errors[] = "All fields are required.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $this->pwd)) {
            $errors[] = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character.";
        } else {
            if ($this->checkIsEmailRegistered() == 0) {
                $this->pwd = password_hash($this->pwd, PASSWORD_DEFAULT);
                $this->create([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'user_type_id' => $this->user_type_id,
                    'pwd' => $this->pwd,
                ]);
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Registration successful. Please login.';

                header('location: login.php');
            } else {
                $errors[] = "Email address is already taken.";
            }
        }

        // Store errors in the session
        if (!empty($errors)) {
            Helper::statusMessage('error', implode("<br>", $errors));

        }
    }

    public function Login(SessionManager $session)
    {

        $users = $this->where(['email' => $this->email]);

        if ($users) {
            foreach ($users as $user) {
                $hashed_password = $user->pwd;

                if (password_verify($this->pwd, $hashed_password)) {

                    if ($session->add($user)) {
                        if ($user->user_type_id == 1 || $user->user_type_id == 2 || $user->user_type_id == 3 || $user->user_type_id == 5 || $user->user_type_id == 6) {
                            $redirect = 'dashboard.php';
                        } elseif ($user->user_type_id == 4) {
                            $redirect = 'index.php';
                        } else {
                            $redirect = '404.php';
                        }

                        if (isset($_SESSION['cart_token'])) {
                           $redirect = 'checkout.php';
                        }

                        header("Location: $redirect");
                        exit();
                    }
                } else {
                    $errors[] = 'Wrong email or password.';
                }
            }
        } else {
            $errors[] = 'Wrong email or password.';
        }

        // Store errors in the session
        if (!empty($errors)) {

            Helper::statusMessage('error', implode("<br>", $errors));
            // $_SESSION['message'] = implode("<br>", $errors);
        }
    }
}


