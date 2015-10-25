<?php

/*
CREATE TABLE Admins(
  adminId INT AUTO_INCREMENT,
  adminName VARCHAR(60),
  adminEmail VARCHAR(60) UNIQUE,
  adminPassword char(60),
  PRIMARY KEY(adminId)
)
*/

//require_once('User.php');

class Admin
{
    private static $conn;

    private $adminId;
    private $adminName;
    private $adminEmail;

    //Tworzenie polaczenia z baza danych przez api.php
    public static function setConnection(mysqli $newConnection)
    {
        self::$conn = $newConnection;
    }

    public static function login($email, $password)
    {
        $sql = "SELECT * FROM Admins WHERE adminEmail = '$email'";
        $result = self::$conn->query($sql);
        if ($result == true) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $loggedAdmin = new Admin($row["adminId"], $row["adminName"], $row["adminEmail"]);

                    return $loggedAdmin;
                }
            }
        }

        return false;
    }

    //Wstawianie nowej wiadomosci do bazy danych
    public static function createMessage($newUserId, $newMessageText)
    {
        $sql = "INSERT INTO Messages (userId, messageText)
            VALUES ('$newUserId', '$newMessageText')";
        $result = self::$conn->query($sql);
        if ($result) {
            $newMessage = new Message(self::$conn->insert_messageId, $newUserId, $newMessageText);

            return $newMessage;
        }

        return false;
    }

    public function __construct($newAdminId, $newAdminName, $newAdminEmail)
    {
        $this->adminId = $newAdminId;
        $this->setAdminName($newAdminName);
        $this->setAdminEmail($newAdminEmail);
    }

    public function getAdminEmail()
    {
        return $this->adminEmail;
    }

    public function setAdminEmail($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function getAdminId()
    {
        return $this->adminId;
    }

    public function getAdminName()
    {
        return $this->adminName;
    }

    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;
    }


}