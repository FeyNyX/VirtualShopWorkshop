<?php

/*
CREATE TABLE Orders(
  orderId INT AUTO_INCREMENT,
  userId INT,
  orderStatus INT,
  PRIMARY KEY(orderId),
  FOREIGN KEY(userId) REFERENCES Users(userId)
)

CREATE TABLE Items_Orders(
  id int AUTO_INCREMENT,
  itemId int NOT NULL,
  orderId int NOT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY item_order (itemId, orderId),
  FOREIGN KEY(orderId) REFERENCES Orders(orderId),
  FOREIGN KEY(itemId) REFERENCES Items(itemId)
)
*/

class Order
{
    private static $conn;

    private $orderId;
    private $userId;
    private $orderStatus;

    //Tworzenie polaczenia z baza danych przez index.php
    public static function setConnection(mysqli $newConnection)
    {
        self::$conn = $newConnection;
    }

    //Wstawianie nowego zamowienia do bazy danych
    public static function createOrder($newUserId, $newOrderStatus)
    {
        $sql = "INSERT INTO Orders (userId, orderStatus)
            VALUES ('$newUserId', '$newOrderStatus')";
        $result = self::$conn->query($sql);
        if ($result) {
            $newOrder = new Order(self::$conn->insert_orderId, $newUserId, $newOrderStatus);

            return $newOrder;
        }

        return false;
    }

    public function __construct($newOrderId, $newUserId, $newOrderStatus)
    {
        $this->orderId = $newOrderId;
        $this->setUserId($newUserId);
        $this->setOrderStatus($newOrderStatus);
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }
}