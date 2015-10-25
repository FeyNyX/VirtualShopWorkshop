<?php

/*
CREATE TABLE Messages(
  messageId INT AUTO_INCREMENT,
  userId INT,
  messageText VARCHAR(600),
  PRIMARY KEY(messageId),
  FOREIGN KEY(userId) REFERENCES Users(userId)
)
*/

class Message
{
    private static $conn;

    private $messageId;
    private $userId;
    private $messageText;

    //Tworzenie polaczenia z baza danych przez api.php
    public static function setConnection(mysqli $newConnection)
    {
        self::$conn = $newConnection;
    }

    public function __construct($newMessageId, $newUserId, $newMessageText)
    {
        $this->messageId = $newMessageId;
        $this->userId = $newUserId;
        $this->setMessageText($newMessageText);
    }

    public function getMessageId()
    {
        return $this->messageId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getMessageText()
    {
        return $this->messageText;
    }

    public function setMessageText($messageText)
    {
        $this->messageText = $messageText;
    }
}
