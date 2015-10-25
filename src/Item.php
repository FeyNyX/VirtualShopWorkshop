<?php

/*
CREATE TABLE Items(
  itemId INT AUTO_INCREMENT,
  itemName VARCHAR(60),
  itemPrice DECIMAL(6,2),
  itemDescription VARCHAR(255),
  itemCount SMALLINT,
  PRIMARY KEY(itemId)
)
*/

class Item
{
  private static $conn;

  private $itemId;
  private $itemName;
  private $itemPrice;
  private $itemDescription;
  private $itemCount;

  //Tworzenie polaczenia z baza danych przez api.php
  public static function setConnection(mysqli $newConnection)
  {
    self::$conn = $newConnection;
  }

  //Wstawianie nowego przedmiotu do bazy danych
  public static function createItem($newItemName, $newItemPrice, $newItemDescription, $newItemCount)
  {
    $sql = "INSERT INTO Items (itemName, itemPrice, itemDescription, itemCount)
            VALUES ('$newItemName', '$newItemPrice', '$newItemDescription', '$newItemCount')";
    $result = self::$conn->query($sql);
    if ($result) {
      $newItem = new Item(self::$conn->insert_itemId, $newItemName, $newItemPrice, $newItemDescription, $newItemCount);

      return $newItem;
    }

    return false;
  }

  //Ladowanie przedmiotow (pojedyczno po id lub wszystkich naraz)
  public static function getItems($itemId = null)
  {
    $itemTab = [];
    $sql = "SELECT * FROM Items" . ($itemId === null ? '' : 'WHERE itemId =' . $itemId);
    $result = self::$conn->query($sql);
    if ($result == true) {
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $shownItem = new Item($row['itemId'], $row['itemName'], $row['itemPrice'], $row['itemDescription'],
          $row['itemCount']);
        $itemTab[] = $shownItem;
      }
    }

    return $itemTab;
  }

  public function __construct($newItemId, $newItemName, $newItemPrice, $newItemDescription, $newItemCount)
  {
    $this->itemId = $newItemId;
    $this->setItemName($newItemName);
    $this->setItemPrice($newItemPrice);
    $this->setItemDescription($newItemDescription);
    $this->setItemCount($newItemCount);
  }

  public function getItemId()
  {
    return $this->itemId;
  }

  public function getItemName()
  {
    return $this->itemName;
  }

  public function setItemName($itemName)
  {
    $this->itemName = $itemName;
  }

  public function getItemPrice()
  {
    return $this->itemPrice;
  }

  public function setItemPrice($itemPrice)
  {
    $this->itemPrice = $itemPrice;
  }

  public function getItemDescription()
  {
    return $this->itemDescription;
  }

  public function setItemDescription($itemDescription)
  {
    $this->itemDescription = $itemDescription;
  }

  public function getItemCount()
  {
    return $this->itemCount;
  }

  public function setItemCount($itemCount)
  {
    $this->itemCount = $itemCount;
  }
}
