<?php

class TruckLogistic
{
  public string $transport_name;
  public string $state = "new" | "used";
  public int $price;

  public function __construct(
    string $transport, 
    string $state = "new" | "used",
    int $price,
    ) {

    $this->transport_name = $transport;
    $this->state = $state;
    $this->price = $price;
  }

  public function __toString()
  {
    return "name is " . $this->transport_name . " state is " . $this->state . " price is " . $this->price . "$";
  }
}

class ShipLogistic
{
  public string $transport_name;
  public int $price;

  public function __construct(
    string $transport,
    int $price,
    ) {

    $this->transport_name = $transport;
    $this->price = $price;
  }

  public function __toString()
  {
    return "name is " . $this->transport_name . " price is " . $this->price . "$";
  }

  public function getPriceForKg()
  {
    return round($this->price / 1500);
  }
}

class Logistic
{
  private array $subclasses = [
    "truck" => TruckLogistic::class,
    "ship" => ShipLogistic::class,
  ];

  public function createTruck(string $name, string $state = "used" | "new", int $price): TruckLogistic
  {
    return new $this->subclasses["truck"]($name, $state, $price);
  }
  
  public function createShip(string $name, int $price): ShipLogistic
  {
    return new $this->subclasses["ship"]($name, $price);
  }
}

$titanic = (new Logistic())->createShip("Titanic", 100000000);

echo $titanic->getPriceForKg() ."$" . "\n";
echo $titanic . "\n";

?>