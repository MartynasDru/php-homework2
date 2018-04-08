<?php

namespace Nfq\Weather;

class OpenWeatherMapWeatherProvider implements WeatherProviderInterface
{
  public function fetch(Location $location) : Weather
  {
    $BASE_URL = "http://api.openweathermap.org/data/2.5/weather?q=";
    $yql_query = $location->getLocation();
    $yql_query_url = $BASE_URL . urlencode($yql_query) . "&units=metric&appid=88d214eed2db3bd9b88c7c49fac410ca";
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    $phpObj =  json_decode($json);

    if ($phpObj->cod != 200){
       throw new WeatherProviderException("OpenWeatherMapWeatherProvider not working!");
    }
    $temperature = $phpObj->main->temp;
    $weather = new Weather($temperature);
    return $weather;
  }
}

?>
