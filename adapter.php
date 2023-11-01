<?php

class DataFromMarket
{
  private string $data = "Bitcoin: 22000,Etherium: 1240";

  public function get_data()
  {
    return $this->data;
  }
}

class JsonAdapter 
{
  public static function make_json(string $data)
  {
    $formated_data = explode(",", $data);
    return $formated_data;
  }
}

class MakeChart
{
  public function make_chart(array $json_data)
  {
    return $json_data;
  }
}

$data = new DataFromMarket();
$chart = (new MakeChart())->make_chart(JsonAdapter::make_json($data->get_data()));


print_r($chart);

?>