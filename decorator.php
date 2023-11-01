<?php

class TextData
{
  private string $text;

  public function __construct(string $text)
  {
    $this->text = $text;
  }

  public function get_text()
  {
    return $this->text;
  }
}

function seperate_by_hashtags(TextData $instance)
{
  return explode("#", $instance->get_text());
}

$article = new TextData("Lorem inpsum#is very #good");
print_r(seperate_by_hashtags($article));