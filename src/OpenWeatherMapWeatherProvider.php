<?php

namespace Nfq\Weather;

class OpenWeatherMapWeatherProvider implements WeatherProviderInterface
{
  private $api_key;

  public function __construct($api_key)
  {
    $this->api_key = $api_key;
  }

  public function fetch(Location $location) : Weather
  {
    $BASE_URL = "http://api.openweathermap.org/data/2.5/weather?q=";
    $yql_query = $location->getLocation();
    $yql_query_url = $BASE_URL . urlencode($yql_query) . "&units=metric&appid=" . $this->api_key;
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    $phpObj =  json_decode($json);

    if (!isset($phpObj->main->temp)){
       throw new WeatherProviderException("OpenWeatherMapWeatherProvider not working!");
    }
    $temperature = $phpObj->main->temp;
    $weather = new Weather($temperature);
    return $weather;
  }
}

?>
