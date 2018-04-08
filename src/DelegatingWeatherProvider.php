<?php

namespace Nfq\Weather;

class DelegatingWeatherProvider
{
  private $providers;
  private $location;
  private $temperature;

  public function __construct($providers, $location)
  {
    $this->providers = $providers;
    $this->location = $location;
  }

  public function fetch()
  {
    foreach($this->providers as $provider) {
      try {
          $this->temperature = $provider->fetch($this->location)->getTemperature();
      } catch (WeatherProviderException $e) {
          $e->getMessage();
      }
    }
    if (is_null($this->temperature)) {
      throw new WeatherProviderException("Currently no working providers!");
    }
  }

}

?>
