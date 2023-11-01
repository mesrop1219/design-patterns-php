<?php

class Documentation
{
  private string $body;
  private string $id;

  public function __construct(string $body)
  {
    $this->body = $body;
    $this->id = uniqid("");
  }

  public function __clone()
  {
    $this->id = uniqid("");
  }

  public function set_body(string $body)
  {
    $this->body = $body;
  }
}

$python_docs = new Documentation("python");
$php_docs= clone $python_docs;
$php_docs->set_body("Php is bettter");

print_r($python_docs);
print_r($php_docs);

?>