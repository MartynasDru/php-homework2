<?php

use Nfq\Weather\DelegatingWeatherProvider as Dwp;
use Nfq\Weather\YahooWeatherProvider as Ywp;
use Nfq\Weather\OpenWeatherMapWeatherProvider as Owmp;
use Nfq\Weather\WeatherProviderInterface;
use Nfq\Weather\Location;
use Nfq\Weather\Weather;

require_once __DIR__.'/vendor/autoload.php';


$Location = new Location("Vilnius");
$Ywp = new Ywp();
$Owmp = new Owmp();
$Providers = [$Ywp, $Owmp];
$Dwp = new Dwp($Providers, $Location);
$Dwp->fetch();


?>
