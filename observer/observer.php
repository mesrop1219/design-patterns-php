<?php

class Logger {
  private readonly string $path;

  public function __construct(string $path)
  {
    if (!file_exists($path)) {
      fopen($path, "w");
    }
    $this->path = $path;
  }

  private function get_content(): string
  {
    return file_get_contents($this->path);
  }

  public function write_log(string $line): self
  {
    $content = $this->get_content();

    if (mb_strlen($content) === 0) {
      file_put_contents($this->path, $line);
    }else {
      file_put_contents($this->path, $content ."\n $line");
    }

    return $this;
  }
}

class User
{
  private string $first_name;
  private string $last_name;

  public function __construct(string $first_name, string $last_name)
  {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
  }

  public function update(string $first_name = null, string $last_name = null)
  {
    if (is_string($first_name) && is_string($last_name)) {
      $this->first_name = $first_name;
      $this->last_name = $last_name;
    }elseif (is_string($first_name)) {
      $this->first_name = $first_name;
    }else {
      $this->last_name = $last_name;
    }
  }
}

class UserObserver
{
  private User $user;
  private Logger $logger;

  public function __construct(string $path)
  {
    $this->logger = new Logger($path);
  }
  public function create(string $name, string $lastname)
  {
    $this->user = new User($name, $lastname);
    $this->logger->write_log(date("Y-m-d H:i:s") . " " . json_encode([$name, $lastname]) . " CREATED");
  }

  public function update(string $first_name = null, string $last_name = null)
  {
    $this->user->update($first_name, $last_name);
    $this->logger->write_log(date("Y-m-d H:i:s") . " " . json_encode([$first_name, $last_name]) . " UPDATED");
  }
}

$userRepository = new UserObserver(__DIR__ . "/user-logger.txt");
$userRepository->create("Mesrop", "Araqelyan");
$userRepository->update("Karen");