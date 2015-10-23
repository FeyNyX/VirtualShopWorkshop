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

class Item{
  private $itemId;
  private $itemName;
  private $itemPrice;
  private $itemDescription;
  private $itemCount;

  public function __construct($newItemId, $newItemName, $newItemPrice, $newItemDescription, $newItemCount){
    $this->itemId = $newItemId;
    $this->setItemName($newItemName);
    $this->setItemPrice($newItemPrice);
    $this->setItemDescription($newItemDescription);
    $this->setItemCount($newItemCount);
  }
  public function getItemId(){
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
