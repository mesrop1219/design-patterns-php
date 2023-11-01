<?php

class AdminPanel
{
  public function show_posts()
  {
    return [
      "post_1" => "titl",
      "post_2" => "titl1",
      "post_3" => "titl2",
      "post_4" => "titl3",
    ];
  }
}

class Autharization
{
  private AdminPanel $source;
  private string $username;
  private string $password;

  public function __construct(string $username, string $password)
  {
    $this->source = new AdminPanel();
    $this->username = $username;
    $this->password = password_hash($password, PASSWORD_BCRYPT);
  }

  public function get_data(string $username, string $password)
  {
    if ($username === $this->username && password_verify($password, $this->password))
    {
      return $this->source->show_posts();
    }

    return "Sorry but username or password not true";
  }
}

$admin_auth = new Autharization("mesrop1212", "mospos321");
print_r($admin_auth->get_data("mesrop1212", "mospos321"));
print_r($admin_auth->get_data("mesrop1212", "mospos3221"));