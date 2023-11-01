<?php

class VideoPlayer
{
  public function save_video(string $path): string
  {
    return "Congrats your video saved" . "\n";
  }

  public function play_video(string $path): string
  {
    return "Video" . "\n";
  }
}

class YoutubeInfo 
{
  public function get_video_info(string $link)
  {
    return [
      "title" => "Vladilen Minin's js course",
      "channel" => "Vladilen Minin",
       "thumbnail" => $link . "png",
    ];
  }
}

class YoutubeDownloader
{
  private VideoPlayer $player;
  private YoutubeInfo $youtube;

  public function __construct()
  {
    $this->player = new VideoPlayer();
    $this->youtube = new YoutubeInfo();
  }

  public function get_info(string $url): YoutubeDownloader
  {
    print_r($this->youtube->get_video_info($url));
    return $this;
  }

  public function download_and_play(string $link): YoutubeDownloader
  {
    echo $this->player->save_video("/downloads/youtube");
    echo $this->player->play_video("/downloads/youtube");

    return $this;
  }

}

$url = "https://www.youtube.com/watch?v=NtPRGbloF5M&list=RDM_AW97go9SA&index=4";
$downloader = new YoutubeDownloader();
$downloader->download_and_play($url)->get_info($url);