<?php

interface SQLQueryBuilder
{
  public function select(string $table, array $fields): SQLQueryBuilder;
  public function where(string $field, mixed $value, string $operation): SQLQueryBuilder;
  public function order_by(string $field, string $type = "ASC" | "DESC"): SQLQueryBuilder;
}

class SelectBuilder implements SQLQueryBuilder
{
  protected readonly string $query;

  public function select(string $table, array $fields): SQLQueryBuilder
  {
    $this->query = "SELECT" . implode("", $fields) . " FROM $table";
    return $this;
  }

  public function where(string $field, mixed $value, string $operation): SQLQueryBuilder
  {
    $this->query += " WHERE $field $operation $value";
    return $this;
  }

  public function order_by(string $table, string $type = "ASC" | "DESC"): SQLQueryBuilder
  {
    $this->query += "ORDER BY $type";
    return $this;
  }

  public function get_result()
  {
    return $this->query += ";";
  }
}

class Mysql extends SelectBuilder {

  public function select_data(string $table, array $fields)
  {
    $data = $this->select($table, $fields); 
    return ($data);
  }
}

$mysql = new Mysql();


?>