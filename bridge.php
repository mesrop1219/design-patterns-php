<?php

abstract class Chart
{
  protected array $chart_data;

  public function __construct()
  {
    $this->chart_data = [];
  }

  abstract public function get_chart_data(int $index): array;
  abstract public function view_result(): void;
  public function add_data(float $data): self
  {
    $this->chart_data[] = $data;
    return $this;
  }
}

class CoinChart extends Chart {

  public function __construct()
  {
    parent::__construct();
  }

  public function get_chart_data(int $index): array 
  {
    return [ $this->chart_data[$index - 1], $this->chart_data[$index] ];
  }

  public function view_result(): void
  {
    for ($i=0; $i < count($this->chart_data); $i++) { 
      if ($i === 0) {
        continue;
      }
      
      $data = $this->get_chart_data($i);
      echo (($data[1] - $data[0]) / $data[0]) * 100 . "% \n";
    }
  }
}

$BitcoinChart = new CoinChart();
$BitcoinChart->add_data(20000)->add_data(50000)->add_data(12000);

$BitcoinChart->view_result();

?>