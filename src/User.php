<?php

/*
CREATE TABLE Users(
  userId INT AUTO_INCREMENT,
  userName VARCHAR(60),
  userSurname VARCHAR(60),
  userEmail VARCHAR(60) UNIQUE,
  userPassword char(60),
  userAddress VARCHAR(100),
  PRIMARY KEY(userId)
)
*/

class User
{
    private static $conn;

    private $userId;
    private $userName;
    private $userSurname;
    private $userEmail;
    private $userAddress;

    //Tworzenie polaczenia z baza danych przez api.php
    public static function setConnection(mysqli $newConnection)
    {
        self::$conn = $newConnection;
    }

    public static function login($email, $password)
    {
        $sql = "SELECT * FROM Users WHERE email = '$email'";
        $result = self::$conn->query($sql);
        if ($result == true) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $loggedUser = new User($row["userId"], $row["userName"], $row["userSurname"], $row["userEmail"],
                        $row["userAddress"]);

                    return $loggedUser;
                }
            }
        }

        return false;
    }

    public static function register($newUserName, $newUserSurname, $newUserEmail, $password, $newUserAddress)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Users(userName, userSurname, userEmail, userPassword, userAddress)
            VALUES ('$newUserName','$newUserSurname','$newUserEmail','$hashedPassword',
            '$newUserAddress')";
        $result = self::$conn->query($sql);
        if ($result == true) {
            $newUser = new User(self::$conn->insert_id, $newUserName, $newUserSurname, $newUserEmail, $newUserAddress);

            return $newUser;
        }

        return false;
    }

    public static function getUsers($userId = null)
    {
        $userTab = [];
        $sql = "SELECT * FROM Users" . ($userId == null ? '' : ' WHERE userId =' . $userId);
        $result = self::$conn->query($sql);
        if ($result == true) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userTab[] = $row;
                }
            }
        }

        return $userTab;
    }

    public static function userCheckForCorrectData($newUserName, $newUserSurname, $newUserEmail, $newUserAddress)
    {
        $userCheck = new User(-1, $newUserName, $newUserSurname, $newUserEmail, $newUserAddress);
        if ($userCheck->getUserName() && $userCheck->getUserSurname() && $userCheck->getUserEmail() &&
            $userCheck->getUserAddress()
        ) {
            return true;
        }
        return false;
    }

    public function __construct($newUserId, $newUserName, $newUserSurname, $newUserEmail, $newUserAddress)
    {
        $this->userId = $newUserId;
        $this->setUserName($newUserName);
        $this->setUserSurname($newUserSurname);
        $this->setUserEmail($newUserEmail);
        $this->setUserAddress($newUserAddress);
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        if (is_string($userName) && strlen($userName) < 60 &&
            preg_match('#^[A-Za-z]+$#', $userName)
        ) {
            $this->userName = filter_var($userName, FILTER_SANITIZE_STRING);
        }
    }

    public function getUserSurname()
    {
        return $this->userSurname;
    }

    public function setUserSurname($userSurname)
    {
        if (is_string($userSurname) && strlen($userSurname) < 60 &&
            preg_match('#^[A-Za-z]+$#', $userSurname)
        ) {
            $this->userSurname = filter_var($userSurname, FILTER_SANITIZE_STRING);
        }
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setUserEmail($userEmail)
    {
        if (is_string($userEmail) && strlen($userEmail) < 60 &&
            preg_match('#^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[azA-Z0-9-]{1,})*\.([a-zA-Z]{2,}){1}$#',
                $userEmail)
        ) {
            $this->userEmail = filter_var($userEmail, FILTER_SANITIZE_EMAIL);
        }
    }

    public function getUserAddress()
    {
        return $this->userAddress;
    }

    public function setUserAddress($userAddress)
    {
        if (is_string($userAddress) && strlen($userAddress) < 100) {
            $this->userAddress = filter_var($userAddress, FILTER_SANITIZE_STRING);
        }
    }
}

