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
            $row["userAdress"]);

          return $loggedUser;
        }
      }
    }

    return false;
  }

  public static function register($newUserName, $newUserSurname, $newUserEmail, $password, $password2, $newUserAddress)
  {
    if ($password != $password2) {
      return false;
    }
    $hasshedPassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO Users(userName, userSurname, userEmail, userPassword, userAddress)
            VALUES ('$newUserName','$newUserSurname','$newUserEmail','$hasshedPassword',
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
    $sql = "SELECT * FROM Users" . ($userId === null ? '' : 'WHERE itemId =' . $userId);
    $result = self::$conn->query($sql);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $shownUser = new User($row["userId"], $row["userName"], $row["userSurname"], $row["userEmail"],
          $row["userAdress"]);
        $userTab[] = $shownUser;
      }
    }

    return $userTab;
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
    $this->userName = $userName;
  }

  public function getUserSurname()
  {
    return $this->userSurname;
  }

  public function setUserSurname($userSurname)
  {
    $this->userSurname = $userSurname;
  }

  public function getUserEmail()
  {
    return $this->userEmail;
  }

  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }

  public function getUserAddress()
  {
    return $this->userAddress;
  }

  public function setUserAddress($userAddress)
  {
    $this->userAddress = $userAddress;
  }
}