<?php

interface FurnitureTypes
{
  public function set_foot_count(int $foots_count): int;
  public function set_material(string $type): string;
}

class Chair implements FurnitureTypes 
{  
  private int $foots;
  private string $material;

  public function set_foot_count(int $foots_count): int
  {
    $this->foots = $foots_count;
    return $foots_count;
  }

  public function set_material(string $type): string
  {
    $this->material = $type;
    return $type;
  }

  public function __toString()
  {
    return $this->foots . " " . $this->material . get_class($this);
  }
}

class Table implements FurnitureTypes
{
  private int $foots;
  private string $material;
  private string $color;

  public function set_foot_count(int $foots_count): int
  {
    $this->foots = $foots_count;
    return $foots_count;
  }

  public function set_material(string $type): string
  {
    $this->material = $type;
    return $type;
  }

  public function set_color(string $color): string
  {
    $this->color = $color;
    return $color;
  }

  public function __toString()
  {
    return $this->foots . " " . $this->material . " " . $this->color . " " . get_class($this);
  }
}

$chair = new Chair;
$chair->set_foot_count(4);
$chair->set_material("Wood");

$table = new Table;
$table->set_color("red");
$table->set_foot_count(3);
$table->set_material("Wood");

echo $chair . "\n";
echo $table . "\n";