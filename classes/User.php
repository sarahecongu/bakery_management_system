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


    public function userLogout()
    {

        if (isset($_SESSION['logged_in'])) {
            session_destroy();
            header('Location:login.php');
            die();
        }

    }
    private function checkIsRegisterFormFieldsEmpty($first_name, $last_name, $password, $email)
    {
        if (!empty($first_name) && !empty($password) && !empty($last_name) && !empty($email)) {
            return true;
        } else {
            return false;
        }
    }
    private function checkIsEmailValid($email)
    {
        var_dump($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    private function checkIsEmailRegistered($email)
    {
        $sql = 'SELECT email FROM users WHERE email = :email ';
        $query = $this->conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $results = $query->fetchAll();
        if (count($results) == 0) {
            return true;
        } else {
            return false;
        }
    }
    private function checkIsPasswordResetFormEmpty($password)
    {
        if (!empty($password)) {
            return true;
        } else {
            return false;
        }

    }
    private function checkIsChangeAccountFormEmpty($first_name, $last_name, $email, $password)
    {

        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
            return true;
        } else {
            return false;
        }

    }
    public function changeUserAccount($first_name, $last_name, $email, $password)
    {
        if ($this->checkIsChangeAccountFormEmpty($first_name, $last_name, $email, $password)) {
            if ($this->checkIsEmailValid($email)) {
                if ($this->checkIsEmailRegistered($email)) {
                    $sql = 'UPDATE users SET first_name = ? ,last_name = ? ,email = ? ,pwd = ?';
                    $query = $this->conn->prepare($sql);
                    $query->execute([$first_name, $last_name, $email, $password]);
                    echo 'update info';
                } else {
                    echo 'email in existance';
                }
            } else {

                echo 'Please , enter valid email address.';
            }

        } else {

            echo 'Please , fill all fields in form.';
        }
    } // changeUserAccount

    public function getUserDetailsById($id)
    {

        $sql = 'SELECT * FROM users WHERE id = ? LIMIT = 1 ';

        $query = $this->conn->prepare($sql);

        $query->execute([$id]);

        $userInfo = $query->fetch();

        return $userInfo;

    } // getUserDetailsById
    public function checkIsUserLoggedIn()
    {

        if (isset($_SESSION['logged_in'])) {
            return true;
        } else {
            return false;
        }
    }
    public function Register($first_name, $last_name, $password, $email)
    {
        if ($this->checkIsRegisterFormFieldsEmpty($first_name, $last_name, $password, $email)) {
            if ($this->checkIsEmailValid($email)) {
                if ($this->checkIsEmailRegistered($email)) {
                    $sql = 'INSERT INTO users (first_name, last_name, email, pwd) VALUES (:first_name, :last_name, :email, :password)';
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $query = $this->conn->prepare($sql);
                    $query->bindParam(':first_name', $first_name);
                    $query->bindParam(':last_name', $last_name);
                    $query->bindParam(':email', $email);
                    $query->bindParam(':password', $hashed_password);
                    $query->execute();
                    echo 'Registration is finished. Please login.';
                } else {
                    echo 'Email address is already taken.';
                }
            } else {
                echo 'Enter valid email address';
            }
        } else {
            echo 'Please fill all fields in registration form.';
        }
    }

    // login
    private function checkIsLoginFormEmpty($email, $password)
    {
        if (!empty($email) && !empty($password)) {

            return true;
        } else {
            return false;
        }


    } // checkIsLoginFormEmpty

    public function Login($email, $password)
    {

        if ($this->checkIsEmailValid($email)) {
            if ($this->checkIsLoginFormEmpty($email, $password)) {
                $user_type = 5;

                $sql = 'SELECT * FROM users  WHERE email = :email AND user_type = :user_type LIMIT 1 ';
                $query = $this->conn->prepare($sql);
                $query->bindParam(':email', $email);
                $query->bindParam(':user_type', $user_type);

                $query->execute();
                $results = $query->fetchAll();
                if (count($results) > 0) {
                    foreach ($results as $result) {

                        $hashed_password = $result['pwd'];

                        if (password_verify($password, $hashed_password)) {
                            $_SESSION['logged_in'] = 5;
                            $_SESSION['id'] = $result['id'];
                            $_SESSION['email'] = $result['email'];
                            $_SESSION['first_name'] = $result['first_name'];
                            $_SESSION['last_name'] = $result['last_name'];
                            $_SESSION['user_type'] = $result['user_type'];
                            header('Location:my-account.php');

                            exit();
                        } else {

                            echo 'Wrong email or password . Please try again.';
                        }

                    }

                } else {

                    echo 'Wrong email or password . Please try again.';
                }
            } else {
                echo 'Please , fill all fields in form..';
            }
        } else {
            echo 'Please , enter valid email address.';
        }


    }

}