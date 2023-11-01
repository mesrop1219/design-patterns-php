<?php

class Caching
{
  private array $args = [];
  private mixed $controller;

  public function __construct(callable $func)
  {
    $this->controller = $func;
  }

  public function run(...$params)
  {
    foreach ($this->args as $value) {
      if (count(array_diff($value["params"], $params)) === 0) {
        return $value["value"];
      }
    }

    $data = $this->controller;
    $this->args[] = ["params" => [...$params], "value" => $data(...$params)];
    return $data(...$params);
  }
}

function factorial(int $num)
{
  $value = 1;

  if ($num === 0 || $num === 1) {
    return 1;
  }elseif ($num < 0) {
    return "We can't solve it.";
  }

  foreach (range(1, $num) as $rang_value) {
    $value *= $rang_value;
  }

  return $value;
}


$factorial_cache = new Caching(fn(...$params) => factorial(...$params));
echo $factorial_cache->run(5) . "\n";
echo $factorial_cache->run(15) . "\n";
echo $factorial_cache->run(5) . "\n";
