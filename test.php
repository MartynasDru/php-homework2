<?php

use Nfq\Weather\DelegatingWeatherProvider as Dwp;
use Nfq\Weather\YahooWeatherProvider as Ywp;
use Nfq\Weather\OpenWeatherMapWeatherProvider as Owmp;
use Nfq\Weather\WeatherProviderInterface;
use Nfq\Weather\Location;
use Nfq\Weather\Weather;

require_once __DIR__.'/vendor/autoload.php';

class Test
{
  private $temperature;

  public function __construct($location, $weather)
  {
    $this->location = $location;
    $this->weather = $weather;
  }

  public function fetch()
  {
    echo "Weather in " .$this->location->getLocation()." right now is: ".$this->weather->getTemperature() . " degrees celsius";
  }
}

$api_key = "88d214eed2db3bd9b88c7c49fac410ca";
$Location = new Location("Vilnius");
$Ywp = new Ywp();
$Owmp = new Owmp($api_key);
$Providers = [$Ywp, $Owmp];
$Dwp = new Dwp($Providers);
$Test = new Test($Location, $Dwp->fetch($Location));
$Test->fetch();
?>
