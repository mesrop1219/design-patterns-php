<?php

use Database as GlobalDatabase;

class Database
{
  private static $instance;
  private PDO $client;

  public function __construct(string $dsn, string $user, string $pwd)
  {
    try {
      $this->client = new PDO($dsn, $user, $pwd);
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public static function getInstance(): self
  {
    if (!self::$instance) {
      self::$instance = new self("mysql:host=database,dbname=lamp", "lamp", "lamp");
      return self::$instance;
    }

    return self::$instance;
  }

  public function create_table(string $table_creating_query): string
  {
    try {
      $this->client->query($table_creating_query);
      
      return "IT's good table is preapred.";
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }
}

$db_example = GlobalDatabase::getInstance();

echo $db_example->create_table("
  CREATE TABLE Customer(
    username VARCHAR(12) UNIQUE,
    password VARCHAR(100)
  );
"
);

?>