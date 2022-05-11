<?php

require_once "model/DataHandler.php";


class ContactsLogic
{
  public function __construct()
  {
    $this->DataHandler = new DataHandler("localhost", "mysql", "mvc", "root", "");
  }

  public function __destruct(){}
   
  public function createContact($name, $phone, $email, $address){
    $sql = "INSERT INTO contacts (id, name, phone, email, address) VALUES (0, '$name', '$phone', '$email', '$address')";
    $results = $this->DataHandler->createData($sql);
    return $results;
  }

  public function readContact($id){
    $sql = "SELECT * FROM contacts WHERE id = $id";
    $results = $this->DataHandler->readData($sql);
    return $results;
  }

  public function readallContacts(){
    $sql = "SELECT * FROM contacts";
    $results = $this->DataHandler->readData($sql);
    return $results;
  }

  public function updateContact($id, $name, $phone, $email, $address){
    $sql = "UPDATE `contacts` SET `name`='{$name}', `phone`='{$phone}', `email`='{$email}', `address`='{$address}' WHERE `id`='{$id}'";
    $results = $this->DataHandler->updateData($sql);

    return $results;
  }

  public function deleteContact($id){
    $sql = "DELETE FROM contacts WHERE id = $id";
    $result = $this->DataHandler->deleteData($sql);

    return $result;
  }

  public function readProducts() {
    $sql = "SELECT * FROM products";
    $results = $this->DataHandler->readData($sql);

    return $results;
  }
} 
