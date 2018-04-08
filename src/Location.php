<?php

namespace Nfq\Weather;

class Location
{
  private $location;

  public function __construct($location)
  {
    $this->location = $location;
  }

  public function getLocation()
  {
    return $this->location;
  }
}

?>
