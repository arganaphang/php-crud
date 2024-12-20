<?php

function connection()
{
  $server = "mariadb"; // local address -> 127.0.0.1/0.0.0.0
  $username = "myuser"; // xampp/laragon -> root
  $password = "mypassword"; // xampp/laragon -> '' (empty)
  $database = "contacts";
  try {
    $connection = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    return $connection;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

function listAll($connection)
{
  $sql = 'SELECT * FROM contacts';
  $statement = $connection->prepare($sql);
  $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $contacts = $statement->fetchAll();
  return $contacts;
}

function create($connection, $full_name, $email, $address)
{
  try {
    $sql = "INSERT INTO `contacts` (`full_name`, `email`, `address`) VALUES (:full_name, :email, :address)";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['full_name' => $full_name, 'email' => $email, 'address' => $address]);
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}

function read($connection, $id)
{
  $sql = "SELECT * FROM `contacts` WHERE `id` = :id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(['id' => $id]);
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $contact = $stmt->fetch();
  return $contact;
}

function update($connection, $id, $full_name, $email, $address)
{
  $sql = "UPDATE `contacts` SET `full_name`=:full_name, `email`=:email, `address`=:address WHERE `id`=:id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(['full_name' => $full_name, 'email' => $email, 'address' => $address, 'id' => $id]);
}

function delete($connection, $id)
{
  $sql = "DELETE FROM `contacts` WHERE `id`=:id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(['id' => $id]);
}
