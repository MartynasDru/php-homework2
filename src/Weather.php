<?php

namespace Nfq\Weather;

class Weather
{
  private $temperature;

  public function __construct($temperature)
  {
    $this->temperature = $temperature;
  }

  public function getTemperature() : float
  {
    return $this->temperature;
  }
}

?>
